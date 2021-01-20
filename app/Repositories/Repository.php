<?
namespace Bett\Repositories;
// namespace Bett\Http\Controllers;
use Config;
use Bett\ForecastModel;
// use Bett\Http\Controllers;

abstract class Repository {

  // в $model переменной будет храниться
  // объект модели использующейся для получения определенных данных
  protected $model = FALSE;

  // опишем метод get() который будет общим для разных дочерних репозиториев
  public function get() {
    // переменная $builder это запрос к базе данных
    // в контексте той модели, которая находится сейчас
    // в переменной $model, которая переопределяется
    // в дочернем репозитории.
    // Модели и базы данных могут быть разными, метод один
    $builder = $this->model->select('*');
    // метод селект выбирает все записи из БД,
    // той БД через модель котрой мы делаем запрос

    // у этой выборки (билдера) вызываем метод get()

    // var_dump($builder->get());
    // exit;
    // dd($builder->get());
    // exit;
    return $builder->get();
  }
}
