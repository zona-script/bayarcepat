<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function product()
    {
        return view('pages.produk');
    }

    public function tos()
    {
        return view('pages.tos');
    }

    public function privacyPolicy()
    {
        return view('pages.policy-privacy');
    }

    public function aboutMe()
    {
        return view('pages.tentang-kami');
    }
}
