<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phonebook extends Model
{
    protected $table = 'phone_book';
    protected $fillable = ['id', 'user_id', 'name', 'phone_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
