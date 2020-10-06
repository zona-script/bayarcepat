<?php


namespace App\Builders;

use App\Models\BayarCepatPay;
use App\Enums\BayarCepatPayEnum;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BayarCepatPayBuilder
{
    public static function make()
    {
        return new BayarCepatPayBuilder();
    }

    public function getBalance($userID = '')
    {
        if (blank($userID)) {
            $id = Auth::id();
        } else {
            $id = $userID;
        }

//        $user = User::findOrFail($id);
//        dd($user->balance);
//        return $user->balance;

        $out = BayarCepatPay::where('user_id', $id)
            ->where('type', BayarCepatPayEnum::$typeOUT)
            ->sum('value');
        $in =  BayarCepatPay::where('user_id', $id)
            ->where('type', BayarCepatPayEnum::$typeIN)
            ->sum('value');

        if (blank($in)) {
            return 0;
        }

        return ($in - $out);
    }

    public static function getRandomUniqueCode($USD = false)
    {
        if ($USD) {
            return 0;
        }
        return rand(100, 999);
    }
}
