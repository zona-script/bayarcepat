<?php


namespace App\Traits;


use App\Balances;
use App\Contact;
use App\Phonebook;
use App\Refferal;
use App\Support;
use App\Transaction;
use App\UserVoucher;
use App\Voucher;
use Spatie\Permission\Traits\HasRoles;

trait UserModelTrait
{
    use HasRoles;

    public function getBalanceAttribute()
    {
        $result = Balances::where('user_id', $this->id)
            ->orderBy('id', 'desc')
            ->first();

        if (blank($result)) {
            return 0;
        }

        return $result->previous_balance;
    }

    public function getBalanceNumberFormatAttribute()
    {
        $result = $this->getBalanceAttribute();

        return number_format($result, '0', ',','.');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function balance()
    {
        return $this->hasMany(Balances::class);
    }

    public function phonebooks()
    {
        return $this->hasMany(Phonebook::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function refferals()
    {
        return $this->hasMany(Refferal::class);
    }

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class, 'user_vouchers');
    }

    public function userVouchers()
    {
        return $this->hasMany(UserVoucher::class);
    }

    public function supports()
    {
        return $this->hasMany(Support::class);
    }
}
