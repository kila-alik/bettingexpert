<?php

namespace Bett\Http\Controllers;

use Illuminate\Http\Request;
use Bett\CommandModel;
use Bett\SportModel;
use Bett\CountryModel;

class CommandController extends Controller
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
        dd(getimagesize($_FILES['logo']['name']));
           $command->name = request()->input('name');
           // dd(request()->input('name'));
           $command->sports_id = request()->input('sport');
           $command->country_id = request()->input('country');
           $command->description = request()->input('description');
        dd(request()->input('logo'));
           if(!empty(request()->input('logo'))) {
             $command->logo = request()->input('logo');
           }
           // $nameDirCountryLogos = public_path(env('THEME') . DIRECTORY_SEPARATOR . 'logos');
           // $mass_logo_folders = $this->mass_logo($nameDirCountryLogos);
           // dd($mass_logo_folders[request()->input('logo_folder')]);
           // dd(request()->input('logo_folder'));

           // $dirLogoFolder = request()->input('logo_folder');
           // dd($dirLogoFolder);

           $command->save();
           // return redirect('/country/'.$country->id);
           return redirect(route('CommandDetail', ['id' => $command->id]));
           // return redirect(route('CommandLogo', ['id' => $command->id, 'folder' => $dirLogoFolder]));
      }

      $sport_all = SportModel::all();
      $mass_sports = $this->mass_list($sport_all);

      $country_all = CountryModel::all();
      $mass_countrys = $this->mass_list($country_all);
      // две следующие строки были в первой версии двухстраничного диалога редактирования
      // $nameDirCountryLogos = public_path(env('THEME') . DIRECTORY_SEPARATOR . 'logos');
      // $mass_logo_folders = $this->mass_logo($nameDirCountryLogos);
      return view(env('THEME').'.command.edit', compact('command', 'mass_sports', 'mass_countrys'));
  }

  protected function mass_logo($folder) {
      $mass = [];
      $folders_files = scandir($folder);
      // dd($folders_files);
      foreach ($folders_files as $key=>$item) {
        if($item == '.' || $item == '..' || $item == 'icon-excl.png') continue;
        // $mass[$model->id] = $model->name;
        // $mass[$key-1] = $item;
        $mass[$item] = $item;
      }
      return $mass;
  }

  public function logo($id, $folder=false) {
     $command = CommandModel::find($id);

     // if(empty($command)) {
     //     $command = new CommandModel;
     // }

     if(request()->isMethod('post')) {
         // $command->logo = request()->input('folder'). DIRECTORY_SEPARATOR .request()->input('logoFile');
         $command->logo = request()->input('folder'). '/' .request()->input('logoFile');
         // dd($command->logo);
         $command->save();
         // dd($command);
       // return redirect('/country/'.$country->id);
       return redirect(route('CommandDetail', ['id' => $command->id]));
       // return redirect(route('CommandLogo', ['id' => $command->id]));
      }

      $nameDirLogos = public_path(env('THEME') . DIRECTORY_SEPARATOR . 'logos' . DIRECTORY_SEPARATOR . $folder);
      $mass_logos = $this->mass_logo($nameDirLogos);
      // dd($mass_logo_folders);

      return view(env('THEME').'.command.logo', compact('command', 'folder', 'mass_logos'));

  }
  // public function del($id) {
  //       CommandModel::find($id)->delete();
  //       // return redirect('/country');
  //       return redirect(route('CommandList'));
  // }

}
