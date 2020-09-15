<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('forecast_id')->nullable();
            $table->integer('subscription_id')->default(0);

            $table->integer('amount');
            $table->integer('fk_intid')->nullable();
            $table->text('p_email')->nullable();
            $table->text('p_phone')->nullable();
            $table->integer('cur_id');
            $table->text('sign');
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
        Schema::dropIfExists('payments');
    }
}
