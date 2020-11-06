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
    public function run()
    {
      CountryModel::create([
                            'name'=>'Россия'
                          ]);
      CountryModel::create([
                          'name'=>'Англия'
                        ]);
      CountryModel::create([
                          'name'=>'Франция'
                        ]);
      CountryModel::create([
                          'name'=>'Германия'
                        ]);
      CountryModel::create([
                          'name'=>'Литва'
                        ]);
      CountryModel::create([
                          'name'=>'Чили'
                        ]);
      CountryModel::create([
                          'name'=>'США'
                        ]);
    }
}
