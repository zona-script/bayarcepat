<?php

namespace App\Http\Controllers\ApiWeb;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __invoke()
    {
        return Auth::user();
    }

    public function index(Request $request)
    {
        if ($request->has('key')) {
            $users = User::select('username', 'phone_number')->where('username', 'like', '%'. $request->query('key') .'%')
                ->orWhere('phone_number', 'like', '%'. $request->query('key') .'%')
                ->get();
            return response()
                ->json($users);
        }

        return response()
            ->json([]);
    }
}
