<?php

namespace App\Http\Controllers\Pages\Produk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function product()
    {
        return view('pages.produk');
    }
}
