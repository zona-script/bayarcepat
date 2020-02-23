<?php

namespace App\Http\Controllers\Api\Local;

use App\Http\Controllers\Controller;
use App\JavaH2H\JavaH2HBuilder;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(Request $request)
    {

        return '';
        $result =  JavaH2HBuilder::make()
            ->getVoucherGame()
            ->groupBy()
            ->get();

        return $result;
    }
}
