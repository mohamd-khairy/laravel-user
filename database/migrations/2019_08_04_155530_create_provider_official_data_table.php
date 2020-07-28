<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderOfficialDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_official_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('provider_id')->index();
            $table->integer('document_type_id');
            $table->string('doc_number')->nullable();
            $table->string('doc_copy')->nullable();
            $table->date('expired_date')->nullable();
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
        Schema::dropIfExists('provider_official_data');
    }
}
