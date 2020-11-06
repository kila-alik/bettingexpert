<?

namespace Bett\Repositories;

use Bett\ForecastModel;

class ForecastsRepository extends Repository {

// через внедрение зависимости
// берем объект модели Forecast
// и передаем ее в переменную $forecast
  public function __construct(ForecastModel $forecast) {
    // переменная model объявлена в родительском классе Repository
    $this->model = $forecast;
  }

}
