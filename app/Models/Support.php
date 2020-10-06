<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Support extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'supports';

    protected $fillable = ['user_id', 'title', 'description', 'type', 'close_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function files()
    {
        return $this->hasMany(SupportFile::class);
    }

    public function supportFiles()
    {
        return $this->files();
    }
}
