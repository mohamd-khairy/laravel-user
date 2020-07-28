<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFitsWithTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fits_with_translation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fits_with_id')->index();
            $table->string('image')->nullable();

            $table->string('banner')->nullable();

            $table->string('name')->nullable();
            $table->string('locale')->index()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fits_with_translation');
    }
}
