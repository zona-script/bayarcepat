<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            // type 1 = in / 2 = out
            $table->unsignedInteger('type')
                ->default(1);

            $table->unsignedBigInteger('amount')->default(0);

            // pembelian prepaid, pembelian
            $table->string('title');
            $table->string('note')->nullable(); // catatan dari server
            $table->string('trx_id')->nullable(); // id trx

            $table->json('information')->nullable();

            $table->unsignedBigInteger('previous_balance');
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
        Schema::dropIfExists('balances');
    }
}
