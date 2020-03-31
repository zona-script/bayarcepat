<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_files', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('support_id');
            $table->foreign('support_id')
                ->references('id')
                ->on('supports');

            $table->text('file');
            $table->string('file_type')->nullable();
            $table->string('format')->nullable();

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
        Schema::dropIfExists('support_files');
    }
}
