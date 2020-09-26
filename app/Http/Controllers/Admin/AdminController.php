<?php

namespace Bett\Http\Controllers\Admin;

use Bett\Forecast;
use Bett\News;
use Bett\Payment;
use Bett\User;
use Bett\Http\Controllers\SiteController;

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
