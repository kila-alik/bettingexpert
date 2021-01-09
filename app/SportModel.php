<?php

namespace Bett;

use Illuminate\Database\Eloquent\Model;

class SportModel extends Model
{
  // -------------------Это разрешения при массовом заполнении полей
  protected $fillable = ['name', 'alias'];
  // protected $fillable = ['title', 'text_new'];
  // protected $guarded = ['autor'];

  //---------------Это указываем с какой таблицей работать этой модели
  protected $table='sports';

  // Определим связь ОДИН КО МНОГИМ,
  // один - это вид спорта
  // многие - это чемпионаты
  // второй параметр соответствующее удаленное поле в таблице ChampionshipModel
  // третий параметр соответствующее локальное поле в таблице SportModel
  public function championships()
      {
          return $this->hasMany('Bett\ChampionshipModel', 'sports_id', 'id');
      }

  public function commands()
      {
          return $this->hasMany('Bett\CommandModel', 'sports_id', 'id');
      }

  // public function forecast()
  //     {
  //         return $this->hasMany('Bett\ForecastModel', 'sports_id', 'id');
  //     }
}
