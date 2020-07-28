<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('foreign_id');
            $table->string('address_ar')->nullable();
            $table->string('address_en')->nullable();
            $table->string('country_ar');
            $table->string('country_en');
            $table->string('city_ar');
            $table->string('city_en');
            $table->string('neighborhood_ar');
            $table->string('neighborhood_en');
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->enum('type',['provider_address','place_address' , 'food_address']);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('provider_address');
    }
}
