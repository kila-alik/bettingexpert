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
                          'name'=>'Футбол',
                          'alias'=>'soccer'
                        ]);
      SportModel::create([
                          'name'=>'Хоккей',
                          'alias'=>'hockey'
                        ]);
      SportModel::create([
                          'name'=>'Баскетбол',
                          'alias'=>'basket'
                        ]);
      SportModel::create([
                          'name'=>'Теннис',
                          'alias'=>'tennis'
                        ]);
      // SportModel::create([
      //                     'name'=>'Волейбол',
      //                     'alias'=>'volley'
      //                   ]);
    }
}
