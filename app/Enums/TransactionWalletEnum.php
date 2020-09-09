<?php

namespace App\Enums;

class TransactionWalletEnum
{
    const TYPE_DEPOSIT = 1;
    const TYPE_WITHDRAWAL = 2;

    const STATUS_WAITING_PAYMENT = 0;
    const STATUS_PENDING = 1;
    const STATUS_SUCCESS = 2;
    const STATUS_FAILED = 3;
    const STATUS_CANCEL = 4;
    const STATUS_FRAUD = 5;
}
