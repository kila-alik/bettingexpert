<?php

use Illuminate\Database\Seeder;
use Bett\CountryModel;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function flag() {
       include 'country_flag\indexFlag.php';
    }

    public function run()
    {
      // список флагов взят с википедии
      // https://ru.wikipedia.org/wiki/%D0%A1%D0%BF%D0%B8%D1%81%D0%BE%D0%BA_%D0%B3%D0%BE%D1%81%D1%83%D0%B4%D0%B0%D1%80%D1%81%D1%82%D0%B2
      // взят файл убран вершок и низок потом прогнали скриптом indexFlag.php
      // получен файл с названиями стран flags_name.txt и картинки самих файлов {{ asset(env('THEME')) }}/flag/{{$country->file}}
      // функция flag() нужно включать ТОЛЬКО ОДИН РАЗ ПРИ ПЕРВОМ , ИЛИ РЕДКОМ ДОБАВЛЕНИИ СТРАНЫ
      // это обращение не довел до конца т.к. консоли не видно почему затыкается скрипт
      // $this->flag();

      // это количество флагов стран в папке flag
      // $counterIndex = dirname(__FILE__).'\country_flag\counterFlag.txt';
      // $counterFlag = file_get_contents($counterIndex);

      // это список флагов стран в папке flag в той последовательности в какой присвоины имена флагам
      $listFlag = dirname(__FILE__). DIRECTORY_SEPARATOR . 'country_flag' . DIRECTORY_SEPARATOR . 'flags_name.txt';
      $Flag_list = file_get_contents($listFlag);

      $arResult = explode("\n", $Flag_list);
      $end_key = array_key_last($arResult);

      foreach ($arResult as $key => $country) {
        if ($key == $end_key) continue;
        $key1 = $key + 1;
        CountryModel::create([
                              'name'=>$country,
                              'file'=>$key1.'.png'
                            ]);
      }
        CountryModel::create([
                              'name'=>'По умолчанию',
                              'file'=>'flag_default.png'
                            ]);

    }
}
