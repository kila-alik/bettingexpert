<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForecastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forecasts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('forecaster_id')->default(0);
            $table->integer('sort_id');
            $table->integer('sort_ord');

            $table->text('title');
            $table->text('description');
            $table->string('alias');
            $table->string('game');
            $table->string('match');
            $table->string('coeff');
            $table->string('date');
            $table->string('price');
            $table->integer('status')->default(0);
            $table->text('express')->default(NULL);
            $table->string('forecast')->nullable();
            $table->string('result')->nullable();
            $table->text('meta_keywords');
            $table->text('meta_description');
            $table->integer('paid')->default(0);

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
        Schema::dropIfExists('forecasts');
    }
}
