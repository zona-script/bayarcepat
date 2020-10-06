<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'contacts';

    // mencari apakah ada di types
    public static function getwhereInType(string $value)
    {
        $data = self::getTypes();

        foreach ($data as $item) {
            if ($item == $value) {
                return true;
            }
        }

        return false;
    }

    public static function getTypes($key = '')
    {
        $data = [
            'hp',
            'pln',
            'pln-pascabayar',
            'emoney',
            'pdam',
            'internet',
            'bpjs',
            'multifinance',
            'pbb'
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
