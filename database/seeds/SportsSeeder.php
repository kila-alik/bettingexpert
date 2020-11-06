<?php

use Illuminate\Database\Seeder;
use Bett\SportModel;

class SportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      SportModel::create([
                          'name'=>'Футбол'
                        ]);
      SportModel::create([
                          'name'=>'Хоккей'
                        ]);
      SportModel::create([
                          'name'=>'Баскетбол'
                        ]);
      SportModel::create([
                          'name'=>'Волейбол'
                        ]);
      SportModel::create([
                          'name'=>'Теннис'
                        ]);

      // SportModel::create([
      //                     'name'=>'Январь',
      //                     'autor'=>'Сидоров',
      //                     'text'=>'Январь 2020 года выдался бесснежным!'
      //                   ]);
    }
}
