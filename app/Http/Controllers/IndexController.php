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

class IndexController extends SiteController
// class IndexController extends Controller
{

  public function __construct() {
    // чтоб сработали родительский конструктор в него надо
    // передать НОВЫЙ(new) объект типа ForecastRepository с полным путем
    // и соответственно для него надо НОВЫЙ(new) объект модели ForecastModel с полым путем

      parent::__construct(new \Bett\Repositories\ForecastsRepository(new \Bett\ForecastModel));

      $this->bar = 'right';
      $this->template = env('THEME').'.index';
      }
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

    // public function indexsport($idSport=false)
    public function indexsport($idSport=false, $idData=false)
      {
        return $this->renderOutput($idSport, $idData);
      }

    protected function renderOutput($idSport=false, $idData=false) {

    // dd($idData);
      // $forecasts = $this->getForecast();
      // $forecasts = ForecastModel::all();
      $forecasts = ForecastModel::whereDate('date_game', $idData)->get();
      $arrMenu = ['1' => 'Футбол', '2' => 'Хоккей', '3' => 'Баскетбол', '4' => 'Теннис'];
      // dd($arrMenu);

      // для прогнозов по центру
      if($idSport && $idSport !== 0) {
        $arSports = $this->ar_sports($forecasts, $idSport);
        // эта проверка на то что есть ли прогноз по ЭТОМУ виду спорта в ЭТУ дату
        if(count($arSports) > 0) $body = $arSports[$idSport]['alias'];
        else $body = false;
        $this->vars = array_add($this->vars, 'body', $body);
      } else {
        $arSports = $this->ar_sports($forecasts);
      }

      // для стран справо, и для видов спорта в меню
      $arCountrys = $this->ar_countrys($forecasts);
      // $body = view(env('THEME').'.layouts.all', compact('arSports'))->render();

      $content = view(env('THEME').'.content', compact('arSports', 'arCountrys', 'idData'))->render();
      $this->vars = array_add($this->vars, 'content', $content);
      // dd(\Carbon\Carbon::parse($idData)->format('Y-m-d'));
      $navigation = view(env('THEME').'.layouts.navigation_all', compact('arCountrys', 'idData', 'arrMenu'))->render();
      $this->vars = array_add($this->vars, 'navigation', $navigation);
      // Image::configure(array('driver' => 'gd'));
      return view($this->template)->with($this->vars);
    }

    protected function getForecast() {
        // переменная этой функции $forecast и в нее попадет
        // выборка которую должен релизовать репозторий ForecastsRepository
        // и у него потом вызываем метод get() который опишем позже
        $forecast = $this->f_rep->get();
        return $forecast;
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
