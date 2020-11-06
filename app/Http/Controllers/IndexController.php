<?php

namespace Bett\Http\Controllers;
// namespace Bett\Repository\ForecastRepository;
// namespace Bett\Repository;

use Illuminate\Http\Request;
use Bett\Repositories\ForecastsRepository;

// use Bett\Http\Controllers;
// use Bett\Repository\ForecastRepository;
// use Bett\Forecast;

class IndexController extends SiteController
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
    {
        return $this->renderOutput();
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
