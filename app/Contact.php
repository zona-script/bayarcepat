<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $table = 'contacts';

    public static function getTypes($key = '')
    {
        $data = [
            'hp',
            'pln'
        ];

        if (!blank($key)) {
            return $data[$key];
        }

        return $data;
    }

    protected $fillable = [
        'user_id',
        'phone_number',
        'name',
        'type',
        'customer_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
