<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->foreignUuid('id')->constrained('header_transactions', 'id')->nullable(false);
            $table->foreignId('product_id')->constrained('products', 'id');
            $table->integer('quantity');
            $table->integer('price_per_unit')->nullable();
            $table->integer('total_price')->nullable();
            $table->primary(['id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transactions');
    }
}
