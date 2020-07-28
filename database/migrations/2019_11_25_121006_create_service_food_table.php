<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_food', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('provider_id')->index();
            $table->integer('service_id')->index();

//            $table->integer('food_type_id');
            $table->integer('max_num_order_day')->nullable();
            $table->integer('min_order_amount')->nullable();
            $table->integer('price_per_item')->nullable();

            $table->integer('group_order_amount')->nullable();
            $table->integer('price_group_order')->nullable();

            $table->integer('delivery_time')->nullable();
            $table->boolean('delivery_type');

            $table->boolean('serving_option')->nullable();
            $table->integer('delivery_fees')->nullable();

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
        Schema::dropIfExists('service_food');
    }
}
