<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTypeTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::create('buisness_type_translation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('buisness_type_id');
            $table->string('language_code');
            $table->string('name');
            $table->timestamps();
       */

      Schema::create('business_type_translation', function(Blueprint $table)
      {
          $table->increments('id');
          $table->integer('business_type_id');
          $table->string('name');
          $table->string('locale')->index();

          $table->unique(['business_type_id','locale']);
        //  $table->foreign('buissness_type_id')->references('id')->on('buisness_type')->onDelete('cascade');
    });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buisness_type_translation');
    }
}
