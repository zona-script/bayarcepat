<?php


namespace App\Enums;


class BalanceTitle
{
    const TRANSACTION_PREPAID = 1;
    const TRANSACTION_POSTPAID = 2;
    const TRANSACTION_WALLET_DEPOSIT = 3;
    const TRANSACTION_WALLET_WITHDRAWAL = 4;
    const TRANSACTION_REFUND_PREPAID = 11;
    const TRANSACTION_REFUND_POSTPAID = 12;
    const MONEY_TRANSFER = 15;
}