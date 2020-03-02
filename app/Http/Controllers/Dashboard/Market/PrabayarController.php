<?php

namespace App\Http\Controllers\Dashboard\Market;

use App\Http\Controllers\Controller;
use App\Partners\Digiflazz\DigiflazzBuilder;
use Illuminate\Http\Request;

class PrabayarController extends Controller
{
    public function index()
    {
        $products = DigiflazzBuilder::make()->getPrabayar();

        return view('dashboard.market.prabayar.index', compact('products'));
    }

    public function store(Request $request)
    {
        return $request;
    }
}
