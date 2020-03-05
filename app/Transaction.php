<?php

namespace App;

use App\Enums\TransactionEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'id',
        'value',
        'message',
        'information',
        'status',
        'user_id',
        'type',
        'phone_number'
    ];

    // array, json
    public $casts = [
        'type' => 'string',
        'message' => 'array',
        'information' => 'array',
    ];

    protected $hidden = [];

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
