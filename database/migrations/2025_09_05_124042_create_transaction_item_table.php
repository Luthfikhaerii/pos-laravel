<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_item', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('transaction_id')->references('id')->on('transaction')->onDelete('cascade');
            $table->string('name_product');
            $table->integer('price');
            $table->integer('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_item');
    }
};
