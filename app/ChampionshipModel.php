<?php

namespace Bett;

use Illuminate\Database\Eloquent\Model;

// use Bett\Repositories\ForecastRepository;

class ChampionshipModel extends Model
{
  // -------------------Это разрешения при массовом заполнении полей
  protected $fillable = ['name', 'sports_id', 'country_id', 'date_begin', 'date_end'];
  // protected $fillable = ['title', 'text_new'];
  // protected $guarded = ['autor'];

  //---------------Это указываем с какой таблицей работать этой модели
  protected $table='championship';


  public function forecast_champ()
    {
        return $this->hasMany('Bett\ForecastModel', 'champ_id', 'id');
    }

    // определим ответную связь от МНОГИХ К ОДНОМУ
    // многие - это чемпионаты
    // один - это страна
    public function country()
    {
        return $this->belongsTo('Bett\CountryModel', 'country_id', 'id');
    }

    // определим ответную связь от МНОГИХ К ОДНОМУ
    // многие - это чемпионаты
    // один - это вид спорта
    public function sport()
    {
        return $this->belongsTo('Bett\SportModel', 'sports_id', 'id');
    }

}
