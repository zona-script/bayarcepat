<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionPrepaidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_prepaid', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->string('ref_id')->unique();
            $table->json('product')->nullable();
            $table->string('customer_number')->nullable();
            $table->text('message')->nullable();
            $table->text('information')->nullable();
            $table->unsignedInteger('status')
                ->default(\App\Enums\PrepaidEnum::STATUS_PROCESS);

            $table->unsignedBigInteger('price');

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
        Schema::dropIfExists('transaction_prepaid');
    }
}
