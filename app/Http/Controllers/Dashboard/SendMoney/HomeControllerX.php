<?php

namespace App\Http\Controllers\Dashboard\SendMoney;

use App\Builders\BayarCepatBuilder;
use App\Builders\BayarCepatPayBuilder;
use App\Enums\TransactionEnum;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class HomeControllerX extends Controller
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

        $user = User::where('email', $request->username_or_phone)->first();

        if (blank($user)) {
            return redirect()->route('web.dashboard.kirim-uang.index')
                ->with('error', 'Pengguna tidak di temukan.');
        }

        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'type' => TransactionEnum::$typeBayarCepatPaySendMoney,
            'value' => $request->input('money_amount'),
            'information' => [
                'user' => $user,
                'description' => $request->input('description', null),
                'money_amount' => $request->input('money_amount')
            ],
            'status' => TransactionEnum::$statusSuccess
        ]);

        BayarCepatBuilder::make()
            ->sendMoney($transaction);

        return redirect()->route('web.dashboard.kirim-uang.index')
            ->with('success', 'Uang berhasil dikirim ke '. $user->name . ' dengan alamat email '. $user->email. '.');
    }
}
