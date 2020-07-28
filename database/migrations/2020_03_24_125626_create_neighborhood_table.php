<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeighborhoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neighborhood', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('neighborhood_key')->nullable();
            $table->string('neighborhood_en');
            $table->string('neighborhood_ar');
            $table->string('image')->nullable();
            $table->boolean('active')->default(0);
            $table->boolean('show_in_home_page')->default(0);
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
        Schema::dropIfExists('neighborhood');
    }
}
