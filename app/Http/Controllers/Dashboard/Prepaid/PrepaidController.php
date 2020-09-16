<?php

namespace App\Http\Controllers\Dashboard\Prepaid;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class PrepaidController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Prepaid/Index');
    }
}
