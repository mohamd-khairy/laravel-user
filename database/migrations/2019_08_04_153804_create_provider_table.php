<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brand_name')->nullable();
            $table->string('logo')->nullable();
            $table->string('hotline')->unique()->nullable();
            $table->string('official_email')->unique()->nullable();

            $table->integer('max_order_per_day')->nullable();

            $table->boolean('status')->default(0);
            $table->string('man_power_number')->nullable();
            $table->integer('visit_number')->nullable();
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
        Schema::dropIfExists('provider');
    }
}
