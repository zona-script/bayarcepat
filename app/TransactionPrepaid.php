<?php

namespace App;

use App\Enums\PrepaidEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class TransactionPrepaid extends Model
{
    use SoftDeletes;
    protected $table = 'transaction_prepaid';

    protected $fillable = [
        'id',
        'user_id',
        'ref_id',
        'product',
        'customer_number',
        'message', // temp message 1
        'information', // temp message 2 (from server)
        'status',
        'price',
    ];

    public $casts = [
        'product' => 'array',
        'message' => 'array',
        'information' => 'array',
    ];

    protected $hidden = [];

    protected $appends = ['status_raw', 'date', 'time'];

    public function getStatusRawAttribute()
    {
        return PrepaidEnum::findStatus($this->status);
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

    public function transactionPrepaidResponse()
    {
        return $this->hasMany(TransactionPrepaidResponse::class);
    }
}
