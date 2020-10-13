<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TransactionPanelStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = Str::lower($value);
    }

    public function transactionPanel()
    {
        return $this->belongsTo(TransactionPanel::class);
    }
}
