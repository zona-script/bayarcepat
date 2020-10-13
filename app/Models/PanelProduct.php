<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PanelProduct extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'panel_products';

    protected $guarded = [];

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsProviderAvailable($query, $value = true)
    {
        return $query->providerPanel->where('is_active', $value);
    }

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsAvailable($query, $value = true)
    {
        return $query->where('is_available', $value);
    }

    public function providerPanel()
    {
        return $this->hasOne(ProviderPanel::class, 'id', 'provider_panel_id');
    }

    public function setIsAvailableAttribute($value)
    {
        $this->attributes['is_available'] = number_or_numeric_to_boolean($value);
    }

}
