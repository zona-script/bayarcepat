<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Refferal extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'refferals';

    protected $fillable = [
        'user_id', 'user_id_ref'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function refferal()
    {
        return $this->belongsTo(User::class, 'user_id_ref');
    }
}
