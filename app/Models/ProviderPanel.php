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

    protected $casts = [
        'credential' => 'array',
        'config' => 'array',
        'format_data' => 'array',
        'get_profile_append_data' => 'array',
        'get_services_append_data' => 'array',
        'check_status_append_data' => 'array',
        'create_order_append_data' => 'array',
    ];

    public function panelProducts()
    {
        return $this->hasMany(PanelProduct::class);
    }

    public function products()
    {
        return $this->panelProducts();
    }

//    public function getTrxCredentialAttribute($value)
//    {
//        return json_decode($value);
//    }

    public function setCredentialAttribute($value)
    {
        $this->attributes['credential'] = $this->cleaningText($value);
    }

    public function setGetProfileAppendDataAttribute($value)
    {
        $this->attributes['get_profile_append_data'] = $this->cleaningText($value);
    }

    public function setGetServiceAppendDataAttribute($value)
    {
        $this->attributes['get_services_append_data'] = $this->cleaningText($value);
    }

    public function setCheckStatusAppendDataAttribute($value)
    {
        $this->attributes['check_status_append_data'] = $this->cleaningText($value);
    }

    public function setCreateOrderAppendDataAttribute($value)
    {
        $this->attributes['create_order_append_data'] = $this->cleaningText($value);
    }

    private function cleaningText($value)
    {
        return preg_replace( "/\r|\n/", "", $value);
    }
}
