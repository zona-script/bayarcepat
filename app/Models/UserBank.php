<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserBank extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $with = ['bankMaster'];

    public function bankMaster() {
        return $this->belongsTo(BankMaster::class);
    }
}
