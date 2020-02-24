<?php

namespace App\Builders;

use App\BayarCepatPay;
use App\Enums\BayarCepatPayEnum;
use App\Enums\TransactionEnum;
use App\Transaction;
use Illuminate\Support\Facades\Auth;

class BayarCepatBuilder
{
    protected $type;
    protected $userID;
    protected $value = '';
    protected $information = '';
    protected $previousBalance = 0;

    public function __construct()
    {
        $this->type = BayarCepatPayEnum::$typeIN;
        $this->userID = Auth::id();
    }

    public static function make()
    {
        return new BayarCepatBuilder();
    }

    public function setUser($user)
    {
        $this->type = $user;
        return $this;
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
            'previous_balance' => BayarCepatPayBuilder::make()->getBalance($this->userID)
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

    public function deposit(Transaction $transaction)
    {
        $bayarCepatPay =  (new BayarCepatBuilder())
            ->setType(BayarCepatPayEnum::$typeIN)
            ->setUser(collect($transaction)['user_id'])
            ->setValue(collect($transaction)['information']['bank']['value_total'])
            ->setInformation(collect($transaction)['id'])
            ->save();

        $transaction->status = TransactionEnum::$statusSuccess;
        $transaction->save();

        return $transaction;
    }
}
