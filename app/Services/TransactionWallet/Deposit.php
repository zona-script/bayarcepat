<?php

namespace App\Services\TransactionWallet;

use App\Enums\TransactionWalletEnum;

class Deposit extends TransactionWallet
{
    protected $type = TransactionWalletEnum::TYPE_DEPOSIT;
}
