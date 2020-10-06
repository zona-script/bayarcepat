<?php

namespace App\Services\Balance;

use App\Models\Balances;

class PreviousBalance
{
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function get()
    {
        $result = Balances::where('user_id', $this->user->id)
            ->orderBy('id', 'desc')
            ->first();

        if (blank($result)) {
            return 0;
        }

        return $result->previous_balance;
    }
}
