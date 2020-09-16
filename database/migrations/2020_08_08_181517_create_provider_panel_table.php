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

            // berisi array (json) key = nama field, lalu value = nilainya
            $credential = [
                'key' => 'sdhyuiqyr8ui2yrnimzhjkwhj'
            ];
            $table->json('credential')->nullable();

            // agar hasil sinkronnya otomatis
            $config = json_encode([
                'result_in' => 'data',
                'field_status_available' => true, // apakah saat request, ada property status, contohnya status=true,
                'field_status_in' => 'status', // nama field statusnya, kadang ada yang success, kadang status,
                'filed_status_success_if_status' => true
            ]);

            $table->json('config'); // berarti api ada di data

            // ini digunakan untuk melakukan sinkron data, tiap provider biasanya beda beda format penamaaannya
            $resultData = json_encode([
                'service_id' => 'id',
                'name' => 'name',
                'price' => 'price',
                'min' => 'min',
                'max' => 'max',
                'category' => 'category',
                'note' => 'description'
            ]);
            $table->json('format_data')->nullable();

            // url = endpoint, data = (json) isi custom tambahan data, biasanya ada provider yang minta action tambahan
            $table->string('get_profile_url')->nullable();
            $table->json('get_profile_append_data')->nullable();
            $table->string('get_profile_http_method')->default('POST');
            $table->string('get_services_url')->nullable();
            $table->json('get_services_append_data')->nullable();
            $table->string('get_services_http_method')->default('POST');
            $table->string('check_status_url')->nullable();
            $table->json('check_status_append_data')->nullable();
            $table->string('check_status_http_method')->default('POST');
            $table->string('create_order_url')->nullable();
            $table->json('create_order_append_data')->nullable();
            $table->string('create_order_http_method')->default('POST');
            $table->timestamps();
            $table->softDeletes();
        });
//        Schema::create('provider_panel', function (Blueprint $table) {
//            $table->id();
//            $table->string('code')->unique();
//            $table->string('name');
//            $table->string('website');
//            $table->string('api_url');
//            $table->string('api_id')->nullable();
//            $table->string('api_key')->nullable();
//            $table->string('api_username')->nullable();
//            $table->string('api_password')->nullable();
//            $table->text('note')->nullable();
//            $table->boolean('active')->default(false);
//
//            $config = json_encode([
//                'result_in' => 'data',
//                'status_available' => false,
//                'status' => true
//            ]);
//
//            // agar hasil sinkronnya otomatis
//            $table->json('config'); // berarti api ada di data
//
//            $resultData = json_encode([
//                'service_id' => 'id',
//                'name' => 'name',
//                'price' => 'price',
//                'min' => 'min',
//                'max' => 'max',
//                'category' => 'category',
//                'note' => 'note'
//            ]);
//
//            // ini digunakan untuk melakukan sinkron data, tiap provider biasanya beda beda format penamaaannya
//            $table->json('result_data'); // kolom_di_tabel = kolom_hasil_api
//
//            // example
//            // form input name 'api_key' value from column api_key_xxx
//            $credential = [
//                'api_key' => 'api_key_xxx'
//            ];
//
//            $table->json('trx_credential')->nullable();
//            $table->string('trx_get_profile_url')->nullable();
//            $table->json('trx_get_profile')->nullable();
//            $table->string('trx_get_services_url')->nullable();
//            $table->json('trx_get_services')->nullable();
//            $table->string('trx_check_status_url')->nullable();
//            $table->json('trx_check_status')->nullable();
//            $table->string('trx_create_order_url')->nullable();
//            $table->json('trx_create_order')->nullable();
//
//            $table->timestamps();
//            $table->softDeletes();
//        });
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
