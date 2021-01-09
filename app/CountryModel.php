<?php

namespace Bett;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;

// use Bett\Repositories\ForecastRepository;

class CountryModel extends Model
{
  // -------------------Это разрешения при массовом заполнении полей
  protected $fillable = ['name', 'file'];
  // protected $fillable = ['title', 'text_new'];
  // protected $guarded = ['autor'];

  //---------------Это указываем с какой таблицей работать этой модели
  protected $table='country';

  // Определим связь ОДИН КО МНОГИМ,
  // один - это страна
  // многие - это чемпионаты
  // второй параметр соответствующее удаленное поле в таблице ChampionshipModel
  // третий параметр соответствующее локальное поле в таблице CountryModel
  public function championships()
      {
          return $this->hasMany('Bett\ChampionshipModel', 'country_id', 'id');
      }

  public function commands()
      {
          return $this->hasMany('Bett\CommandModel', 'country_id', 'id');
      }

  public function forecasts()
      {
          return $this->hasMany('Bett\ForecastModel', 'country_id', 'id');
      }

}
