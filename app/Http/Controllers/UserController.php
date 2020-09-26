<?php

namespace Bett\Http\Controllers;

use Bett\Forecast;
use Bett\Sort;
use Bett\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Gate;

class UserController extends SiteController
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->template = 'user';
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    public function home()
    {

        $user = Auth::user();

        $this->vars['title'] = $user->name.' | Личный кабинет';

        if(Gate::allows('subscription-check')) {
            $forecasts = Forecast::where('status', 0)
                ->where('date', '>', Carbon::now())
                ->orderBy('date','DESC')->get();
        }else{
            $forecasts = $user->forecasts()->where('status', 0)->get();
        }

        $forecasts_statistics = $user->forecasts()->where('status', '!=', 0)->get();

        $this->vars['content'] = view('user_home')
            ->with([
                'sort'=>Sort::class,
                'forecasts' => $forecasts,
                'subscription'=>Gate::allows('subscription-check'),
                'datePast'=>Subscription::subscriptionCheck(),
                'forecasts_statistics' => $forecasts_statistics
                ])
            ->render();

        return $this->renderOutput();
    }
}
