<?php
namespace Bett\Http\Controllers;
// namespace Bett\Repository\ForecastsRepository;
// require 'vendor/autoload.php';

use Illuminate\Http\Request;
use Bett\Repositories\ForecastsRepository;
use Illuminate\Support\Facades\Storage;
use Bett\SportModel;
use Bett\ChampionshipModel;
use Bett\ForecastModel;
use Carbon\Carbon;
// use Bett\Image;
// use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
// use Bett\Http\Controllers;

class SiteController extends Controller
{
  // переменная для репазитория прогнозов forecast
  // protected $f_rep;
  //
  // protected $template;
  // protected $vars = array();

  // protected $contentRightBar = False;
  // protected $contentLeftBar = False;
  // protected $bar = false;

  // методом внедрения зависимости в конструктор передаем
  // в переменную $forecast передаем объект репозитория ForecastsRepository
  // public function __construct(ForecastsRepository $f_rep) {
  //   // в переменную f_rep записываем объект типа
  //   // репозиторя ForecastsRepository через переменную конструктора $f_rep
  //   // обратить внимание на конструктор в дочернем IndexController
  //   // и добавить в use Bett\Repository\ForecastsRepository
  //   $this->f_rep = $f_rep;
  //   // переменная f_rep будет использоваться ниже в применении метода get()
  // }



  // protected function getForecast() {
  //   // переменная этой функции $forecast и в нее попадет
  //   // выборка которую должен релизовать репозторий ForecastsRepository
  //   // и у него потом вызываем метод get() который опишем позже
  //   $forecast = $this->f_rep->get();
  //
  //   return $forecast;
  // }



  

  // неработающая функция
  // public function resizeImg($src, $width, $heght){
  //   // $manager = new ImageManager(array('driver' => 'imagick'));
  //   $manager = new ImageManager(array('driver' => 'gd'));
  //   $image = $manager->make('/flag/'.$src)->resize($width, $heght);
  //   dd($image);
  // }
}
