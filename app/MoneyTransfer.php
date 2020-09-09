<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoneyTransfer extends Model
{
    protected $table = 'money_transfers';
    protected $fillable = [
        'id',
        'sender_user_id',
        'received_user_id',
        'amount',
        'message',
        'message_from_server',
        'status'
    ];

    public function sender()
    {
        return $this->belongsTo(User::class);
    }

    public function received()
    {
        return $this->belongsTo(User::class);
    }
}
