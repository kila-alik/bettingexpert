<?php

namespace Bett\Components;

use Intervention\Image\ImageManagerStatic;

class MyHalper {

    static public function flag_logoResize($flag_logo, $file, $w, $h) {
      $relDir = public_path(env('THEME') . DIRECTORY_SEPARATOR . 'resize' . DIRECTORY_SEPARATOR . $w . '_' . $h . DIRECTORY_SEPARATOR);
      if (!file_exists($relDir)) {
        mkdir($relDir, 0777, true);
      }
      // dd($relDir);
      // dd($file);

      if (!file_exists($path = $relDir . $file)){
        $pathOrig = public_path(env('THEME') . DIRECTORY_SEPARATOR . $flag_logo . DIRECTORY_SEPARATOR . $file);
        $imag = ImageManagerStatic::make($pathOrig);

          // приводим все флаги к ширине 100 и высоте 72 пикселя, т.к. у них ширина  у всех 100, а высота разная
          // этим мы проверяем это флаг или нет , т.к. улоготипа высота и ширина равны
          if($w != $h) $imag->resize(100, 72);
        // а теперь уже задаем нужные размеры и сохраняем в соответственную папку , чтоб потом выдать на страницу
        $imag->resize($w, $h, function($img) {
          $img->aspectRatio();
          $img->upsize();
        });
        $imag->save($path);
      }

      return asset(env('THEME') . '/resize/' . $w . '_' . $h . '/' . $file);
    }


    // static public function logoResize($file, $w, $h) {
    //   // dd(pathinfo($file, PATHINFO_DIRNAME));
    //   // dd(pathinfo($file, PATHINFO_BASENAME));
    //   $relDir = public_path(env('THEME') . DIRECTORY_SEPARATOR . 'resize' . DIRECTORY_SEPARATOR . $w . '_' . $h . DIRECTORY_SEPARATOR);
    //   if (!file_exists($relDir)) {
    //     mkdir($relDir, 0777, true);
    //   }
    //
    //   if (!file_exists($path = $relDir . $file)){
    //     $pathOrig = public_path(env('THEME') . DIRECTORY_SEPARATOR . 'logos' . DIRECTORY_SEPARATOR . $file);
    //     $imag = ImageManagerStatic::make($pathOrig);
    //
    //     // а теперь уже задаем нужные размеры и сохраняем в соответственную папку , чтоб потом выдать на страницу
    //     $imag->resize($w, $h, function($img) {
    //       $img->aspectRatio();
    //       $img->upsize();
    //     });
    //     $imag->save($path);
    //   }
    //
    //   return asset(env('THEME') . '/resize/' . $w . '_' . $h . '/' . $file);
    // }

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
