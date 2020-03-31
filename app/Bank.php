<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use SoftDeletes;
    protected $table = 'bank';

    protected $fillable = [
        'id', 'bank_name', 'bank_account_name', 'type',
        'bank_account_number', 'note', 'logo'
    ];
}
