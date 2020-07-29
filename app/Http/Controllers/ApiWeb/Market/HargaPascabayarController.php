<?php

namespace App\Http\Controllers\ApiWeb\Market;

use App\Http\Controllers\Controller;
use App\Partners\Digiflazz\DigiflazzBuilder;
use Illuminate\Http\Request;

class HargaPascabayarController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('category')) {
            $category = base64_decode(urldecode($request->query('category')));
            return DigiflazzBuilder::make()
                ->pascabayar()
                ->where('category', [$category])
//                ->where('category', [urldecode($request->query('category'))])
                ->groupBy()
                ->get();
        }

        $data = DigiflazzBuilder::make()
            ->pascabayar()
            ->distinct()
            ->get();

        if ($request->query('sorting', false)) {
            $collection = collect($data);
            $sorted = $collection->sortBy('category');
            return $sorted->values()->all();
        }

        return $data;
    }
}
