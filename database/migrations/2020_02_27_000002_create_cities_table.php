<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city_key')->nullable();
            $table->string('city_en');
            $table->string('city_ar');
            $table->string('status')->nullable();
            $table->string('order')->nullable();
            $table->timestamps();
        });
    }
}
