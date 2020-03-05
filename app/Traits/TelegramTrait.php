<?php


namespace App\Traits;


use App\BayarCepatPay;
use App\Telegram\TelegramBuilder;
use App\Transaction;
use Illuminate\Support\Facades\Auth;

trait TelegramTrait
{
    public function notificationTransaction(Transaction $transactionOBJ)
    {
        $transaction = collect($transactionOBJ)->toArray();
        $message = '
--------------------------
Transaksi Terbaru [Product]
Pada : '. $transaction['created_at'].'
--------------------------
Trx ID: '. $transaction['id'] .'
User ID: '. $transaction['user_id'] .'
No telepon: '. $transaction['information']['phone_number'] .'
Operator: '. $transaction['information']['product']['operator'] .'
Code: '. $transaction['information']['product']['code'] .'
Deskripsi: '. $transaction['information']['product']['description'] .'
Harga: '. $transaction['information']['product']['price'];

        return TelegramBuilder::make()
            ->setText($message)
            ->sendMessage();
    }

    public function notificationTransactionFromMarket(Transaction $transactionOBJ)
    {
        $transaction = collect($transactionOBJ)->toArray();
        $message = '
--------------------------
Transaksi Terbaru [Market]
Pada : '. $transaction['created_at'].'
--------------------------
Trx ID: '. $transaction['id'] .'
User ID: '. $transaction['user_id'] .'
No telepon: '. $transaction['information']['phone_number'] .'
Brand: '. $transaction['information']['product']['brand'] .'
Code: '. $transaction['information']['product']['buyer_sku_code'] .'
Deskripsi: '. $transaction['information']['product']['desc'] .'
Harga: '. $transaction['information']['product']['price'];

        return TelegramBuilder::make()
            ->setText($message)
            ->sendMessage();
    }

}
