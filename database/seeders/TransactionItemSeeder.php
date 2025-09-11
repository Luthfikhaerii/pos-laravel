<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction_item;

class TransactionItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction_item::insert([
            [
            'transaction_id' => 1,
            'name_product' => 'Kopi Susu',
            'amount' => 2,
            'price'=>3000
            ],
            [
            'transaction_id' => 1,
            'name_product' => 'Match Panas',
            'amount' => 2,
            'price'=>3000
            ],
            [
            'transaction_id' => 2,
            'name_product' => 'Kopi Susu',
            'amount' => 2,
            'price'=>3000
            ],
            [
            'transaction_id' => 3,
            'name_product' => 'Kopi Susu',
            'amount' => 2,
            'price'=>3000
            ],
            [
            'transaction_id' => 4,
            'name_product' => 'Kopi Susu',
            'amount' => 2,
            'price'=>3000
            ],
            [
            'transaction_id' => 5,
            'name_product' => 'Kopi Susu',
            'amount' => 2,
            'price'=>3000
            ],
            [
            'transaction_id' => 6,
            'name_product' => 'Kopi Susu',
            'amount' => 2,
            'price'=>3000
            ],
        ]);
    }
}
