<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserVoucher extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'user_vouchers';

    protected $fillable = ['voucher_id', 'user_id', 'used_at'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }
}
