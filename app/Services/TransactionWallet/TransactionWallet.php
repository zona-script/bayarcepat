<?php


namespace App\Services\TransactionWallet;


use App\Enums\TransactionWalletEnum;

class TransactionWallet
{
    protected $uniqueCode; // only deposit, if withdrawal value = 0

    protected $user;
    protected $bank;
    protected $userBank;
    protected $amount;
    protected $type;
    protected $status;
    protected $note;

    public function __construct(
        $user,
        $bank,
        $userBank,
        $amount,
        $status,
        $note
    ){
        $this->user = $user;
        $this->bank = $bank;
        $this->userBank = $userBank;

        if (!is_integer($amount)) {
            abort('500', 'Ada kesalahan dalam inputan, jumlah harus angka.');
        }

        $this->amount = $amount;
        $this->status = $status;
        $this->note = $note;

        $this->createUniqueCode();
    }

    protected function createUniqueCode()
    {
        if ($this->type == TransactionWalletEnum::TYPE_DEPOSIT) {
            $this->uniqueCode = rand(1, 500);
        } else {
            $this->uniqueCode = 0;
        }
    }

    public function create()
    {
        $uniqueCode = $this->uniqueCode;
        $amount = $this->amount;
        $totalAmount = $uniqueCode + $this->amount;

        $trxWallet = \App\TransactionWallet::create([
            'user_id' => $this->user->id,
            'bank' => $this->bank,
            'user_bank' => $this->userBank,
            'unique_code' => $uniqueCode,
            'amount' => $amount,
            'total_amount' => $totalAmount,
            'type' => $this->type,
            'status' => $this->status,
            'note' => $this->note
        ]);

        return $trxWallet;
    }
}
