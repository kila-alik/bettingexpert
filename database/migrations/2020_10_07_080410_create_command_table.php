<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('command', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->comment('на него указывать внешний ключ command_1 или command_2 из таб. forecast');
            $table->unsignedBigInteger('sports_id')->nullable()->comment('внешний ключ указывает на поле id в таб. sports');
            $table->unsignedBigInteger('country_id')->nullable()->comment('внешний ключ указывает на поле id в таб. country');

            $table->string('name')->comment('Название команды');
            $table->string('description')->nullable()->comment('Описание команды');


            // описываем внешную связь поля sports_id с таблицей sports
            $table->foreign('sports_id')->references('id')->on('sports');
            // описываем внешную связь поля country_id с таблицей country
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
        Schema::dropIfExists('command');
    }
}
