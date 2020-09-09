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

            $table->unsignedBigInteger('amount');
            $table->text('message')->nullable();
            $table->text('message_from_server')->nullable();

            // 1 = success, 2 = failed
            $table->unsignedTinyInteger('status')->default(1);
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
