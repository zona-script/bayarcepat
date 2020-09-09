<?php
namespace App\Services\TransactionWallet;

use Carbon\CarbonInterface;

class History {
    protected $user;
    protected $sortBy;
    protected $orderBy;
    protected $query;

    public function __construct($user, $transactionWalletID, $orderBy, $sortBy, CarbonInterface $fromDate, CarbonInterface $toDate)
    {
        $this->query = TransactionWallet::query();

        if (!is_null($transactionWalletID)) {
            $this->show($transactionWalletID);
        }

        if (!is_null($fromDate) && !is_null($toDate)) {
            $this->fromDate($fromDate);
            $this->toDate($toDate);
        }

        $this->query = $this->query->orderBy($orderBy, $sortBy);

        return $this;
    }

    public function fromDate(CarbonInterface $carbon)
    {
        $this->query = $this->query->whereDate('created_at', '>=', $carbon->toDateTimeString());
    }

    public function toDate(CarbonInterface $carbon)
    {
        $this->query = $this->query->whereDate('created_at', '>=', $carbon->toDateTimeString());
    }

    public function show($id)
    {
        $this->query = $this->query->where('id', $id);
    }

    public function query()
    {
        return $this->query;
    }
}
