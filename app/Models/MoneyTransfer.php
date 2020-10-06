<?php

namespace App\Models;

use App\Traits\ModelDateTimeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyTransfer extends Model
{
    use ModelDateTimeTrait;
    use HasFactory;
    protected $table = 'money_transfers';
    protected $fillable = [
        'id',
        'sender_user_id',
        'received_user_id',
        'amount',
        'message',
        'message_from_server',
        'status'
    ];

    protected $appends = [
        'status_string',
        'status_string_html',
        'created_at_raw',
        'updated_at_raw',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_user_id', 'id');
    }

    public function received()
    {
        return $this->belongsTo(User::class, 'received_user_id', 'id');
    }

    public function getStatusStringAttribute($value)
    {
        if ($this->status == 1) {
            return 'Sukses';
        }

        return 'Gagal';
    }

    public function getStatusStringHtmlAttribute($value)
    {
        if ($this->status == 1) {
            return '<span class="tag is-primary">sukses</span>';
        }

        return '<span class="tag is-danger">gagal</span>';
    }
}
