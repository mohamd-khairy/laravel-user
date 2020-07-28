<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAskCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ask_category_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ask_category_id');
            $table->string('name');
            $table->string('locale')->index();
            $table->unique(['ask_category_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ask_category_translations');
    }
}
