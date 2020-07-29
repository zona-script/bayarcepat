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

            $table->string('category', 100)->default(\App\Enums\TransactionEnum::$categoryPayment);;

            // type pembelian atau bayarcepatpay
            $table->string('type')
                ->default(\App\Enums\TransactionEnum::$typeProduct);

            $table->json('product')->nullable();

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

            // apakah ini checkbill
            $table->boolean('is_checkbill')
                ->default(false);

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
