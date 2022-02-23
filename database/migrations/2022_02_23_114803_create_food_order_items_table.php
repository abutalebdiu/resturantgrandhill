<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('food_orders')->onDelete('cascade');
            $table->integer('food_id');
            $table->integer('price');
            $table->integer('quantity')->default(1);
            $table->integer('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_order_items');
    }
}
