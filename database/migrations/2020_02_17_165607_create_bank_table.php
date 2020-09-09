<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('bank_master_id');
            $table->foreign('bank_master_id')
                ->references('id')
                ->on('bank_master');

            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->text('note')->nullable();

            $table->boolean('status')->default(true); // true = aktif, false = tidak aktif
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
        Schema::dropIfExists('banks');
    }
}
