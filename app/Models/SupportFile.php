<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupportFile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'support_files';

    protected $fillable = ['support_id', 'file', 'file_type', 'format'];

    public function support()
    {
        return $this->belongsTo(Support::class);
    }
}
