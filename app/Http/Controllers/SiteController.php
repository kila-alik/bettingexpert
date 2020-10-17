<?php

namespace Bett\Http\Controllers;
// namespace Bett\Repository\ForecastRepository;

use Illuminate\Http\Request;

use Bett\Repositories\ForecastRepository;
use Bett\Http\Controllers;

class SiteController extends Controller
{
  // переменная для репазитория прогнозов forecast
  protected $f_rep;

  protected $template;
  protected $vars = array();

  protected $contentRightBar = False;
  protected $contentLeftBar = False;
  protected $bar = false;


  // методом внедрения зависимости в конструктор передаем
  // в переменную $forecast передаем объект репозитория ForecastRepository
  public function __construct(ForecastRepository $f_rep) {
    // в переменную f_rep записываем объект типа
    // репозиторя ForecastRepository через переменную конструктора $f_rep
    // обратить внимание на конструктор в дочернем IndexController
    // и добавить в use Bett\Repository\ForecastRepository
    $this->f_rep = $f_rep;
    // переменная f_rep будет использоваться ниже в применении метода get()

  }

  protected function renderOutput() {

    // подборку прогнозов - $forecast будет выводить на разные страницы
    // функция getForecast, которую мы опишем вне функции renderOutput()
    $forecast = $this->getForecast();
    // dd($forecast[1]->coeff);
    // $www = $forecast[1]->coeff;
    // exit;

    // $content = view(env('THEME').'.content')->render();
    $this->vars = array_add($this->vars, 'content', $forecast);
    // $this->vars = array_add($this->vars, 'content', $www);
    // так например выводим блок навигации в index.blade.php
    // без include , зато добавляем переменные
    // и выводим этот блок сам как переменную
    $navigation = view(env('THEME').'.navigation')->render();
    $this->vars = array_add($this->vars, 'navigation', $navigation);


// $qwer = $this->vars;
// $www = $qwer['content'][1]->command_1;
// $www->load('command');

// dd($www);
// var_dump($this->vars);
// exit;
    return view($this->template)->with($this->vars);
  }

  protected function getForecast() {
    // переменная этой функции $forecast и в нее попадет
    // выборка которую должен релизовать репозторий ForecastRepository
    // и у него потом вызываем метод get() который опишем позже
    $forecast = $this->f_rep->get();

    return $forecast;
  }

}
