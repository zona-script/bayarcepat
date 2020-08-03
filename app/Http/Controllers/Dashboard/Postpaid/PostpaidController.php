<?php

namespace App\Http\Controllers\Dashboard\Postpaid;

use App\Http\Controllers\Controller;
use App\Partners\Digiflazz\DigiflazzBuilder;
use App\Services\Digiflazz\Buyer\DigiflazzBuyer;
use Illuminate\Http\Request;

class PostpaidController extends Controller
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
            ->getPostpaid()
            ->groupBy('brand')
            ->get();

        return view('dashboard.postpaid.index', compact('products'));
    }
}
