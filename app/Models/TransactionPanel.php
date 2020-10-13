<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TransactionPanel extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = Str::lower($value);
    }

    public function providerPanel()
    {
        return $this->belongsTo(ProviderPanel::class);
    }

    public function transactionPanelStatus()
    {
        return $this->hasMany(TransactionPanelStatus::class, 'transaction_panel_id', 'id');
    }
}
