<?php

namespace App\Http\Controllers\Dashboard\Prepaid;

use App\Builders\BayarCepatBuilder;
use App\CallbackResponse;
use App\Enums\CallbackEnum;
use App\Enums\TransactionEnum;
use App\Http\Controllers\Controller;
use App\Jobs\ProcessSendMessagetoTelegram;
use App\Jobs\ProcessSendMessagetoTelegramFromMarket;
use App\Partners\Digiflazz\DigiflazzBuilder;
use App\Partners\Digiflazz\DigiflazzEnum;
use App\Services\Digiflazz\Buyer\DigiflazzBuyer;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrepaidController extends Controller
{
    protected $digiflazzBuyer;

    public function __construct(DigiflazzBuyer $digiflazzBuyer)
    {
        $this->digiflazzBuyer = $digiflazzBuyer;
    }

    public function index()
    {
        $products = $this
            ->digiflazzBuyer
            ->getPrepaid()
            ->get();

        return view('dashboard.prepaid.index', compact('products'));
    }
}
