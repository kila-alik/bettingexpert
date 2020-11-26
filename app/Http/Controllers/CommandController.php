<?php

namespace Bett\Http\Controllers;

use Illuminate\Http\Request;
use Bett\CommandModel;
use Bett\SportModel;
use Bett\CountryModel;

class CommandController extends SiteController
{
  public function list() {

      $commands = CommandModel::all();

      // dd($commands);
      return view(env('THEME').'.command.list', compact('commands'));
  }

  public function detail($id) {
      $commands = CommandModel::find($id);
      return view(env('THEME').'.command.detail', compact('commands'));
  }

   public function edit($id) {
      $command = CommandModel::find($id);
      // Если запись с таким id есть то перейдет к return и выдет из метода
      // если id задали как new - то такого id в базе нет
      // и переменная $command будет пустой и зайдет в if ниже

      if(empty($command)) {
          $command = new CommandModel;
      }

      if(request()->isMethod('post')) {
           $command->name = request()->input('name');
           $command->sports_id = request()->input('sport');
           $command->country_id = request()->input('country');
           $command->description = request()->input('description');
           // $country->text = request()->input('text');
           $command->save();
           // return redirect('/country/'.$country->id);
           return redirect(route('CommandDetail', ['id' => $command->id]));
      }

      $sport_all = SportModel::all();
      $sports = $this->mass_list($sport_all);

      $country_all = CountryModel::all();
      $countrys = $this->mass_list($country_all);
      // dd($countrys);

      return view(env('THEME').'.command.edit', compact('command', 'sports', 'countrys'));
  }

  // public function del($id) {
  //       CommandModel::find($id)->delete();
  //       // return redirect('/country');
  //       return redirect(route('CommandList'));
  // }

}
