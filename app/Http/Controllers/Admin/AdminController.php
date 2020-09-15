<?php

namespace App\Http\Controllers\Admin;

use App\Forecast;
use App\News;
use App\Payment;
use App\User;
use App\Http\Controllers\SiteController;

class AdminController extends SiteController
{

    public function __construct()
    {
        $this->template = 'admin/admin';
    }

    //
    public function index()
    {
        $payments = Payment::orderByDesc('id')->take(10)->get();
        $verifPayments = Payment::verified();
        $forecastCount = Forecast::all()->count();
        $usersCount = User::all()->count();


        $this->vars['content'] = view('admin.index')->with([
                                    'count_payments'=>$verifPayments->count(),
                                    'amountPayments'=>$verifPayments->sum('amount'),
                                    'payments' => $payments,
                                    'forecastCount' => $forecastCount,
                                    'usersCount' => $usersCount
                                ])->render();

        return $this->renderOutput();
    }
}
