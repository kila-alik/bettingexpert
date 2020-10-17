<?php

namespace Bett\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Bett\Http\Controllers\SiteController;
// use Bett\Http\Controllers;

class AdminController extends SiteController
{
  public function __construct()
  {
      // $this->template = env('THEME').'.admin.admin';
  }

  //
  public function index()
  {
      // $payments = Payment::orderByDesc('id')->take(10)->get();
      // $verifPayments = Payment::verified();
      // $forecastCount = Forecast::all()->count();
      // $usersCount = User::all()->count();
      //
      //
      // $this->vars['content'] = view('admin.index')->with([
      //                             'count_payments'=>$verifPayments->count(),
      //                             'amountPayments'=>$verifPayments->sum('amount'),
      //                             'payments' => $payments,
      //                             'forecastCount' => $forecastCount,
      //                             'usersCount' => $usersCount
      //                         ])->render();

      // return $this->renderOutput();

          // $countrys = CountryModel::all();

          return view(env('THEME').'.admin.admin');
  }
}
