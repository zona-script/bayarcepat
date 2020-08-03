<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionPrepaidResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_prepaid_response', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_prepaid_id');
            $table->foreign('transaction_prepaid_id')
                ->references('id')
                ->on('transaction_prepaid');

            $table->string('ref_id')->nullable();
            $table->string('message')->nullable();
            $table->string('status')->nullable();
            $table->string('rc')->nullable();
            $table->string('sn')->nullable();
            $table->string('buyer_last_saldo')->nullable();
            $table->string('price')->nullable();

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
        Schema::dropIfExists('transaction_prepaid_response');
    }
}
