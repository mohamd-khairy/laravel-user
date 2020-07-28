<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages_translation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('packages_id')->index();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('packages_translations');
    }
}
