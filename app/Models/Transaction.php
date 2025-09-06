<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Products;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_customer',
        'payment_method',
        'amount_item',
        'total_price',
        'date_transaction',
    ];

    public function product(): BelongsToMany {
        return $this->belongsToMany(Product::class);
    }

    

}
