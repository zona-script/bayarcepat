<?php

namespace App\Http\Controllers\ApiWeb;

use App\Http\Controllers\Controller;
use App\Partners\Digiflazz\DigiflazzBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckPostpaidBillController extends Controller
{
    public function __invoke(Request $request)
    {
        $buyerSKUCode = 'pln';
        $customerNumber = '530000000003';
//        $refID = Str::random(10);
        $refID = "some1d";

        $data = DigiflazzBuilder::make()
            ->cekTagihan($buyerSKUCode, $customerNumber, $refID)->toArray();
        return response()->json($data['data']);
    }
}
