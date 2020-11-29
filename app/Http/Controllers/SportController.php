<?php

namespace Bett\Http\Controllers;

use Illuminate\Http\Request;
use Bett\SportModel;
use Config;
use Route;

class SportController extends Controller
{
// Date::setLocale('ru');

// echo Date::now()->format('l j F Y H:i:s'); // zondag 28 april 2013 21:58:16

// echo Date::parse('-1 day')->diffForHumans();

  public function list() {

      $sports = SportModel::all();

      return view(env('THEME').'.sport.list', compact('sports'));
  }

  public function detail($id) {
      $sports = SportModel::find($id);
      return view(env('THEME').'.sport.detail', compact('sports'));
  }

   public function edit($id) {
      $sport = SportModel::find($id);
      // Если запись с таким id есть то перейдет к return и выдет из метода
      // если id задали как new - то такого id в базе нет
      // и переменная $sport будет пустой и зайдет в if ниже
// dd(Route::current()->parameters());
// dd(Route::currentRouteName());
// dd(Request::getCurrentRequest());

      if(empty($sport)) {
          $sport = new SportModel;
      }

      if(request()->isMethod('post')) {
           $sport->name = request()->input('name');
           // $sport->sports = request()->input('sports');
           // $sport->text = request()->input('text');
           $sport->save();
           // return redirect('/sport/'.$sport->id);
           return redirect(route('SportDetail', ['id' => $sport->id]));
      }
// Это дл создания выпадающего списка видов спорта
      // $sports = Config::get('settings.sports');

      return view(env('THEME').'.sport.edit', compact('sport'));
  }

//   public function del($id) {
//         SportModel::find($id)->delete();
//         // return redirect('/sport');
//         return redirect(route('SportList'));
// }
}
