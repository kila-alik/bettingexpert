<?php

namespace Bett\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function mass_list($models) {
        $mass = [];
        foreach ($models as $model) {
          $mass[$model->id] = $model->name;
        }
        return $mass;
    }
}
