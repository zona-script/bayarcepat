<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PanelProduct extends Model
{
    use SoftDeletes;
    protected $table = 'panel_products';

    protected $guarded = [];

    public function providerPanel()
    {
        return $this->hasOne(ProviderPanel::class);
    }

    public function setIsAvailableAttribute($value)
    {
        $this->attributes['is_available'] = number_or_numeric_to_boolean($value);
    }

}
