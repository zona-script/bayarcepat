<?php

namespace App\Http\Controllers\Dashboard\SendMoney;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.kirim-uang.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username_or_phone' => 'required',
            'money_amount' => 'required|min:1',
            'description' => 'nullable|string',
        ]);
        $user = User::where('email', $request)->firstOrFail();
        return $user;

        return $request;
    }
}
