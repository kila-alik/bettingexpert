<?php
namespace Bett\Http\Controllers;
// namespace Bett\Repository\ForecastsRepository;
// require 'vendor/autoload.php';

use Illuminate\Http\Request;
use Bett\Repositories\ForecastsRepository;
use Illuminate\Support\Facades\Storage;
use Bett\SportModel;
use Bett\ChampionshipModel;
use Bett\ForecastModel;
use Carbon\Carbon;
// use Bett\Image;
// use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
// use Bett\Http\Controllers;

class SiteController extends Controller
{
  // переменная для репазитория прогнозов forecast
  protected $f_rep;

  protected $template;
  protected $vars = array();

  protected $contentRightBar = False;
  protected $contentLeftBar = False;
  protected $bar = false;

  // методом внедрения зависимости в конструктор передаем
  // в переменную $forecast передаем объект репозитория ForecastsRepository
  public function __construct(ForecastsRepository $f_rep) {
    // в переменную f_rep записываем объект типа
    // репозиторя ForecastsRepository через переменную конструктора $f_rep
    // обратить внимание на конструктор в дочернем IndexController
    // и добавить в use Bett\Repository\ForecastsRepository
    $this->f_rep = $f_rep;
    // переменная f_rep будет использоваться ниже в применении метода get()
  }



  // protected function getForecast() {
  //   // переменная этой функции $forecast и в нее попадет
  //   // выборка которую должен релизовать репозторий ForecastsRepository
  //   // и у него потом вызываем метод get() который опишем позже
  //   $forecast = $this->f_rep->get();
  //
  //   return $forecast;
  // }

  protected function mass_list($models) {
      $mass = [];
      foreach ($models as $model) {
        $mass[$model->id] = $model->name;
      }
      return $mass;
  }

  protected function ar_sports($forecasts, $sportId = FALSE) {
    // это массив ИМЕНИ Леши, вместо моих двух массивов  forecasts sports
    // он такой и его легче и быстрее перебрать, и не будет на выдаче пустых видов спорта
    // ===============================
    // 1 =>
    //     name => футбол
    //     alias => soccer
    //     forecasts =>
    //                 forecast1
    //                 forecast2
    //                 ...
    // 2 =>
    //     name => хоккей
    //     alias => hockey
    //     forecasts =>
    //                 forecast1
    //                 forecast2
    //                 ...
    // ...
    // =================================
    $arSports = [];
    foreach ($forecasts as $forecast) {
      // берем через динамические свойства ИМЕННО МОДЕЛЬ спорта
      $sport = $forecast->championship->sport;
      // если есть второй параметр, то пропустит все спорты кроме с индексом равным $sportId
      if ($sportId && $sportId <> $sport->id) {
      // if ($sportId) {
        continue;
      }
      // если нет блока для записи по одному виду спорта - создаем ее
      // при этом заполняем имя , алиас и создаем пустой массив forecasts
      if (!isset($arSports[$sport->id])) {
        $arSports[$sport->id] = [
          'name'=>$sport->name,
          'alias'=>$sport->alias,
          'forecasts'=>[]
        ];
      }
      // при каждом проходе (в том числе и первом) Записываем в пустой подмассив ИМЕННО МОДЕЛИ прогнозов
      $arSports[$sport->id]['forecasts'][] = $forecast;
    }
    // dd($arSports);
    return $arSports;
  }

  protected function ar_countrys($forecasts) {

    // ===============================
    // 1 =>
    //     name => футбол
    //     alias => soccer
    //     list =>
    //                 country1 - имя страны ($country->name)
    //                 country2
    //                 ...
    //
    //     countrys =>
    //                 0 ($country->id) =>
    //                                   0 => модель страны ($country)
    //                                   1 => n - здесь будет количество встреченных одинаковых стран
    //                                   3 => модель чемпионата в этой стране ($championship)
    //                 1 =>
    //                                   0 => name
    //                                   1 => m
    //                                   3 => модель чемпионата
    //                ...
    // 2 =>
    //     name => хоккей
    //     alias => hockey
    //     list =>
    //                 country1 - имя страны ($country->name)
    //                 country2
    //                 ...
    //
    //     countrys =>
    //                 0 ($country->id) =>
    //                                   0 => name - имя страны ($country)
    //                                   1 => n - здесь будет количество встреченных одинаковых стран
    //                                   3 => модель чемпионата
    //                 1 =>
    //                                   0 => name
    //                                   1 => m
    //                                   3 => модель чемпионата
    //                ...
    // ...
    // =================================
    $arCountrys = [];
    foreach ($forecasts as $forecast) {
      // берем через динамические свойства ИМЕННО МОДЕЛЬ спорта
      $sport = $forecast->championship->sport;
      // берем через динамические свойства ИМЕННО МОДЕЛЬ стран
      $country = $forecast->championship->country;
      // берем через динамические свойства ИМЕННО МОДЕЛЬ чемпионата
      $championship = $forecast->championship;
      // dd($country);
      // если нет блока для записи по одному виду спорта - создаем ее
      // при этом заполняем имя , алиас и создаем пустой массив countrys
      if (!isset($arCountrys[$sport->id])) {
        $arCountrys[$sport->id] = [
          'name'=>$sport->name,
          'alias'=>$sport->alias,
          'countrys'=>[],
          // list - нужен для проверки встречалась ли страна при переборе
          'list'=>[]
        ];
      }
      // при каждом проходе (в том числе и первом) Записываем в пустой подмассив ИМЕННО МОДЕЛИ стран
      if (in_array($country->name, $arCountrys[$sport->id]['list'])) {
        $arCountrys[$sport->id]['countrys'][$country->id][1] = $arCountrys[$sport->id]['countrys'][$country->id][1] + 1;
        // continue;
      } else {
        $arCountrys[$sport->id]['countrys'][$country->id][0] = $country;
        $arCountrys[$sport->id]['countrys'][$country->id][1] = 1;
        $arCountrys[$sport->id]['countrys'][$country->id][2] = $championship;
        $arCountrys[$sport->id]['list'][] = $country->name;
      }
    }
    // dd($arCountrys);
    return $arCountrys;
  }

  // неработающая функция
  public function resizeImg($src, $width, $heght){
    // $manager = new ImageManager(array('driver' => 'imagick'));
    $manager = new ImageManager(array('driver' => 'gd'));
    $image = $manager->make('/flag/'.$src)->resize($width, $heght);
    dd($image);
  }
}
