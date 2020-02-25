<?php

namespace App;

use App\Enums\BayarCepatPayEnum;
use App\Enums\EasypayTransactionTypEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BayarCepatPay extends Model
{
    protected $table = 'bayar_cepat_pays';
    protected $fillable = [
        'user_id', 'type', 'value', 'information', 'previous_balance'
    ];

    protected $appends = [
        'balance'
    ];


    // auth idnya, admin tidak bisa cek.
    public function getBalanceAttribute()
    {
        $out = $this->where('user_id', Auth::id())
            ->where('type', BayarCepatPayEnum::$typeOUT)
            ->sum('value');
        $in = $this->where('user_id', Auth::id())
            ->where('type', BayarCepatPayEnum::$typeIN)
            ->sum('value');

        if (blank($in)) {
            return 0;
        }

        return ($in - $out);
    }

    public function setBalanceAttribute()
    {
        return $this->getBalanceAttribute();
    }

//    public function setPreviousBalanceAttribute($value)
//    {
//        $bayarCepatPayLatest  = BayarCepatPay::where('user_id', 1)
//            ->orderByDesc('id')
//            ->first();
//
//        if (blank(optional($bayarCepatPayLatest)->balance)) {
//            $pbc = 0;
//        } else {
//            $pbc = $bayarCepatPayLatest->balance;
//
//            $out = BayarCepatPay::where('user_id',  1)
//                ->where('type', BayarCepatPayEnum::$typeOUT)
//                ->sum('value');
//            $in = BayarCepatPay::where('user_id',  1)
//                ->where('type', BayarCepatPayEnum::$typeIN)
//                ->sum('value');
//
//            $pbc = ($in - $out);
//        }
//
//        return $pbc;
//    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
