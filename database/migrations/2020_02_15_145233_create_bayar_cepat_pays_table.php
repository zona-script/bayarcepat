<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayarCepatPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayar_cepat_pays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            // type in / out
            $table->unsignedInteger('type')
                ->default(\App\Enums\TransactionEnum::$statusProcess);

            $table->unsignedBigInteger('value');

            // informasi pembayaran untuk apa (id transaksi)
            $table->string('information')->nullable();

            $table->unsignedBigInteger('previous_balance')->nullable();
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
        Schema::dropIfExists('bayar_cepat_pays');
    }
}
