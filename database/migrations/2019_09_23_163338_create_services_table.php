<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('provider_id')->index();
            $table->integer('main_category')->index();
            $table->integer('business_type_id')->index();

            $table->integer('min_deposit')->nullable();

            $table->boolean('vat_service');
            $table->integer('vat_service_value')->nullable();

            $table->boolean('preparation_type')->nullable();
            $table->integer('preparation_time')->nullable();
            $table->string('preparation_time_type')->nullable();


            $table->integer('cancel_free')->nullable();
            $table->integer('cancel_fees')->nullable();

            $table->boolean('status')->nullable();
            $table->boolean('active')->default(0);
            $table->boolean('show_in_homePage')->default(0);
            $table->softDeletes()->nullable(); // <-- This will add a deleted_at field
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
        Schema::dropIfExists('services');
    }
}
