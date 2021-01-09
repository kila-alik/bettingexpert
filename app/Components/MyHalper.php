<?php

namespace Bett\Components;

use Intervention\Image\ImageManagerStatic;

class MyHalper{


    static public function flagResize($file, $w, $h) {
      $relDir = public_path(env('THEME') . DIRECTORY_SEPARATOR . 'flag' . DIRECTORY_SEPARATOR . $w . '_' . $h . DIRECTORY_SEPARATOR);
      if (!file_exists($relDir)) {
        mkdir($relDir, 0777, true);
      }

      if (!file_exists($path = $relDir . $file)){
        $pathOrig = public_path(env('THEME') . DIRECTORY_SEPARATOR . 'flag' . DIRECTORY_SEPARATOR . $file);
        $imag = ImageManagerStatic::make($pathOrig);
        // приводим все флаги к ширине 100 и высоте 72 пикселя, т.к. у них ширина  у всех 100, а высота разная
        $imag->resize(100, 72);
        // а теперь уже задаем нужные размеры и сохраняем в соответственную папку , чтоб потом выдать на страницу
        $imag->resize($w, $h, function($img) {
          $img->aspectRatio();
          $img->upsize();
        });
        $imag->save($path);
      }

      return asset(env('THEME') . '/flag/' . $w . '_' . $h . '/' . $file);
    }


}
