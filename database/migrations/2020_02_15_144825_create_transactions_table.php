<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            // kategorinya pembelian atau bayarcepatpay
            $table->unsignedInteger('type')
                ->default(\App\Enums\TransactionEnum::$typeProduct);
            $table->string('phone_number')->nullable();
            $table->string('value')->nullable();

            // informasi pengiriman uang / pesan (optional)
            $table->text('message')->nullable();

            // kalau deposit/tarik simpan informasi bank, kalau transfer dirim kemana,
            // kalau pembelian barang yang di beli
            $table->json('information')
                ->nullable();

            $table->unsignedInteger('status')
                ->default(\App\Enums\TransactionEnum::$statusProcess);

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
        Schema::dropIfExists('transactions');
    }
}
