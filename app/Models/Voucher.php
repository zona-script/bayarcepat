<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'vouchers';

    protected $fillable = [
        'type', 'code', 'title', 'description', 'number', 'expired_at'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_vouchers');
    }

    public function userVoucher()
    {
        return $this->hasMany(UserVoucher::class);
    }
}
