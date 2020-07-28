<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderBarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliderBar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_en')->nullable();
            $table->string('image_ar')->nullable();
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->string('link')->nullable();
            $table->string('navigation')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->boolean('active')->nullable();
            $table->boolean('one_image')->nullable();
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
        Schema::dropIfExists('sliderBar');
    }
}
