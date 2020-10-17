<?php

namespace Bett;

use Illuminate\Database\Eloquent\Model;

class ChampionshipModel extends Model
{
  // -------------------Это разрешения при массовом заполнении полей
  protected $fillable = ['name'];
  // protected $fillable = ['title', 'text_new'];
  // protected $guarded = ['autor'];

  //---------------Это указываем с какой таблицей работать этой модели
  protected $table='championship';
}
