<?php

namespace App\Http\Controllers\Dashboard\Market;

use App\Http\Controllers\Controller;
use App\Partners\Digiflazz\DigiflazzBuilder;
use Illuminate\Http\Request;

class PascabayarController extends Controller
{
    public function index()
    {
        $products = DigiflazzBuilder::make()->cekHargaPasca();
        return view('dashboard.market.pascabayar.index');
    }
}
