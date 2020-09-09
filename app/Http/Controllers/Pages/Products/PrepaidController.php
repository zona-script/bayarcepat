<?php

namespace App\Http\Controllers\Pages\Products;

use App\Http\Controllers\Controller;
use App\Services\Digiflazz\Buyer\Digiflazz;
use App\Services\Digiflazz\Buyer\DigiflazzBuyer;
use App\Services\Digiflazz\DigiflazzInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class PrepaidController extends Controller
{
    public function __invoke(Request $request) {
        $products = (new DigiflazzBuyer())->getPrepaid()->group()->get();

        return view('pages.products.prepaid', compact('products'));
    }
}
