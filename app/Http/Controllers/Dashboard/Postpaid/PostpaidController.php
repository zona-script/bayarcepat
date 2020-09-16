<?php

namespace App\Http\Controllers\Dashboard\Postpaid;

use App\Http\Controllers\Controller;
use App\Partners\Digiflazz\DigiflazzBuilder;
use App\Services\Digiflazz\Buyer\DigiflazzBuyer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostpaidController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Postpaid/Index');
    }
}
