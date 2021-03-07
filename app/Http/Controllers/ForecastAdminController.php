<?php

namespace Bett\Http\Controllers;

use Illuminate\Http\Request;
use Bett\ForecastModel;
use Bett\SportModel;
use Bett\ChampionshipModel;
use Bett\CommandModel;
use Bett\CountryModel;
use Carbon\Carbon;
// use Config;
// use Bett\Http\Controllers;
use Bett\Repositories\ForecastRepository;

class ForecastAdminController extends Controller
// class ForecastController extends Controller
{
  public function list() {

      ForecastModel::whereNull('champ_id')->delete();
      // на стороне клиента сделать whereNotNull - TODO
      // dd($f);
      $forecasts = ForecastModel::all();
      $forecasts->load('country', 'command_one', 'command_two', 'championship');

      // передадим в представление список видов спорта
      // пока это не надо
      // $sport_all = SportModel::all();
      // $sport_all->load('championships', 'commands');
      // $sports = $this->mass_list($sport_all);

      // эта функция создает массив имени Леши
      // он описан внизу SiteController.php
      $arSports = $this->ar_sports($forecasts);

      //
      return view(env('THEME').'.forecast.admin.list', compact('arSports'));
      // dd(env('THEME').'.forecast.list');
      // return view(env('THEME').'.forecast.list', compact('forecasts', 'sports'));
  }

  public function detail($id) {
      $forecasts = ForecastModel::find($id);

      // $navigation = view(env('THEME').'.layouts.navigation_all', compact('arCountrys', 'idData', 'arrMenu'))->render();
      // $this->vars = array_add($this->vars, 'navigation', $navigation);

      return view(env('THEME').'.forecast.admin.detail', compact('forecasts'));
  }

  public function edit($id) {
     $forecast = ForecastModel::find($id);

     // ПРИ НОВОЙ - представили первую страницу
     if(empty($forecast)) {
       $forecast = new ForecastModel;

       // передадим в представление список видов спорта при первом обращении на страницу
       $sport_all = SportModel::all();
       $sports = $this->mass_list($sport_all);

       // передадим в представление список стран при первом обращении на страницу
       $country_all = CountryModel::all();
       $countrys = $this->mass_list($country_all);

       $forecast->save();
       // dd($forecast);
       return view(env('THEME').'.forecast.admin.edit1', compact('forecast', 'sports', 'countrys'));
     }

     $sport_name = '';
     $sport = empty($forecast->championship->sports_id) ? '' : $forecast->championship->sports_id;
     $country = empty($forecast->country_id) ? '' : $forecast->country_id;

 // ПРИ НОВОЙ - ПРИНЯЛИ ОТ ПЕРВОЙ И ПЕРЕВЕЛИ НА ВТОРУЮ
     if(request()->isMethod('post') && !empty(request()->input('sport')) && !empty(request()->input('country'))) {
         $sport = request()->input('sport');
         $country = request()->input('country');

         $forecast->country_id = $country;
         $forecast->save();
         // dd($forecast->country_id);
         $sports_null = '';
         $countrys_null = '';

         $sport_name = SportModel::find($sport)->name;
     }

// ПРИ СТАРОЙ
if(request()->isMethod('post') && !empty(request()->input('champ'))) {

  // $forecast->country_id = $this->$countrys;
  $forecast->champ_id = request()->input('champ');
  $forecast->command_1 = request()->input('command1');
  $forecast->command_2 = request()->input('command2');
  // $forecast->date_game = request()->input('date_game')." ".request()->input('time_game').":00";
  // для пробела между датой и временем пробел именно из двойных кавычек а не одинарных
  $forecast->date_game = request()->input('date_game')." ".request()->input('time_game');
  $forecast->coeff = request()->input('coeff');
  $forecast->result = request()->input('result');
  $forecast->status = request()->input('status');
  $forecast->save();

  return redirect(route('ForecastDetail', ['id' => $forecast->id]));
}
// Это для select-ов на второй странице
    $champs = ChampionshipModel::where([
                                          ['sports_id', $sport],
                                          ['country_id', $country]
                                      ])->get();
    $champ_mass = $this->mass_list($champs);
    // dd(count($champ_mass));
    $commands = CommandModel::where([
                                          ['sports_id', $sport]
                                          // ['country_id', $countrys]
                                      ])->get();
    $command_mass = $this->mass_list($commands);


    return view(env('THEME').'.forecast.admin.edit2', compact('forecast', 'champ_mass', 'command_mass', 'sport_name'));
 }

  public function editOnePage($id) {
     $forecast = ForecastModel::find($id);

     // ПРИ НОВОЙ - представили первую страницу
     if(empty($forecast)) {
       $forecast = new ForecastModel;

       // передадим в представление список видов спорта при первом обращении на страницу
       $sport_all = SportModel::all();
       $sports = $this->mass_list($sport_all);

       // передадим в представление список стран при первом обращении на страницу
       $country_all = CountryModel::all();
       $countrys = $this->mass_list($country_all);
     } else {
       $championship = $forecast->championship;
       $sports = $championship->sport->name;
       $countrys = $championship->country->name;
     }
     // dump($championship->sport);

     // сохранение
     if(request()->isMethod('post')) {
       if(empty($forecast->id)){ // новый
         // $forecast->sport = request()->input('sport');
         $forecast->country_id = request()->input('country');
       }
       $forecast->champ_id = request()->input('champ');
       $forecast->command_1 = request()->input('command1');
       $forecast->command_2 = request()->input('command2');
       // для пробела между датой и временем пробел именно из двойных кавычек а не одинарных
       $forecast->date_game = request()->input('date_game')." ".request()->input('time_game');
       $forecast->coeff = request()->input('coeff');
       $forecast->result = request()->input('result');
       $forecast->status = request()->input('status');
       $forecast->save();
       return redirect(route('ForecastEditOnePage', ['id' => $forecast->id]));
     }

     return view(env('THEME').'.forecast.admin.edit_ajax', compact('id', 'forecast', 'sports', 'countrys'));

 }

  public function getChampsCommandsAjax($sport, $country) {
    // Это для select-ов на второй странице
    $champs = ChampionshipModel::where([
      ['sports_id', $sport],
      ['country_id', $country]
    ])->get();
    $champ_mass = $this->mass_list($champs);
    // dd(count($champ_mass));
    $commands = CommandModel::where([
      ['sports_id', $sport],
      ['country_id', $country]
    ])->get();
    $command_mass = $this->mass_list($commands);
    return json_encode(['champs'=>$champ_mass, 'commands'=>$command_mass]);
  }

  public function del($id) {
        if(request()->isMethod('post') ) ForecastModel::find($id)->delete();
        // return redirect('/country');
        return redirect(route('ForecastList'));
    }

  // public function one($id) {
  //       ForecastModel::find($id)->delete();
  //       // return redirect('/country');
  //       return redirect(route('ForecastList'));
  //   }

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
}
