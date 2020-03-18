<?php

namespace App\Http\Controllers\ApiWeb;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function __invoke()
    {
        $contacts = Contact::where('user_id', Auth::id())->get();

        return $contacts;
    }
}
