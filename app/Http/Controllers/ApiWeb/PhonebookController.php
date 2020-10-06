<?php

namespace App\Http\Controllers\ApiWeb;

use App\Http\Controllers\Controller;
use App\Models\Phonebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhonebookController extends Controller
{
    public function __invoke()
    {
        return Phonebook::where('user_id', Auth::id())->get();
    }
}
