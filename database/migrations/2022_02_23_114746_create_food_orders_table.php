<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('mobile')->nullable();
            $table->text('address')->nullable();
            $table->integer('table_no');
            $table->integer('sub_total');
            $table->integer('service_charge')->nullable();
            $table->integer('vat')->nullable();
            $table->integer('total')->nullable();
            $table->enum('status', ['1', '2'])->default('1');
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
        Schema::dropIfExists('food_orders');
    }
}
