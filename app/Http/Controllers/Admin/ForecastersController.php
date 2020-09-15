<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForecastersController extends SiteController
{
    public function __construct()
    {
        $this->template = 'admin.forecasters.frame';
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    public function index() {
        $users = User::orderBy('id', 'DESC')->IsForecaster(1)->paginate(12);

        $this->vars['content'] = view('admin.forecasters.index')->with('users', $users)->render();

        return $this->renderOutput();
    }
}
