<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeForecastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forecasts', function (Blueprint $table) {
          // это мы объявлем поле,
          $table->bigInteger('user_id')->unsigned()->default(1)->comment('Внешнее поле для связи с таблицей user по полю Id');
          // которое сделаем внешним следующей командой
          $table->foreign('user_id')->references('id')->on('users');
          //  командой выше сязали внешнее поле user_id из таблицы forecasts
          // с полем id таблицы user

          $table->string('filter_alias')->comment('Внешнее поле для связи с таблицей filters по полю alias');
          $table->foreign('filter_alias')->references('alias')->on('filters');
          //  командой выше сязали внешнее поле filter_id из таблицы forecasts
          // с полем id таблицы filters

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('forecasts', function (Blueprint $table) {
            //
        });
    }
}
