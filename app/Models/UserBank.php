<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserBank extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $guarded = [];

    protected $with = ['bankMaster'];

    public function bankMaster() {
        return $this->belongsTo(BankMaster::class);
    }
}
