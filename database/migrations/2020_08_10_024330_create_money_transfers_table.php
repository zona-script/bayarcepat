<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneyTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money_transfers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('sender_user_id');
            $table->foreign('sender_user_id')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('received_user_id');
            $table->foreign('received_user_id')
                ->references('id')
                ->on('users');


            // 1 = send, 2 = received
            $table->tinyInteger('type');

            $table->unsignedBigInteger('amount');
            $table->text('message');
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
        Schema::dropIfExists('money_transfers');
    }
}
