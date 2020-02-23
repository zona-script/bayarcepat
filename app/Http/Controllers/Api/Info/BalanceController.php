<?php

namespace App\Http\Controllers\Api\Info;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    public function __invoke(Request $request)
    {
        return [
            'success' => true,
            'data' => Auth::user()
        ];
    }
}
