<?php

namespace App;

use App\Enums\BankMasterEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class BankMaster extends Model
{
    use SoftDeletes;
    protected $table = 'bank_master';

    protected $guarded = [];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Str::upper($value);
    }

    public function setTypeAttribute($value)
    {
        if ($value != BankMasterEnum::TYPE_BANK) {
            $this->attributes['type'] = BankMasterEnum::TYPE_DIGITAL_CURRENCY;
        }

        $this->attributes['type'] = Str::upper($value);
    }

    public function bank()
    {
        return $this->hasMany(Bank::class);
    }

    public function userBank()
    {
        return $this->hasMany(UserBank::class);
    }
}
