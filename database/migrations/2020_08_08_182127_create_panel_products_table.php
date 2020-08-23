<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanelProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panel_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('provider_panel_id');
            $table->foreign('provider_panel_id')
                ->references('id')
                ->on('provider_panel');

            $table->string('service_id');
            $table->string('name');
            $table->string('price');
            $table->string('min');
            $table->string('max');
            $table->string('category');
            $table->text('note')->nullable();
            $table->json('more_data')->nullable();
            $table->text('information')->nullable();

            $table->boolean('active')->default(false);
            $table->unique(['provider_panel_id', 'service_id']);

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
        Schema::dropIfExists('panel_products');
    }
}
