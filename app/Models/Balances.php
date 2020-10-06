<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Balances extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'balances';

    protected $fillable = [
        'user_id',
        'type',
        'amount',
        'title',
        'note',
        'trx_id',
        'information',
        'previous_balance'
    ];

    protected $casts = [
        'information' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
