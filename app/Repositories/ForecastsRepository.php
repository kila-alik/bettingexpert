<?

namespace Bett\Repositories;

use Bett\Forecast;

class ForecastRepository extends Repository {

// через внедрение зависимости
// берем объект модели Forecast
// и передаем ее в переменную $forecast
  public function __construct(Forecast $forecast) {
    // переменная model объявлена в родительском классе Repository
    $this->model = $forecast;
  }

}


 ?>
