<?php

namespace Bett\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Bett\Http\Controllers\SiteController;
use Bett\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Bett\Http\Controllers;

class AdminController extends SiteController
{
  public function __construct()
  {
      // $this->template = env('THEME').'.admin.admin';
      $this->middleware('auth');
  }

  //
  public function index()
  {
          return view(env('THEME').'.admin.admin');
  }

  public function change_pass($id)
  {
    $user = User::find($id);
    // dd(!empty($user));
    if(!empty($user) && $user->id == Auth::user()->id) {
      if(request()->isMethod('post')) {
        if(Hash::check(request()->input('password_old'), $user->password)) {
          // dd(request()->all());
          // состовляем сообщения для валидатора при возникновении ошибки
          $messages = [
            'required' => 'Необходимо указать :attribute.',
            'confirmed' => 'Пароль в поле :attribute и повторный пароль не совпадают',
            'digits_between' => 'Пароль в поле :attribute. должен быть между :min и :max символов',
          ];
          // формируем сам валидатор
          $validator = Validator::make(request()->all(), [
            'password' => 'required|confirmed|digits_between:8,255',
            'password_confirmation' => 'required',
          ], $messages);
          // запускаем сам валидатор
          if ($validator->fails()) {
              return redirect(route('ChangePass', ['id' => Auth::user()->id]))
                      ->withErrors($validator)
                      ->withInput();
          }

          $user->password = Hash::make(request()->input('password'));
          $user->save();
          return redirect(route('ChangePass', ['id' => Auth::user()->id]))
                  ->with('password_old', 'Пароль в базе ИЗМЕНЁН!!!');

        } else {
          // return view(env('THEME').'.user.password', compact('user', 'password_old'));
          return redirect()->back()->with('password_old', 'Старый пароль неверен!!!');
        }
      } else {
        // Это когда первый раз GET-ом заходим
        // $password_old = '';
        // return view(env('THEME').'.user.password', compact('user', 'password_old'));
        return view(env('THEME').'.user.password', compact('user'));
      }
    } else {
      // это когда он балуется и в вводит в страке не свой id
      return redirect(route('ChangePass', ['id' => Auth::user()->id]));
    }
  }

  public function deposit($id)
  {
    $user = User::find($id);
    // dd(!empty($user));
    if(!empty($user) && $user->id == Auth::user()->id) {
      // Это когда первый раз GET-ом заходим
      // return view(env('THEME').'.user.password', compact('user', 'password_old'));
      return view(env('THEME').'.user.deposit', compact('user'));

    } else {
      // это когда он балуется и в вводит в страке не свой id
      return redirect(route('Deposit', ['id' => Auth::user()->id]));
    }
  }

  public function list()
  {
    $users = User::all();
    return view(env('THEME').'.user.list', compact('users'));
  }

  public function detail($id)
  {
      $user = User::find($id);
      return view(env('THEME').'.user.detail', compact('user'));
  }

  public function edit($id) {
     $user = User::find($id);

     if(request()->isMethod('post')) {
          $user->name = request()->input('name');
          $user->email = request()->input('email');
          $user->created_at = request()->input('created_at');
          $user->updated_at = request()->input('updated_at');
          $user->is_admin = request()->input('is_admin');
          $user->deposit = request()->input('deposit');
          // $country->text = request()->input('text');
          $user->save();
          // return redirect('/country/'.$country->id);
          return redirect(route('UserDetail', ['id' => $user->id]));
     }

   // это при первом входе по GET-запросу
   return view(env('THEME').'.user.edit', compact('user'));
 }

 public function del($id) {
   if(request()->isMethod('post') && Auth::user()->is_admin == '1') {
      $user = User::find($id);
      if($user->is_admin == '0'){
         User::find($id)->delete();
      }
   }
       return redirect(route('UsersList'))->with('password_changed', 'Клиента '.$user->name.' УДАЛЕН из базы!!!');
   }

 public function pass($id) {
   if(request()->isMethod('post') && request()->input('pass') && Auth::user()->is_admin == '1') {
     // dd(Auth::user()->is_admin == '1');
     $user = User::find($id);
     // администратора нельзя удалить
     if($user->is_admin == '0'){
        $user->password = Hash::make('12345678');
        $user->save();
     }
   }
       return redirect(route('UsersList'))->with('password_changed', 'Пароль у клиента '.$user->name.' в базе СБРОШЕН на 12345678!!!');
   }
}
