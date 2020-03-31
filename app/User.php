<?php

namespace App;

use App\Enums\BayarCepatPayEnum;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;
    use HasApiTokens;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'phone_number', 'username',
        'country', 'province', 'city',
        'postal_code', 'address', 'bio',
        'photo_profile', 'id_card', 'id_card_with_photo',
        'verified', 'complete_identity',
        'store_name', 'store_address', 'store_phone_number',
        'store_logo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id_card', 'id_card_with_photo',
        'password', 'remember_token',
    ];

    protected $appends = [
        'balance',
        'balance_number_format'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getBalanceAttribute()
    {
        $result = $this->bayarCepatPays()->first();
        if (blank($result)) {
            return 0;
        }

        return $result->balance;
    }
    public function getBalanceNumberFormatAttribute()
    {
        $result = $this->bayarCepatPays()->first();
        if (blank($result)) {
            return 0;
        }

        return number_format($result->balance, '0', ',','.');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function bayarCepatPays()
    {
        return $this->hasMany(BayarCepatPay::class);
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
