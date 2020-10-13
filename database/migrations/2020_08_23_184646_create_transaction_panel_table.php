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
            $table->unsignedBigInteger('product_id')->nullable();
            $table->json('product_temporary');
            $table->string('price');
            $table->unsignedBigInteger('quantity')
                ->nullable();

            $table->text('target')
                ->nullable();
            $table->text('custom_comments')
                ->nullable();
            $table->text('custom_link')
                ->nullable();

            // pending/processing/success/error/partial
            // diupdate setiap mendapatkan status
            $table->string('status')
                ->default(0);

            $table->json('callback')
                ->nullable();

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
