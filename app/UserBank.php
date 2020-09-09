<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserBank extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function bankMaster() {
        return $this->belongsTo(BankMaster::class);
    }
}
