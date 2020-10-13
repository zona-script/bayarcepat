<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionPanelStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_panel_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_panel_id');
            $table->foreign('transaction_panel_id')
                ->references('id')
                ->on('transaction_panel');
            $table->string('start_count');
            $table->string('remains');
            $table->string('status');
            $table->json('response')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_panel_statuses');
    }
}
