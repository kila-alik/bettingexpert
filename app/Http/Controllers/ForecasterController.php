<?php

namespace App\Http\Controllers;

use App\Forecast;
use App\Sort;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ForecasterController extends SiteController
{
    public function __construct() {
        $this->template = 'forecaster.frame';
    }

    public function index($forecaster) {
        $forecaster = User::where('is_forecaster', 1)->where('id', $forecaster)->orderBy('id', 'DESC')->firstOrFail();

        $this->vars['title'] = 'Профиль прогнозиста <b>'.$forecaster->name;
        $forecasts_bank = Forecast::where('status', '!=', 0)
            ->where('forecaster_id', $forecaster->id)
            ->whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])
            ->orderBy('date', 'DESC')
            ->get();
        $forecasts_bank = $this->forecastBank($forecasts_bank);

        $this->vars['content'] = view('forecaster.index')->with(['forecasts_bank'=>$forecasts_bank, 'forecaster' => $forecaster, 'sort'=> new Sort()])->render();

        return $this->renderOutput();
    }


}