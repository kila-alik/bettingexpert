<?php

namespace Bett\Http\Controllers;

use Illuminate\Http\Request;
use Bett\ChampionshipModel;
use Bett\SportModel;
use Bett\CountryModel;
// Спросить у Леши как дать доступ к Carbon в представлении в Blade
use Carbon\Carbon;

class ChampionshipController extends SiteController
{
  public function list() {

      $championships = ChampionshipModel::all();

      return view(env('THEME').'.championship.list', compact('championships'));
  }

  public function detail($id) {
      $championships = ChampionshipModel::find($id);
      return view(env('THEME').'.championship.detail', compact('championships'));
  }

   public function edit($id) {
      $championship = ChampionshipModel::find($id);
      // Если запись с таким id есть то перейдет к return и выдет из метода
      // если id задали как new - то такого id в базе нет
      // и переменная $championship будет пустой и зайдет в if ниже
// dd(Route::current()->parameters());
// dd(Route::currentRouteName());
// dd(Request::getCurrentRequest());

      if(empty($championship)) {
          $championship = new ChampionshipModel;
      }

      if(request()->isMethod('post')) {
           $championship->name = request()->input('name');
           $championship->sports_id = request()->input('sport');
           $championship->country_id = request()->input('country');
           $championship->date_begin = request()->input('date_begin');
           $championship->date_end = request()->input('date_end');
           // $country->text = request()->input('text');
           $championship->save();
           // return redirect('/country/'.$country->id);
           return redirect(route('ChampionshipDetail', ['id' => $championship->id]));
      }

      // передадим в представление список видов спорта
      $sport_all = SportModel::all();
      $sports = $this->mass_list($sport_all);


      // передадим в представление список стран
      $country_all = CountryModel::all();
      $countrys = $this->mass_list($country_all);

      // array_combine — Создает новый массив, используя один массив в качестве ключей, а другой для его значений
      // Мы взяли один и тот же массив $countrys и для ключей и для значений массива
      // $countrys = array_combine($countrys, $countrys);
      // dd($countrys);
      // dd($championship->sport->name);

      return view(env('THEME').'.championship.edit', compact('championship', 'sports', 'countrys'));
  }

//   public function del($id) {
//         ChampionshipModel::find($id)->delete();
//         // return redirect('/country');
//         return redirect(route('ChampionshipList'));
// }
}
