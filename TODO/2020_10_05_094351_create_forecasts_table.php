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
          // поля с индексами для сортировки
            $table->bigIncrements('id')->comment('Общий id таблицы');
            // $table->bigInteger('forecaster_id')->default(0)->comment('Id прогноза игры');
            // $table->integer('sort_id')->comment('Id зарезервирован');
            // $table->integer('sort_ord')->comment('Id зарезервирован');

          // информативные поля
            $table->string('title', 255)->comment('Загаловка прогноза игры');
            // или title как выше или разбиваем на игру и матч
            // $table->string('game');
            // $table->string('match');
            $table->text('description')->comment('Полный текст прогноза');
            $table->string('alias', 150)->unique()->comment('Алиас прогноза');
            $table->string('img')->comment('Картинка (флаг страны) прогноза');
            $table->float('coeff', 8, 2)->comment('Коэффициент прогноза');
            // спросить у Леши какой формат уместнее
            // $table->string('coeff')->comment('Коэффициент прогноза');
            $table->string('result', 255)->comment('Результат прогноза коротко');
            $table->text('resultdesc')->comment('Результат прогноза полный');
            $table->string('date')->comment('Дата игры прогноза');

            // для преоставления по прайсу
            $table->boolean('vip')->default(false)->comment('Vip- прогноз');
            // спросить у Леши какой формат уместнее
            // или как ниже
            // $table->string('price');
            $table->integer('status')->default(0)->comment('Наверное какой-то статус прогноза');


            // пока непонятные поля , в процессе может добавим
                      // $table->text('express')->default(NULL);
                      // $table->string('forecast')->nullable();
                      // // $table->string('result')->nullable();
                      // $table->text('meta_keywords');
                      // $table->text('meta_description');
                      // $table->integer('paid')->default(0);


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
