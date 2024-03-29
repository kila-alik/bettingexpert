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
                          'country_id'=>'43'
                        ]);
      ChampionshipModel::create([
                          'name'=>'Российский',
                          'sports_id'=>'1',
                          'country_id'=>'131'
                        ]);
      ChampionshipModel::create([
                          'name'=>'Американский',
                          'sports_id'=>'1',
                          'country_id'=>'150'
                        ]);
      ChampionshipModel::create([
                          'name'=>'Континентальный',
                          'sports_id'=>'2',
                          'country_id'=>'194'
                        ]);
      ChampionshipModel::create([
                          'name'=>'КХЛ',
                          'sports_id'=>'2',
                          'country_id'=>'173'
                        ]);
      ChampionshipModel::create([
                          'name'=>'Канадский',
                          'sports_id'=>'1',
                          'country_id'=>'70'
                        ]);
      ChampionshipModel::create([
                          'name'=>'Южно-Американский',
                          'sports_id'=>'2',
                          'country_id'=>'180'
                        ]);
      ChampionshipModel::create([
                          'name'=>'НБА',
                          'sports_id'=>'3',
                          'country_id'=>'188'
                        ]);
      ChampionshipModel::create([
                          'name'=>'Северный',
                          'sports_id'=>'3',
                          'country_id'=>'117'
                        ]);
      ChampionshipModel::create([
                          'name'=>'Евро-Теннисный',
                          'sports_id'=>'4',
                          'country_id'=>'30'
                        ]);
      ChampionshipModel::create([
                          'name'=>'Америка-Теннисный',
                          'sports_id'=>'4',
                          'country_id'=>'150'
                        ]);
    }
}
