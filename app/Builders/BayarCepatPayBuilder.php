<?php


namespace App\Builders;


use App\User;
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

        $user = User::findOrFail($id);
        return $user->balance;
    }

    public static function getRandomUniqueCode($USD = false)
    {
        if ($USD) {
            return 0;
        }
        return rand(100, 999);
    }
}
