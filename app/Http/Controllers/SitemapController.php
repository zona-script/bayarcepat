<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class SitemapController extends Controller
{
    public function index()
    {
        $links = Route::getRoutes()->get();

        return view('sitemap', compact('links'));
    }
}
