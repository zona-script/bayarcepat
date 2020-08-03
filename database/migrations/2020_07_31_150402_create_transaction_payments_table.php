<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // tabel untuk pembayaran
        Schema::create('transaction_payments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            // prepaid = 1 , postpaid = 2, smm = 3
            $table->unsignedSmallInteger('type');

            // id transaction_prepaid, transaction_postpaid
            $table->string('transaction_identity');

            $table->text('message')->nullable();
            $table->text('message_from_server')->nullable();

            $table->unsignedBigInteger('amount');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_payments');
    }
}
