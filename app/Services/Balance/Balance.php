<?php


namespace App\Services\Balance;


use App\Balances;

class Balance
{
    protected $user;
    protected $type;
    protected $amount;
    protected $title;
    protected $note;
    protected $trxID;
    protected $information;

    public function __construct($user, $type, $amount, $title, $note, $trxID, $information)
    {
        $this->user = $user;
        $this->type = $type;
        $this->amount = $amount;
        $this->title = $title;
        $this->note = $note;
        $this->trxID = $trxID;
        $this->information = $information;
    }

    public function create()
    {
        $previousBalance = BalanceFactory::getPreviousBalance($this->user);

        if ($this->type == \App\Enums\Balance::IN) {
            $previousBalanceAmount = $previousBalance + $this->amount;
        } else {
            $previousBalanceAmount = $previousBalance - $this->amount;
        }

        return Balances::create([
            'user_id' => $this->user->id,
            'type' => $this->type,
            'amount' => $this->amount,
            'title' => $this->title,
            'note' => $this->note,
            'trx_id' => $this->trxID,
            'information' => $this->information,
            'previous_balance' => $previousBalanceAmount
        ]);
    }
}
