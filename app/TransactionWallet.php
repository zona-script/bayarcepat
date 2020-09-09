<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionWallet extends Model
{
    use SoftDeletes;
    protected $table = 'transaction_wallets';

    protected $fillable = [
        'user_id',
        'bank',
        'user_bank',
        'unique_code',
        'amount',
        'total_amount',
        'type',
        'status',
        'note',
        'note_from_server'
    ];

    protected $casts = [
        'bank' => 'array',
        'user_bank' => 'array',
    ];
}
