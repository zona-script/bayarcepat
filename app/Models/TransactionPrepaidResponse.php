<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TransactionPrepaidResponse extends Model
{
    use SoftDeletes;
    protected $table = 'transaction_prepaid_response';

    protected $fillable = [
        'id',
        'transaction_prepaid_id',
        'ref_id',
        'message',
        'status',
        'rc',
        'sn',
        'buyer_last_saldo',
        'price'
    ];

    public function transactionPrepaid()
    {
        return $this->belongsTo(TransactionPrepaid::class);
    }
}
