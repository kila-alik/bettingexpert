<?php

namespace Bett\Http\Controllers;

use Illuminate\Http\Request;

class ASiteController extends Controller
{
    protected $template;
    protected $vars = array();

    public function __construct() {

    }

    protected function renderOutput() {

      $navigation = view(env('THEME').'.navigation')->render();
      $this->vars = array_add($this->vars, 'navigation', $navigation);

      return view($this->template)->with($this->vars);
    }
    //
}
