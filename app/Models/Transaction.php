<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Transaction_item;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';
    protected $fillable = [
        'amount_item',
        'total_price',
        'date_transaction',
    ];

    public function transaction_item(): HasMany {
        return $this->hasMany(Transaction_item::class);
    }

    

}
