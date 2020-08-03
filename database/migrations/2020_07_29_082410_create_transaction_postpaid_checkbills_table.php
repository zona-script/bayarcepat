<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionPostpaidCheckBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_postpaid_checkbills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->string('ref_id');
            $table->string('customer_no');
            $table->string('brand'); // pln, pdam, gas

            $table->string('customer_name')->nullable();
            $table->string('buyer_sku_code')->nullable();
            $table->string('admin')->nullable();
            $table->string('message')->nullable();
            $table->string('status')->nullable();
            $table->string('rc')->nullable();
            $table->string('sn')->nullable();
            $table->string('buyer_last_saldo')->nullable();
            $table->string('price')->nullable();
            $table->string('selling_price')->nullable();
            $table->json('description')->nullable();

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
        Schema::dropIfExists('transaction_postpaid_checkbills');
    }
}
