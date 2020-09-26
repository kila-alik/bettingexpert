<?php

namespace Bett\Http\Controllers;

use Bett\Forecast;
use Bett\News;
use Bett\Sort;
use Carbon\Carbon;


class ForecastController extends SiteController
{

    /**
     * ForecastController constructor.
     */
    public function __construct()
    {
        $this->template = 'user';
    }

    /**
     * @param bool $alias_a
     * @param bool $alias_b
     * @return $this|void
     * @throws \Throwable
     */
    public function show($alias_a=false, $alias_b=false)
    {
        if(\Request::route()->getName()=='forecastWsort'){
            $alias = $alias_b;
        }else{
            $alias = $alias_a;
        }

        $forecast = Forecast::where('alias', $alias)->checked()->firstOrFail();
        if(!$forecast){
            return abort(404);
        }


        $this->vars['title'] = $forecast->title;
        $this->vars['meta_keywords'] = $forecast->meta_keywords;
        $this->vars['meta_description'] = $forecast->meta_description;

        $last_forecasts = Forecast::where('status', 0)
            ->where('date', '>', Carbon::now())
            ->where('id', '!=', $forecast->id)
            ->where('sort_ord', 0)
            ->orderBy('date','DESC')->take(3)->get();

        $this->vars['content'] = view('forecast_show')->with(['last_forecasts'=> $last_forecasts, 'forecast' => $forecast, 'sort'=>Sort::class])->render();

        return $this->renderOutput();

    }

    public function ShowForecastsBySort($sort) {

        if(!in_array($sort,['ordinar', 'express'])){
            return abort(404);
        }

        if($sort=='ordinar'){
            $sort = 0;
            $sort_name = 'Ординар';
        }else{
            $sort = 1;
            $sort_name = 'Экспресс';
        }

        $forecasts = Forecast::where(function($query)use($sort){
            $query->where('status', 0);
            $query->where('date', '>', Carbon::now());
            $query->where('sort_ord', $sort);
        })->orderBy('date','DESC')->get();

        $forecasts_statistics = Forecast::where(function($query)use($sort){
            $query->where('status', '!=', 0);
            $query->where('sort_ord', $sort);
        })->orderBy('date', 'DESC')->take(5)->get();

        $this->vars['title'] = 'Прогнозы - '.$sort_name;

        $this->vars['content'] = view('sort_show')->with([
            'sort' => new Sort(),
            'sort_name' => $sort_name,
            'forecasts' => $forecasts,
            'statistics' => $forecasts_statistics
        ])->render();
        return $this->renderOutput();
    }

    public function ShowForecastsBySport($sport) {

        $sort = Sort::where('alias', $sport)->firstOrFail();
        $sorts = Sort::orderBy('id', 'ASC')->get();
        $forecasts = $sort->forecasts()->where('status', 0)
            ->where('date', '>', Carbon::now())
            ->orderBy('date','DESC')->get();

        $forecasts_statistics = $sort->forecasts()->where('status', '!=', 0)
            ->orderBy('date', 'DESC')
            ->take(5)->get();

        $this->vars['title'] = 'Прогнозы - '.$sort->name;

        $this->vars['content'] = view('sport_show')->with([
            'sort' => $sort,
            'sorts' => $sorts,
            'forecasts' => $forecasts,
            'statistics' => $forecasts_statistics
        ])->render();
        return $this->renderOutput();
    }
}
