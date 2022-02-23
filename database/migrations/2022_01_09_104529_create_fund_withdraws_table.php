<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_withdraws', function (Blueprint $table) {
            $table->id();
            $table->string('entry_by')->nullable();
            $table->string('update_by')->nullable();
            $table->float('available_amount')->nullable();
            $table->float('withdraw_amount')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('fund_withdraws');
    }
}
