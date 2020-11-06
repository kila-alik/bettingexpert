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

class ForecastController extends SiteController
// class ForecastController extends Controller
{
  public function list() {

      ForecastModel::whereNull('champ_id')->delete();
      // на стороне клиента сделать whereNotNull - TODO
      // $f = ForecastModel::select('champ_id', '')->delete();
      // dd($f);
      $forecasts = ForecastModel::all();
      $forecasts->load('country', 'command_one', 'command_two', 'championship');

      // передадим в представление список видов спорта
      $sport_all = SportModel::all();
      $sport_all->load('championships', 'commands');
      $sports = $this->mass_list($sport_all);

      // $arSports = [];
      // foreach ($forecasts as $forecast) {
      //   $sport = $forecast->championship->sport;
      //   if (!isset($arSports[$sport->id])) {
      //     $arSports[$sport->id] = [
      //       'name'=>$sport->name,
      //       'forecasts'=>[]
      //     ];
      //   }
      //   $arSports[$sport->id]['forecasts'][] = $forecast;
      // }
      //
      // return view(env('THEME').'.forecast.list', compact('arSports'));
      return view(env('THEME').'.forecast.list', compact('forecasts', 'sports'));
  }

  public function detail($id) {
      $forecasts = ForecastModel::find($id);
      return view(env('THEME').'.forecast.detail', compact('forecasts'));
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
       return view(env('THEME').'.forecast.edit1', compact('forecast', 'sports', 'countrys'));
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
  $forecast->data_game = request()->input('date_game');
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


    return view(env('THEME').'.forecast.edit2', compact('forecast', 'champ_mass', 'command_mass', 'sport_name'));
 }

  public function del($id) {
        ForecastModel::find($id)->delete();
        // return redirect('/country');
        return redirect(route('ForecastList'));
    }

  protected function mass_list($models) {
        $mass = [];
        foreach ($models as $model) {
          $mass[$model->id] = $model->name;
        }
        return $mass;
    }
}
