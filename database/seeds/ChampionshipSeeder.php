<?php

use Illuminate\Database\Seeder;
use Bett\ChampionshipModel;

class ChampionshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      ChampionshipModel::create([
                          'name'=>'Европейский',
                          'sports_id'=>'1',
                          'country_id'=>'4'
                        ]);
      ChampionshipModel::create([
                          'name'=>'Российский',
                          'sports_id'=>'1',
                          'country_id'=>'1'
                        ]);
      ChampionshipModel::create([
                          'name'=>'Американский',
                          'sports_id'=>'1',
                          'country_id'=>'7'
                        ]);
      ChampionshipModel::create([
                          'name'=>'Континентальный',
                          'sports_id'=>'2',
                          'country_id'=>'3'
                        ]);
      ChampionshipModel::create([
                          'name'=>'КХЛ',
                          'sports_id'=>'2',
                          'country_id'=>'7'
                        ]);
      ChampionshipModel::create([
                          'name'=>'Южно-Американский',
                          'sports_id'=>'2',
                          'country_id'=>'6'
                        ]);
      ChampionshipModel::create([
                          'name'=>'НБА',
                          'sports_id'=>'3',
                          'country_id'=>'5'
                        ]);
      ChampionshipModel::create([
                          'name'=>'Северный',
                          'sports_id'=>'3',
                          'country_id'=>'2'
                        ]);
    }
}
