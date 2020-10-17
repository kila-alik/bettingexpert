<?php

namespace Bett;

use Illuminate\Database\Eloquent\Model;

class ForecastModel extends Model
{
  //---------------Это указываем с какой таблицей работать этой модели
  protected $table='forecasts';
}
