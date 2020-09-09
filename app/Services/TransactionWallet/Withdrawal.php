<?php

namespace App\Services\TransactionWallet;

use App\Enums\TransactionWalletEnum;

class Withdrawal extends TransactionWallet
{
    protected $type = TransactionWalletEnum::TYPE_WITHDRAWAL;
}
