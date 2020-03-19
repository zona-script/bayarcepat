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
                ->where('category', [urldecode($request->query('category'))])
                ->groupBy()
                ->get();
        }

        $data = DigiflazzBuilder::make()
            ->prabayar()
            ->distinct()
            ->get();

        if ($request->query('sorting', false)) {
            $collection = collect($data);
            $sorted = $collection->sortBy('category');
            return $sorted->values()->all();
        }

        return $data;
    }

    public function pulsa()
    {
//        DigiflazzBuilder::make()
//            ->
    }
}
