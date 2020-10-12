<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderPanelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_panel', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('website');
            $table->text('note')->nullable();
            $table->boolean('is_active')
                ->default(false);
            $table->string('get_profile_url')->nullable();
            $table->string('get_services_url')->nullable();
            $table->string('check_status_url')->nullable();
            $table->string('create_order_url')->nullable();
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
        Schema::dropIfExists('provider_panel');
    }
}
