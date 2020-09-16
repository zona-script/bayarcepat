<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\LocationEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Index', [
            'user' => Auth::user()
        ]);
        $provinces = LocationEnum::provinsi();
        $cities = LocationEnum::kabupaten();
        return view('dashboard.index', compact('provinces', 'cities'));
    }

    public function update(Request $request)
    {
        $request->validate([
           'phone_number' => 'required|string',
           'country' => 'required|string',
           'province' => 'required|string',
           'cities' => 'required|string',
           'postal_code' => 'required|string',
           'address' => 'required|string',
           'about_me' => 'required|string',
        ]);

        $user = Auth::user();
        $user->update([
            'phone_number' => $request->input('phone_number'),
            'country' => $request->input('country'),
            'province' => $request->input('province'),
            'cities' => $request->input('cities'),
            'postal_code' => $request->input('postal_code'),
            'address' => $request->input('address'),
            'bio' => $request->input('about_me'),
            'complete_identity' => Carbon::now()
        ]);

        return redirect()
            ->route('web.dashboard.index')
            ->with('success', 'Profile Berhasil di update.');
    }

    public function verified(Request $request)
    {
        $request->validate([
            'photo_profile' => 'required|mimes:jpeg,jpg,png,gif',
            'photo_profile' => 'required|mimes:jpeg,jpg,png,gif',
        ]);
    }
}
