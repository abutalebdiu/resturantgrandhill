<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id()->from(1000);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('checkin');
            $table->string('checkout');
            $table->string('vat')->nullable();
            $table->string('tax')->nullable();

            $table->string('total_price')->nullable();
            $table->string('after_discount')->nullable();
            $table->string('original_amount')->nullable();
            $table->string('booking_type')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('still_dues')->nullable();
            $table->string('payment_method')->default('cash');

            $table->string('status')->default('pending');
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
        Schema::dropIfExists('bookings');
    }
}
