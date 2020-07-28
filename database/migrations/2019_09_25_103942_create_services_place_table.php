<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_place', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('provider_id')->index();
            $table->integer('service_id')->index();
            $table->integer('address_id')->nullable();
            $table->integer('min_capacity')->nullable();
            $table->integer('max_capacity')->nullable();
            $table->integer('area')->nullable();
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->boolean('can_subdivided')->nullable();
            $table->boolean('can_food_outside')->nullable();
            $table->boolean('can_catering')->nullable();
            $table->boolean('external_lounge')->nullable();
            $table->boolean('additional_addons')->nullable();
            $table->integer('reservation_types')->nullable();
            $table->integer('price_per_day')->nullable();
            $table->integer('price_per_morning')->nullable();
            $table->integer('price_per_evening')->nullable();
            $table->integer('min_price')->nullable();
            $table->string('floor_image')->nullable();
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
        Schema::dropIfExists('services_place');
    }
}
