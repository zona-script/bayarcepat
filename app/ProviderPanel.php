<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProviderPanel extends Model
{
    use SoftDeletes;
    protected $table = 'provider_panel';

    protected $guarded = [];

    protected $casts = [
        'config' => 'array',
        'result_data' => 'array',
        'trx_credential' => 'array',
        'trx_get_profile' => 'array',
        'trx_get_services' => 'array',
        'trx_check_status' => 'array',
        'trx_create_order' => 'array',
    ];

    public function panelProducts()
    {
        return $this->hasMany(PanelProduct::class);
    }

    public function products()
    {
        return $this->panelProducts();
    }
}
