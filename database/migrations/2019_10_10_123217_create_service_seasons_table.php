<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_seasons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('provider_id');
            $table->integer('service_id');
            $table->date('date_from');
            $table->date('date_to');
            $table->boolean('reservation_day');
            $table->boolean('reservation_period');
            $table->integer('price_per_day');
            $table->integer('price_per_morning');
            $table->integer('price_per_evening');
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
        Schema::dropIfExists('service_seasons');
    }
}
