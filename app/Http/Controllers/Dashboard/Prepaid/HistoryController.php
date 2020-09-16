<?php

namespace App\Http\Controllers\Dashboard\Prepaid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HistoryController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Prepaid/History/Index');
    }
}
