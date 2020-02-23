<?php

namespace App\Http\Controllers\Dashboard\PrintInvoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.cetak-struk.index');
    }
}
