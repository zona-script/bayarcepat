<?php

namespace App\Services\Transactions;

use App\Services\Digiflazz\Buyer\DigiflazzBuyer;

abstract class TransactionAbstract implements TransactionInterface
{
    protected $user;
    protected $buyerSkuCode = '';
    protected $customerNumber = '';
    protected $phoneNumber = '';
    protected $message = '';
    protected $isTesting = false;
    protected $digiflazzBuyer;

    public function __construct($user, $buyerSkuCode, $customerNumber, $phoneNumber = '', $message = '', $isTesting = false)
    {
        $this->user = $user;
        $this->buyerSkuCode = $buyerSkuCode;
        $this->customerNumber = $customerNumber;
        $this->phoneNumber = $phoneNumber;
        $this->message = $message;
        $this->isTesting = $isTesting;

        $this->digiflazzBuyer = new DigiflazzBuyer();
    }
}
