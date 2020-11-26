<?php

namespace Bett\Http\Controllers;

use Illuminate\Http\Request;
use Bett\CountryModel;
// use Illuminate\Routing\Route;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Routing\URI;
use Config;
use Route;

class CountryController extends Controller
{
  public function list() {

      $countrys = CountryModel::all();

      return view(env('THEME').'.country.list', compact('countrys'));
  }

  public function detail($id) {
      $countrys = CountryModel::find($id);
      return view(env('THEME').'.country.detail', compact('countrys'));
  }

   public function edit($id) {
      $country = CountryModel::find($id);
      // Если запись с таким id есть то перейдет к return и выдет из метода
      // если id задали как new - то такого id в базе нет
      // и переменная $country будет пустой и зайдет в if ниже
// dd(Route::current()->parameters());
// dd(Route::currentRouteName());
// dd(Request::getCurrentRequest());

      if(empty($country)) {
          $country = new CountryModel;
      }

      if(request()->isMethod('post')) {
           $country->name = request()->input('name');
           // $country->sports = request()->input('sports');
           // $country->text = request()->input('text');
           $country->save();
           // return redirect('/country/'.$country->id);
           return redirect(route('CountryDetail', ['id' => $country->id]));
      }
// Это дл создания выпадающего списка видов спорта
      // $sports = Config::get('settings.sports');

      return view(env('THEME').'.country.edit', compact('country'));
  }

//   public function del($id) {
//         CountryModel::find($id)->delete();
//         // return redirect('/country');
//         return redirect(route('CountryList'));
// }
}
