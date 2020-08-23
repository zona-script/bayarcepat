<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionPanelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_panel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->json('product');
            $table->string('price');
            $table->text('target')->nullable();
            $table->unsignedBigInteger('quantity')->nullable();
            $table->text('custom_comments')->nullable();
            $table->text('custom_link')->nullable();

            $table->json('status');
            $table->json('callback')->nullable();

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
        Schema::dropIfExists('transaction_panel');
    }
}
