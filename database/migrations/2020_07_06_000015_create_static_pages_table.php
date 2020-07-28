<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticPagesTable extends Migration
{
    public function up()
    {
        Schema::create('static_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('body_ar');
            $table->longText('body_en');
            $table->string('status');
            $table->timestamps();

        });
    }
}
