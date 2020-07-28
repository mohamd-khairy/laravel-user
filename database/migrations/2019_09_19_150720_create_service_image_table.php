<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_image', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('service_id')->index();
            $table->integer('real_id');
            $table->string('url');
            $table->string('size')->index();
            $table->boolean('is_master')->default(0);
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
        Schema::dropIfExists('service_image');
    }
}
