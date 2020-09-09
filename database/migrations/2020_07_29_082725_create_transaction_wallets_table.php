<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // ini untuk deposit, widrawal
        Schema::create('transaction_wallets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            // record dari bank
            $table->json('bank')->nullable();
            $table->json('user_bank')->nullable();
            $table->unsignedBigInteger('unique_code')->nullable(); // only for deposit
            $table->unsignedBigInteger('amount');
            $table->unsignedBigInteger('total_amount');

            // 1 = deposit, 2 = withdrawal
            $table->tinyInteger('type')->default(1);

            // 0 = menunggu pembayaran, 1 = sedang diproses, 2 = berhasil, 3 = Gagal, 4 = dibatalkan, 5 = kecurangan
            $table->string('status')->default(0);

            $table->text('note')->nullable(); // pesan dari user
            $table->text('note_from_server')->nullable(); // pesan jika pengiriman gagal atau apa saja (dari server)
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
        Schema::dropIfExists('transaction_wallets');
    }
}
