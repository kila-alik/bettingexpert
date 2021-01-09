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
            $table->bigIncrements('id');

        // ВНИМАНИЕ если на поле command_1 будем вешать внешний ключ в Laravel 5.8
        // то оно должно соответствовать полностью тому полю , которому сопоставляем в таблице command
        // а именно там это bigIncrements('id')->unsigned()  а тут unsignedBigInteger('command_1')
        //  unsigned() - означает положительное целое число
        // nullable() - означает возможно нулевое значение
            $table->unsignedBigInteger('command_1')->nullable()->comment('внешний ключ указывает на поле id из таб. command');
            $table->unsignedBigInteger('command_2')->nullable()->comment('внешний ключ указывает на поле id из таб. command');
            $table->unsignedBigInteger('country_id')->nullable()->comment('внешний ключ указывает на поле id в таб. country');
            $table->unsignedBigInteger('champ_id')->nullable()->comment('внешний ключ указывает на поле id из таб. championship');
            $table->float('coeff', 8, 2)->nullable()->comment('Коэффициент прогноза');
            $table->string('result')->nullable()->comment('Результат игры(встречи)');
            $table->boolean('status')->default(false)->comment('Платные 1 или бесплатные 0 прогнозы');
            $table->timestamp('date_game')->nullable()->comment('Дата игры');
            // спросить у Леши timestamp или date
            // $table->date('data_game')->nullable()->comment('Дата игры');

            // описание внешних ключей и их связи
            $table->foreign('command_1')->references('id')->on('command');
            $table->foreign('command_2')->references('id')->on('command');
            $table->foreign('country_id')->references('id')->on('country');
            $table->foreign('champ_id')->references('id')->on('championship');


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
