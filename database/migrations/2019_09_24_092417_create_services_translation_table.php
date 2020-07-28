<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_translation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('service_id')->index();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('terms_and_condition')->nullable();
            $table->string('locale')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_translation');
    }
}
