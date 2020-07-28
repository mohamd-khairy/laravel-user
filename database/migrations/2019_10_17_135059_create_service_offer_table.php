<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceOfferTable extends Migration
{
    /**
     * Run the migrations.
     *php artisan make:seeder occasionTableDataSeeder
     *php artisan make:seeder occasionTranslationTableDataSeeder
     * @return void
     */
    public function up()
    {
        Schema::create('service_offer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('provider_id');
            $table->integer('service_id');
            $table->integer('offer_occasion_id');
            $table->date('date_from');
            $table->date('date_to');
            $table->enum('discount_type',['cash','percentage']);
            $table->integer('discount_value');
            $table->timestamps();
        });
    }

    /**php artisan make:migration create_service_feature_translation_table
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_offer');
    }
}
