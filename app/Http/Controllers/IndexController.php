<?php

namespace Bett\Http\Controllers;
// namespace Bett\Repository\ForecastRepository;
// namespace Bett\Repository;

use Illuminate\Http\Request;
use Bett\Repositories\ForecastsRepository;
use Bett\ForecastModel;
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
        return $this->renderOutput();
    }

    protected function renderOutput($id=false) {

      $forecasts = $this->getForecast();
      // $forecasts = ForecastModel::all();

      if($id) {
        $arSports = $this->ar_sports($forecasts, $id);
      } else {
        $arSports = $this->ar_sports($forecasts);
      }
      // для стран справо
      $arCountrys = $this->ar_countrys($forecasts);

      $content = view(env('THEME').'.content', compact('arSports', 'arCountrys'))->render();
      $this->vars = array_add($this->vars, 'content', $content);
      $navigation = view(env('THEME').'.layouts.navigation_all')->render();
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
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function indexsport($id=false)
    {
        return $this->renderOutput($id);
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
