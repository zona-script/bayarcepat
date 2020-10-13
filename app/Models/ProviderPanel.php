<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProviderPanel extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'provider_panel';

    protected $guarded = [];

    protected $casts = [];

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsActive($query, $value = true)
    {
        return $query->isAvailable($value);
    }

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsAvailable($query, $value = true)
    {
        return $query->where('is_active', $value);
    }

    public function panelProducts()
    {
        return $this->hasMany(PanelProduct::class);
    }

    public function products()
    {
        return $this->panelProducts();
    }

    private function cleaningText($value)
    {
        return preg_replace( "/\r|\n/", "", $value);
    }
}
