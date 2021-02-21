<?php

namespace Bett\Http\Controllers;
// namespace Bett\Repository\ForecastRepository;
// namespace Bett\Repository;

use Illuminate\Http\Request;
use Bett\Repositories\ForecastsRepository;
use Bett\ForecastModel;
use Carbon\Carbon;
// use Intervention\Image\ImageManager;
// use Bett\Image;
use Intervention\Image\ImageManagerStatic as Image;
// use Bett\Http\Controllers;

class ForecastController extends Controller
// class IndexController extends Controller
{
  // protected $f_rep;
  // protected $template;
  // protected $vars = array();

  // public function __construct(ForecastsRepository $f_rep) {
  //   // в переменную f_rep записываем объект типа
  //   // репозиторя ForecastsRepository через переменную конструктора $f_rep
  //   // обратить внимание на конструктор в дочернем IndexController
  //   // и добавить в use Bett\Repository\ForecastsRepository
  //   $this->f_rep = $f_rep;
  //   $this->template = env('THEME').'.forecast.public.index';
  //
  //   // переменная f_rep будет использоваться ниже в применении метода get()
  // }
  //
  // public function __construct() {
  //   // чтоб сработали родительский конструктор в него надо
  //   // передать НОВЫЙ(new) объект типа ForecastRepository с полным путем
  //   // и соответственно для него надо НОВЫЙ(new) объект модели ForecastModel с полым путем
  //
  //     parent::__construct(new \Bett\Repositories\ForecastsRepository(new \Bett\ForecastModel));
  //
  //     $this->bar = 'right';
  //     }
  // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
      // public function index($id=false)
      {
        // подборку прогнозов - $forecast будет выводить на разные страницы
        // функция getForecast, которую мы опишем вне функции renderOutput()
          return $this->renderOutput(0, \Carbon\Carbon::now()->format('Y-m-d'));
      }

    // public function indexsport($idSportMenu=false)
    public function indexsport($idSportMenu=false, $idDataMenu=false)
      {
        return $this->renderOutput($idSportMenu, $idDataMenu);
      }

    public function forecast($id)
      {
        $forecast = ForecastModel::find($id);

        // $idDataMenu = \Carbon\Carbon::now()->format('Y-m-d');
        // вариант с сессией
        $idDataMenu = \Carbon\Carbon::parse($forecast->date_game)->format('Y-m-d');
        // return view(env('THEME').'.forecast.public.index')->with($this->vars);
        $bodyImage = $forecast->championship->sport->alias;
        // dd($forecast->championship->sport->alias);
        return view(env('THEME').'.forecast.public.index_forecast', compact('forecast', 'idDataMenu', 'bodyImage'));
      }
    // public function forecast($id)
    //   {
    //     $forecast = ForecastModel::find($id);
    //
    //     // $idDataMenu = \Carbon\Carbon::now()->format('Y-m-d');
    //     // вариант с сессией
    //     $idDataMenu = \Carbon\Carbon::parse($forecast->date_game)->format('Y-m-d');
    //
    //     $arrMenu = ['1' => 'Футбол', '2' => 'Хоккей', '3' => 'Баскетбол', '4' => 'Теннис'];
    //     //  и передавать не надо
    //     $navigation = view(env('THEME').'.layouts.navigation_all', compact('idDataMenu', 'arrMenu'))->render();
    //     $this->vars = array_add($this->vars, 'navigation', $navigation);
    //
    //     // $content = view(env('THEME').'.forecast.public.forecast', compact('arSports', 'arCountrys', 'idDataMenu'))->render();
    //     $content = view(env('THEME').'.forecast.public.forecast', compact('forecast'))->render();
    //     $this->vars = array_add($this->vars, 'content', $content);
    //
    //
    //     return view(env('THEME').'.forecast.public.index')->with($this->vars);
    //     // return view(env('THEME').'.forecast.public.index', compact('forecast'));
    //   }

    protected function renderOutput($idSportMenu=false, $idDataMenu=false) {

      // $vars = array();
      // $forecasts = ForecastModel::all();
      $forecasts = ForecastModel::whereDate('date_game', $idDataMenu)->get();
      // для прогнозов по центру
      if($idSportMenu && $idSportMenu !== 0) {
        $arSports = $this->ar_sports($forecasts, $idSportMenu);
        // эта проверка на то что есть ли прогноз по ЭТОМУ виду спорта в ЭТУ дату
        if(count($arSports) > 0)
          $bodyImage = $arSports[$idSportMenu]['alias'];
        else
          $bodyImage = false;
        // $vars = array_add($vars, 'bodyImage', $bodyImage);
      } else {
        $arSports = $this->ar_sports($forecasts);
      }

      // для стран справо, и для видов спорта в меню
      $arCountrys = $this->ar_countrys($forecasts);
      // $bodyImage = view(env('THEME').'.layouts.all', compact('arSports'))->render();

      // $content = view(env('THEME').'.forecast.public.content', compact('arSports', 'arCountrys', 'idDataMenu'))->render();
      // $vars = array_add($vars, 'content', $content);
      // dd(\Carbon\Carbon::parse($idDataMenu)->format('Y-m-d'));
      // $navigation = view(env('THEME').'.layouts.navigation_all', compact('arCountrys', 'idDataMenu', 'arrMenu'))->render();
      // $navigation = view(env('THEME').'.layouts.navigation_all', compact('idDataMenu', 'arrMenu'))->render();
      // $vars = array_add($vars, 'navigation', $navigation);
      // Image::configure(array('driver' => 'gd'));
      // return view(env('THEME').'.forecast.public.index')->with($vars);
      return view(env('THEME').'.forecast.public.index', compact('arSports', 'arCountrys', 'idDataMenu', 'bodyImage'));
    }

    // protected function getForecast() {
    //     // переменная этой функции $forecast и в нее попадет
    //     // выборка которую должен релизовать репозторий ForecastsRepository
    //     // и у него потом вызываем метод get() который опишем позже
    //     $forecast = $this->f_rep->get();
    //     return $forecast;
    //   }

    protected function ar_sports($forecasts, $sportId = FALSE) {
      // это массив ИМЕНИ Леши, вместо моих двух массивов  forecasts sports
      // он такой и его легче и быстрее перебрать, и не будет на выдаче пустых видов спорта
      // ===============================
      // 1 =>
      //     name => футбол
      //     alias => soccer
      //     forecasts =>
      //                 forecast1
      //                 forecast2
      //                 ...
      // 2 =>
      //     name => хоккей
      //     alias => hockey
      //     forecasts =>
      //                 forecast1
      //                 forecast2
      //                 ...
      // ...
      // =================================
      $arSports = [];
      foreach ($forecasts as $forecast) {
        // берем через динамические свойства ИМЕННО МОДЕЛЬ спорта
        $sport = $forecast->championship->sport;
        // если есть второй параметр, то пропустит все спорты кроме с индексом равным $sportId
        if ($sportId && $sportId <> $sport->id) {
        // if ($sportId) {
          continue;
        }
        // если нет блока для записи по одному виду спорта - создаем ее
        // при этом заполняем имя , алиас и создаем пустой массив forecasts
        if (!isset($arSports[$sport->id])) {
          $arSports[$sport->id] = [
            'name'=>$sport->name,
            'alias'=>$sport->alias,
            'forecasts'=>[]
          ];
        }
        // при каждом проходе (в том числе и первом) Записываем в пустой подмассив ИМЕННО МОДЕЛИ прогнозов
        $arSports[$sport->id]['forecasts'][] = $forecast;
      }
      // dd($arSports);
      return $arSports;
    }

    protected function ar_countrys($forecasts) {

      // ===============================
      // 1 =>
      //     name => футбол
      //     alias => soccer
      //     list =>
      //                 country1 - имя страны ($country->name)
      //                 country2
      //                 ...
      //
      //     countrys =>
      //                 0 ($country->id) =>
      //                                   0 => модель страны ($country)
      //                                   1 => n - здесь будет количество встреченных одинаковых стран
      //                                   3 => модель чемпионата в этой стране ($championship)
      //                 1 =>
      //                                   0 => name
      //                                   1 => m
      //                                   3 => модель чемпионата
      //                ...
      // 2 =>
      //     name => хоккей
      //     alias => hockey
      //     list =>
      //                 country1 - имя страны ($country->name)
      //                 country2
      //                 ...
      //
      //     countrys =>
      //                 0 ($country->id) =>
      //                                   0 => name - имя страны ($country)
      //                                   1 => n - здесь будет количество встреченных одинаковых стран
      //                                   3 => модель чемпионата
      //                 1 =>
      //                                   0 => name
      //                                   1 => m
      //                                   3 => модель чемпионата
      //                ...
      // ...
      // =================================
      $arCountrys = [];
      foreach ($forecasts as $forecast) {
        // берем через динамические свойства ИМЕННО МОДЕЛЬ спорта
        $sport = $forecast->championship->sport;
        // берем через динамические свойства ИМЕННО МОДЕЛЬ стран
        $country = $forecast->championship->country;
        // берем через динамические свойства ИМЕННО МОДЕЛЬ чемпионата
        $championship = $forecast->championship;
        // dd($country);
        // если нет блока для записи по одному виду спорта - создаем ее
        // при этом заполняем имя , алиас и создаем пустой массив countrys
        if (!isset($arCountrys[$sport->id])) {
          $arCountrys[$sport->id] = [
            'name'=>$sport->name,
            'alias'=>$sport->alias,
            'countrys'=>[],
            // list - нужен для проверки встречалась ли страна при переборе
            'list'=>[]
          ];
        }
        // при каждом проходе (в том числе и первом) Записываем в пустой подмассив ИМЕННО МОДЕЛИ стран
        if (in_array($country->name, $arCountrys[$sport->id]['list'])) {
          $arCountrys[$sport->id]['countrys'][$country->id][1] = $arCountrys[$sport->id]['countrys'][$country->id][1] + 1;
          // continue;
        } else {
          $arCountrys[$sport->id]['countrys'][$country->id][0] = $country;
          $arCountrys[$sport->id]['countrys'][$country->id][1] = 1;
          $arCountrys[$sport->id]['countrys'][$country->id][2] = $championship;
          $arCountrys[$sport->id]['list'][] = $country->name;
        }
      }
      // dd($arCountrys);
      return $arCountrys;
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
