<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phonebook extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'phone_book';
    protected $fillable = ['id', 'user_id', 'name', 'phone_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
