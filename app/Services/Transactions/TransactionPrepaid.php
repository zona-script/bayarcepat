<?php

namespace App\Services\Transactions;

use App\Models\Balances;
use App\Enums\Balance;
use App\Enums\PrepaidEnum;
use App\Services\RandomRefID;
use App\Models\TransactionPrepaidResponse;
use Illuminate\Support\Facades\Auth;

class TransactionPrepaid extends TransactionAbstract
{
    public function createTransaction()
    {
        $refId = RandomRefID::make();

        $product = $this->digiflazzBuyer
            ->getPrepaid($this->buyerSkuCode)
            ->toArray();

        if (blank($product)) {
            return response()->json([
                'status' => false,
                'message' => 'Produk tidak tersedia, mohon menghubungi kami dengan isi pesan [[#ERROR829]].'
            ]);
        }

        if ($product['price'] >= $this->user->balance) {
            return response()->json([
                'status' => false,
                'message' => 'Saldo anda tidak mencukupi.'
            ]);
        }

        $transactionPrepaid = \App\Models\TransactionPrepaid::create([
            'user_id' => Auth::id(),
            'ref_id' => $refId,
            'product' => $product,
            'customer_number' => $this->customerNumber,
            'status' => PrepaidEnum::STATUS_PROCESS,
            'price' => $product['price']
        ]);

        $balance = Balances::create([
            'user_id' => Auth::id(),
            'type' => Balance::OUT,
            'amount' => $product['price'],
            'title' => \App\Services\BalanceTitle::TRANSACTION_PREPAID,
            'trx_id' => $transactionPrepaid->id,
            'previous_balance' => ($this->user->balance - $product['price'])
        ]);

        try {
            $resultBuy = $this->digiflazzBuyer
                ->buyPrepaid($this->buyerSkuCode, $this->customerNumber, $refId, $this->isTesting, $this->message);
            $resultBuy = collect($resultBuy['data'])->toArray();
        } catch (\Exception $exception) {
            $balance = Balances::create([
                'user_id' => Auth::id(),
                'type' => Balance::OUT,
                'amount' => $product['price'],
                'title' => \App\Services\BalanceTitle::TRANSACTION_REFUND_PREPAID,
                'trx_id' => $transactionPrepaid->id,
                'previous_balance' => ($this->user->balance + $product['price'])
            ]);

            $responseCallback = TransactionPrepaidResponse::create([
                'transaction_prepaid_id' => $transactionPrepaid->id,
                'ref_id' => $transactionPrepaid->ref_id,
                'message' => $exception->getMessage(),
            ]);

            // mengupdate status pada transactionPrepaid
            $transactionPrepaid->status = PrepaidEnum::STATUS_FAILED;
            $transactionPrepaid->save();

            return response()->json([
                'status' => false,
                'message' => 'Transaksi gagal.... ' . $exception->getFile()
            ]);
        }

        // menangkap hasil response
        $responseCallback = TransactionPrepaidResponse::create([
            'transaction_prepaid_id' => $transactionPrepaid->id,
            'ref_id' => $resultBuy['ref_id'],
            'message' => $resultBuy['message'],
            'status' => $resultBuy['status'],
            'rc' => $resultBuy['rc'],
            'sn' => $resultBuy['sn'],
            'buyer_last_saldo' => $resultBuy['buyer_last_saldo'],
            'price' => $resultBuy['price']
        ]);

        // mengupdate status pada transactionPrepaid
        $transactionPrepaidStatus = PrepaidEnum::isStatusEnum($resultBuy['rc'], $resultBuy['status']);
        $transactionPrepaid->status = $transactionPrepaidStatus;
        $transactionPrepaid->save();

        return response()->json([
            'status' => true,
            'message' => 'Transaksi anda sedang di proses.',
            'transaction_id' => $transactionPrepaid->id
        ]);
    }
}
