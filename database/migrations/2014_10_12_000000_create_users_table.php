<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('phone_number')->nullable()->unique();
            $table->string('username')->unique()->unique();
            $table->string('country')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('address')->nullable();
            $table->text('bio')->nullable();

            $table->text('photo_profile')->nullable();
            $table->text('id_card')->nullable();
            $table->text('id_card_with_photo')->nullable();

            $table->dateTime('complete_identity')->nullable();
            $table->dateTime('verified')->nullable();

            $table->text('store_logo')->nullable();
            $table->string('store_name')->nullable();
            $table->string('store_phone_number')->nullable();
            $table->text('store_address')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
