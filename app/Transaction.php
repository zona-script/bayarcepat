<?php

namespace App;

use App\Enums\TransactionEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'user_id', 'type', 'phone_number', 'value', 'message', 'information', 'status'
    ];

    // array, json
    public $casts = [
        'message' => 'array',
        'information' => 'array',
    ];

    protected $appends = ['type_string', 'status_string', 'date', 'time'];

    public function getTypeStringAttribute()
    {
        return TransactionEnum::type($this->type);
    }

    public function getStatusStringAttribute()
    {
        return TransactionEnum::status($this->status);
    }

    public function getDateAttribute()
    {
        return Carbon::parse($this->created_at)->toDateString();
    }

    public function getTimeAttribute()
    {
        return Carbon::parse($this->created_at)->toTimeString();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function callbackResponse()
    {
        return $this->hasMany(CallbackResponse::class);
    }
}
