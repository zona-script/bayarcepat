<?php

namespace App\Builders;

use App\BayarCepatPay;
use App\Enums\BayarCepatPayEnum;
use App\Enums\TransactionEnum;
use App\Transaction;
use Illuminate\Support\Facades\Auth;

class BayarCepatBuilder
{
    public $type;
    public $userID;
    public $value = '';
    public $information = '';
    public $previousBalance = 0;

    public function __construct($userID = '')
    {
        $this->type = BayarCepatPayEnum::$typeIN;

        if (blank($userID)) {
            $this->userID = Auth::id();
        } else {
            $this->userID = $userID;
        }

        $this->previousBalance = BayarCepatPayBuilder::make()
            ->getBalance($this->userID);
    }

    public static function make($userID = '')
    {
        return new BayarCepatBuilder($userID);
    }

    public function setUser(int $user)
    {
        $this->userID = $user;
        return $this;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getInformation(): string
    {
        return $this->information;
    }

    /**
     * @return int
     */
    public function getPreviousBalance(): int
    {
        return $this->previousBalance;
    }

    public function getUser() {
        return $this->userID;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function setInformation($information)
    {
        $this->information = $information;
        return $this;
    }

    public function setPreviousBalance($previousBalance)
    {
        $this->previousBalance = $previousBalance;
        return $this;
    }

    public function save()
    {
        $bayarcepat = BayarCepatPay::create([
            'user_id' => $this->userID,
            'type' => $this->type,
            'value' => $this->value,
            'information' => $this->information,
            'previous_balance' => $this->previousBalance
        ]);

        return $bayarcepat;
    }


    public function payment(Transaction $transaction)
    {
        $newTransaction = Transaction::create([
            'user_id' => $this->userID,
            'type' => TransactionEnum::$typeBayarCepatPayPay,
            'information' => $transaction,
            'status' => TransactionEnum::$statusProcess
        ]);

        $this->setType(BayarCepatPayEnum::$typeOUT);
        $this->value = collect($transaction)['information']['product']['price'];
        $this->information = collect($transaction)['id'];
        $this->save();

        $newTransaction->status = TransactionEnum::$statusSuccess;
        $newTransaction->save();

        return $newTransaction;
    }

    public function refund(Transaction $transaction)
    {
        $userID = blank($this->userID) ? collect($transaction)['user_id'] : $this->userID;
        $this->userID = $userID;
        $newTransaction = Transaction::create([
            'user_id' => $this->userID,
            'type' => TransactionEnum::$typeBayarCepatPayRefund,
            'information' => $transaction,
            'status' => TransactionEnum::$statusProcess
        ]);

        $this->setType(BayarCepatPayEnum::$typeIN);
        $this->value = collect($transaction)['information']['product']['price'];
        $this->information = collect($transaction)['id'];
        $this->save();

        $newTransaction->status = TransactionEnum::$statusSuccess;
        $newTransaction->save();

        return $newTransaction;
    }

    public function deposit($transaction)
    {
        $userID = collect($transaction)['user_id'];
        $bayarCepatPay =  self::make($userID)
            ->setType(BayarCepatPayEnum::$typeIN)
            ->setValue(collect($transaction)['information']['bank']['value_total'])
            ->setInformation(collect($transaction)['id'])
            ->save();

        $transaction->status = TransactionEnum::$statusSuccess;
        $transaction->save();

        return $transaction;
    }

    public function sendMoney(Transaction $transaction)
    {
        $transactionArray = collect($transaction);

        // pengurangan uang dari pengirim
        $sendMoney = self::make($transactionArray['user_id'])
            ->setType(BayarCepatPayEnum::$typeOUT)
            ->setValue($transactionArray['value'])
            ->setInformation($transactionArray['id'])
            ->save();

        // menambah uang ke tujuan pengiriman
        $receiveMoney = self::make($transactionArray['information']['user']['id'])
            ->setType(BayarCepatPayEnum::$typeIN)
            ->setValue($transactionArray['value'])
            ->setInformation($transactionArray['id'])
            ->save();

        // menulis informasi transaction
        $trx = Transaction::create([
            'user_id' => $transactionArray['information']['user']['id'],
            'type' => TransactionEnum::$typeBayarCepatPayReceiveMoney,
            'value' => $transactionArray['value'],
            'information' => [
                'user' => Auth::user(),
                'description' => $transactionArray['information']['description'],
                'money_amount' => $transactionArray['information']['money_amount']
            ],
            'status' => TransactionEnum::$statusSuccess
        ]);

        return [
            'send_money' => $sendMoney,
            'receive_money' => $receiveMoney,
            'transaction' => $trx,
        ];
    }
}
