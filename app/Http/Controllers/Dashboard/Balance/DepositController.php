<?php

namespace App\Http\Controllers\Dashboard\Balance;

use App\Bank;
use App\BankMaster;
use App\Builders\BayarCepatPayBuilder;
use App\Enums\CurrencyRateEnum;
use App\Enums\TransactionEnum;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\UserBank;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DepositController extends Controller
{
    public function index()
    {
        $banks = BankMaster::with('bank')
            ->whereHas('bank', function (Builder $query) {
                $query->where('status', 1);
            })
            ->get();

//        $userBanks = UserBank::where('user_id', \auth()->id())->get();

        return Inertia::render('Dashboard/Balance/Deposit/Index', [
            'banks' => $banks,
//            'userBanks' => $userBanks,
        ]);
        return view('dashboard.balance.deposit.index');
    }

    public function create(Request $request)
    {
        $banks = Bank::where('type', 'paypal')->get();
        if ($request->input('type') == 'paypal') {
            return view('dashboard.balance.deposit.paypal', compact('banks'));
        }

        $banks = Bank::where('type', 'bank')->get();
        return view('dashboard.balance.deposit.bank', compact('banks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_id' => 'required',
            'amount_money' => 'required',
            'bank_account_name' => 'required',
            'bank_name' => 'required',
            'bank_account_number' => 'required',
            'note' => 'nullable'
        ]);

        $bank = Bank::findOrFail($request->input('bank_id'))
            ->toArray();

        $amount = $request->input('amount_money');

        $bank = Arr::add($bank, 'value', $amount);
        if ($request->input('type') == 'paypal') {
            $type = 'paypal';
            $resultCount = CurrencyRateEnum::live($request->input('amount_money'));
            $bank = Arr::add($bank, 'value_unique', BayarCepatPayBuilder::getRandomUniqueCode(true));
            $bank = Arr::add($bank, 'value_total', $resultCount['amount_idr_with_fee']);
            $bank = Arr::add($bank, 'currency', $resultCount);

            $fee = $resultCount['fee_idr'];

            $valueTotal = $resultCount['amount_idr_with_fee'];
        } else {
            $type = 'bank';
            $fee = null;

            $uniqueCode = BayarCepatPayBuilder::getRandomUniqueCode(false);
            $total = (int) $amount + $uniqueCode;
            $bank = Arr::add($bank, 'value_unique', $uniqueCode);
            $bank = Arr::add($bank, 'value_total', $total);

            $valueTotal = $total;
        }

        $userBank = $request->only([
            'bank_account_name',
            'bank_name',
            'bank_account_number'
        ]);

        // informasi transaksi
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'type' => TransactionEnum::$typeBayarCepatPayDeposit,
            'value' => $valueTotal,
            'message' => $request->only('note', null),
            'information' => TransactionEnum::makeDepositInformation($bank, $userBank, $type, $fee),
            'status' => TransactionEnum::$statusProcess
        ]);

        return redirect()
            ->route('web.dashboard.riwayat.show', $transaction->id)
            ->with('success', 'Pengajuan deposit anda diterima. Buka halaman riwayat transaksi untuk melihat status deposit.');
    }

    private function formatCurrency($nominal, $currency = 'idr', $live = 1)
    {
        return [
            'nominal' => $nominal,
            'currency' => $currency,
            'live_price' => $live
        ];
    }
}
