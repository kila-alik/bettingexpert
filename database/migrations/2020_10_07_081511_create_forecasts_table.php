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
            $table->float('coeff', 8, 2)->nullable()->comment('Основной коэффициент прогноза');
            $table->float('lwin', 8, 2)->nullable()->comment('Победа 1-й команды');
            $table->float('draw', 8, 2)->nullable()->comment('Ничья');
            $table->float('rwin', 8, 2)->nullable()->comment('Победа 2-й команды');
            $table->float('lwdraw', 8, 2)->nullable()->comment('Победа 1-й или ничья');
            $table->float('rwdraw', 8, 2)->nullable()->comment('Победа 2-й или ничья');
            $table->text('text_before')->nullable()->comment('Описание игры до фото');
            $table->text('text_after')->nullable()->comment('Описание игры после фото');
            $table->string('foto')->nullable()->comment('Фото в тексте');
            $table->string('result')->nullable()->comment('Результат игры(встречи)');
            $table->integer('status')->default(0)->comment('Premium 2, Vip 1, free 0');
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
