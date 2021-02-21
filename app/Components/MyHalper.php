<?php

namespace Bett\Components;

use Intervention\Image\ImageManagerStatic;

class MyHalper {

    static public function flagResize($file, $w, $h) {
      $relDir = public_path(env('THEME') . DIRECTORY_SEPARATOR . 'resize' . DIRECTORY_SEPARATOR . $w . '_' . $h . DIRECTORY_SEPARATOR);
      if (!file_exists($relDir)) {
        mkdir($relDir, 0777, true);
      }
      // dd($relDir);
      // dd($file);

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

      return asset(env('THEME') . '/resize/' . $w . '_' . $h . '/' . $file);
    }


    static public function logoResize($file, $w, $h) {
      $relDir = public_path(env('THEME') . DIRECTORY_SEPARATOR . 'resize' . DIRECTORY_SEPARATOR . pathinfo($file, PATHINFO_DIRNAME) . DIRECTORY_SEPARATOR . $w . '_' . $h . DIRECTORY_SEPARATOR);
      if (!file_exists($relDir)) {
        mkdir($relDir, 0777, true);
      }

      if (!file_exists($path = $relDir . pathinfo($file, PATHINFO_BASENAME))){
        $pathOrig = public_path(env('THEME') . DIRECTORY_SEPARATOR . 'logos' . DIRECTORY_SEPARATOR . $file);
        $imag = ImageManagerStatic::make($pathOrig);

        // а теперь уже задаем нужные размеры и сохраняем в соответственную папку , чтоб потом выдать на страницу
        $imag->resize($w, $h, function($img) {
          $img->aspectRatio();
          $img->upsize();
        });
        $imag->save($path);
      }

      return asset(env('THEME') . '/resize/' . pathinfo($file, PATHINFO_DIRNAME) . '/' . $w . '_' . $h . '/' . pathinfo($file, PATHINFO_BASENAME));
    }

    static public function resultGame($result) {
      $clear = str_replace(" ", "", $result);
      $array = explode(":", $clear);
      return $array[0]<=>$array[1];
    }

    static public function tablo($result) {
      $clear = str_replace(" ", "", $result);
      $array = explode(":", $clear);
      $newResult = implode(" : ",$array);
      // dd($newResult);
      return $newResult;
    }

}
