<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Transaction;

class Transaction_item extends Model
{
    use HasFactory;
    protected $table = 'transaction_item';
    protected $fillable = [
        'transaction_id',
        'name_product',
        'price',
        'amount',
    ];

    public function transaction():BelongsTo {
        return $this->belongsTo(Transaction::class);
    }

}
