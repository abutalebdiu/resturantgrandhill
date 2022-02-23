<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgerStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledger_statements', function (Blueprint $table) {
            $table->id();
            $table->float('amount')->nullable();
            $table->float('debit')->nullable();
            $table->float('credit')->nullable();
            $table->string('remarks')->nullable();
            $table->string('reference')->nullable();
            $table->string('mobile')->nullable();
            $table->string('payment_mode')->nullable();
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
        Schema::dropIfExists('ledger_statements');
    }
}
