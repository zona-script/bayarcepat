<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
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

    public function contactMe()
    {
        return view('pages.contact-me');
    }

    public function membership()
    {
        return view('pages.membership');
    }
}
