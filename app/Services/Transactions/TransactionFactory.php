<?php

namespace App\Services\Transactions;

use App\User;

class TransactionFactory
{
    public function createPrepaid($user, $productCode, $customerNumber)
    {

    }

    public function createPostpaid($user, $productCode, $customerNumber, $phoneNumber = '')
    {

    }

    public function checkPostpaidBill($user, $buyerSkucode, $customerNumber)
    {

    }

    public function createSMM($user, $productCode, $customerNumber)
    {

    }
}
