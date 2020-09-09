<?php


namespace App\Services\TransactionWallet;


use App\Enums\TransactionEnum;
use App\Enums\TransactionWalletEnum;
use Carbon\Carbon;
use Carbon\CarbonInterface;

class TransactionWalletFactory
{
    public static function makeDeposit(
        $user,
        $bank,
        $userBank = '',
        $amount = 0,
        $status = TransactionWalletEnum::STATUS_WAITING_PAYMENT,
        $note = ''
    ) {
        return (new Deposit(
            $user,
            $bank,
            $userBank,
            $amount,
            $status,
            $note
        ))->create();
    }

    public static function makeWithdrawal(
        $user,
        $bank,
        $userBank = '',
        $amount = 0,
        $status = TransactionWalletEnum::STATUS_PENDING,
        $note = ''
    ) {
        return (new Withdrawal(
            $user,
            $bank,
            $userBank,
            $amount,
            $status,
            $note
        ))->create();
    }

    public static function history(
        $user,
        $transactionWalletID = null,
        $orderBy = 'id',
        $sortBy = 'desc',
        CarbonInterface $fromDate = null,
        CarbonInterface $toDate = null
    ) {
        if (is_null($transactionWalletID)) {
            return (new History($user, $transactionWalletID, $orderBy, $sortBy, $fromDate, $toDate))->query()->get();
        }

        return (new History($user, $transactionWalletID, $orderBy, $sortBy, $fromDate, $toDate))->query()->first();
    }
}
