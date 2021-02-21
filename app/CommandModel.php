<?php

namespace Bett;

use Illuminate\Database\Eloquent\Model;
// use Bett\Repositories\ForecastRepository;

class CommandModel extends Model
{
    // -------------------Это разрешения при массовом заполнении полей
    protected $fillable = ['name', 'description', 'sports_id', 'country_id', 'logo'];
    // protected $fillable = ['title', 'text_new'];
    // protected $guarded = ['autor'];

    //---------------Это указываем с какой таблицей работать этой модели
    protected $table='command';

    public function forecast_one()
        {
            return $this->hasMany('Bett\ForecastModel', 'command_1', 'id');
        }

    public function forecast_two()
        {
            return $this->hasMany('Bett\ForecastModel', 'command_2', 'id');
        }

    public function country()
      {
          return $this->belongsTo('Bett\CountryModel', 'country_id', 'id');
      }

    public function sport()
      {
          return $this->belongsTo('Bett\SportModel', 'sports_id', 'id');
      }
}
