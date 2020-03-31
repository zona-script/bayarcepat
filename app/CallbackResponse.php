<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CallbackResponse extends Model
{
    use SoftDeletes;
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
