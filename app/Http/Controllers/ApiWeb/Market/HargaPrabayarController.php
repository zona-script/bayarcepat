<?php

namespace App\Http\Controllers\ApiWeb\Market;

use App\Http\Controllers\Controller;
use App\Partners\Digiflazz\DigiflazzBuilder;
use Illuminate\Http\Request;

class HargaPrabayarController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('category')) {
            return DigiflazzBuilder::make()
                ->prabayar()
                ->where('category', [$request->query('category')])
                ->groupBy()
                ->get();
        }

        return DigiflazzBuilder::make()
            ->prabayar()
            ->distinct()
            ->get();

        return DigiflazzBuilder::make()
            ->prabayar()
            ->groupBy()
            ->get();
    }

    public function pulsa()
    {
//        DigiflazzBuilder::make()
//            ->
    }
}
