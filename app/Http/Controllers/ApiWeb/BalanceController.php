<?php

namespace App\Http\Controllers\ApiWeb;

use App\Builders\BayarCepatPayBuilder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    public function __invoke()
    {
        return [
            'success' => true,
            'data' => Auth::user()
                ->only(['balance', 'balance_number_format'])
        ];
    }
}
