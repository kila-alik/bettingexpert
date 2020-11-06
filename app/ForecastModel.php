<?php

namespace Bett;

use Illuminate\Database\Eloquent\Model;
use Bett\CountryModel;
use Bett\Repositories\ForecastRepository;

class ForecastModel extends Model
{
  // -------------------Это разрешения при массовом заполнении полей
  protected $fillable = ['command_1', 'command_2', 'country_id', 'champ_id', 'coeff', 'status', 'result', 'data_game'];
  // protected $fillable = ['title', 'text_new'];
  // protected $guarded = ['autor'];
  //---------------Это указываем с какой таблицей работать этой модели
  protected $table='forecasts';

  // опишем отношения модели Прогнозов с другими Моделями

  // public function sport()
  //   {
  //       return $this->belongsTo('Bett\SportModel', 'country_id', 'id');
  //   }

  public function country()
    {
        return $this->belongsTo('Bett\CountryModel', 'country_id', 'id');
    }

    public function championship()
    {
      return $this->belongsTo('Bett\ChampionshipModel', 'champ_id', 'id');
    }

  public function command_one()
    {
        return $this->belongsTo('Bett\CommandModel', 'command_1', 'id');
    }

  public function command_two()
    {
        return $this->belongsTo('Bett\CommandModel', 'command_2', 'id');
    }

  // отношение "ко многим через"
  // Таблица Forecast будут относиться к таблице Country через таблицу Championship
  // public function countrys()
  //   {
  //     // 1-й параметр модель конечной таблицы
  //     // 2-й параметр модель промежуточной таблицы
  //     // 3-й параметр поле в промеуточной таблице
  //     // 4-й параметр поле в конечной таблице
  //       return $this->hasManyThrough('Bett\CountryModel', 'Bett\ChampionshipModel', 'country_id', 'id');
  //   }
}
