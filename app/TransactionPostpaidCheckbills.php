<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionPostpaidCheckbills extends Model
{
    protected $table = 'transaction_postpaid_checkbills';

    protected $fillable = [
        'user_id',
        'ref_id',
        'customer_no',
        'brand',
        'customer_name',
        'buyer_sku_code',
        'admin',
        'message',
        'status',
        'rc',
        'sn',
        'buyer_last_saldo',
        'price',
        'selling_price',
        'description',
    ];

    protected $casts = [
        'description' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
