<?php

namespace App\Http\Controllers;

use App\Mail\Invoice\TransactionMail;
use App\Notifications\InvoicePaid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class WelcomeController extends Controller
{
    public function index()
    {
//        Notification::route('mail', 'no-replay@bayarcepat.com')
//            ->notify(new InvoicePaid());
//        Mail::to(Auth::user())->send(new TransactionMail());
//        Mail::to('dries@example.com')->send(new TransactionMail());
//        return new TransactionMail();
        return view('welcome');
    }
}
