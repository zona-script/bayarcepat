<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallbackResponse extends Model
{
    protected $table = 'callback_response';

    // array, json
    public $casts = [
        'data' => 'array'
    ];

    protected $fillable = [
        'id', 'transaction_id', 'provider'. 'data', 'status'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
