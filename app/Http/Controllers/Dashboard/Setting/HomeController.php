<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Enums\PathEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.pengaturan.index', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'store_logo' => 'required',
            'store_name' => 'required',
            'store_phone_number' => 'required',
            'store_address' => 'required',
        ]);

        $pathLogo = Storage::disk('local')
            ->put(PathEnum::$storeLogo, $request->file('store_logo'));

        $user = Auth::user();
        $user->store_name = $request->input('store_name');
        $user->store_phone_number = $request->input('store_phone_number');
        $user->store_address = $request->input('store_address');
        $user->store_logo = $pathLogo;
        $user->save();

        return redirect()
            ->route('web.dashboard.pengaturan.index')
            ->with('success', 'Berhasil di perbarui');
    }
}
