<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';

    protected $fillable = [
        'id', 'bank_name', 'bank_account_name', 'type',
        'bank_account_number', 'note', 'logo'
    ];
}
