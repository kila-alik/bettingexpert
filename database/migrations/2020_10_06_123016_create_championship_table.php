<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChampionshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('championship', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('на него указывать внешний ключ champ_id из таб. forecast');

            // ВНИМАНИЕ если на поле command_1 будем вешать внешний ключ в Laravel 5.8
            // то оно должно соответствовать полностью тому полю , которому сопоставляем в таблице command
            // а именно там это bigIncrements('id')->unsigned()  а тут unsignedBigInteger('country_id')
            //  unsigned() - означает положительное целое число
            // nullable() - означает возможно нулевое значение
            $table->unsignedBigInteger('sports_id')->nullable()->comment('внешний ключ указывает на поле id в таб. sports');
            $table->unsignedBigInteger('country_id')->nullable()->comment('внешний ключ указывает на поле id из таб. country');
            $table->string('name')->nullable()->comment('Имя Чемпионата');
            $table->timestamp('date_begin')->nullable()->comment('Дата начала чемпионата');
            $table->timestamp('date_end')->nullable()->comment('Дата окончания чемпионата');

            // описание внешних ключей и их связи
            $table->foreign('sports_id')->references('id')->on('sports');
            $table->foreign('country_id')->references('id')->on('country');

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
        Schema::dropIfExists('championship');
    }
}
