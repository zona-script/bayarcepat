<?php

namespace App;

use App\Enums\BayarCepatPayEnum;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;
    use HasApiTokens;
    use SoftDeletes;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use TwoFactorAuthenticatable;

    protected $guarded = [];

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
