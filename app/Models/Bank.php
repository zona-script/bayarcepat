<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'banks';

    protected $fillable = [
        'id',
        'bank_name',
        'type',
        'bank_account_number',
        'note',
        'logo'
    ];

    protected $with = ['bankMaster'];

    public function bankMaster() {
        return $this->belongsTo(BankMaster::class);
    }
}
