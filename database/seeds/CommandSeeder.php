<?php

use Illuminate\Database\Seeder;
use Bett\CommandModel;

class CommandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      CommandModel::create([
                          'name'=>'Ливерпуль',
                          'description'=>'Английская команда',
                          'sports_id'=>'1',
                          'country_id'=>'2'
                        ]);
      CommandModel::create([
                          'name'=>'Бюргер',
                          'description'=>'Немецкая команда',
                          'sports_id'=>'1',
                          'country_id'=>'4'
                        ]);
      CommandModel::create([
                          'name'=>'Мушкетёры',
                          'description'=>'Француская команда',
                          'sports_id'=>'1',
                          'country_id'=>'3'
                        ]);
      CommandModel::create([
                          'name'=>'ЦСК',
                          'description'=>'Русская команда',
                          'sports_id'=>'1',
                          'country_id'=>'1'
                        ]);
      CommandModel::create([
                          'name'=>'Спартак',
                          'description'=>'Русская команда',
                          'sports_id'=>'1',
                          'country_id'=>'1'
                        ]);
      CommandModel::create([
                          'name'=>'Янки',
                          'description'=>'Американская команда',
                          'sports_id'=>'1',
                          'country_id'=>'7'
                        ]);
      CommandModel::create([
                          'name'=>'Ювентус',
                          'description'=>'Литовская команда',
                          'sports_id'=>'3',
                          'country_id'=>'5'
                        ]);
      CommandModel::create([
                          'name'=>'Ейск',
                          'description'=>'Российская команда',
                          'sports_id'=>'3',
                          'country_id'=>'1'
                        ]);
      CommandModel::create([
                          'name'=>'Москва',
                          'description'=>'Российская команда',
                          'sports_id'=>'3',
                          'country_id'=>'1'
                        ]);
      CommandModel::create([
                          'name'=>'Нью-Йорк',
                          'description'=>'Английская команда',
                          'sports_id'=>'3',
                          'country_id'=>'7'
                        ]);
      CommandModel::create([
                          'name'=>'Лондон',
                          'description'=>'Английская команда',
                          'sports_id'=>'2',
                          'country_id'=>'2'
                        ]);
      CommandModel::create([
                          'name'=>'Ростов',
                          'description'=>'Российская команда',
                          'sports_id'=>'2',
                          'country_id'=>'1'
                        ]);
      CommandModel::create([
                          'name'=>'Париж',
                          'description'=>'Француская команда',
                          'sports_id'=>'2',
                          'country_id'=>'3'
                        ]);
      CommandModel::create([
                          'name'=>'Берлин',
                          'description'=>'Немецкая команда',
                          'sports_id'=>'2',
                          'country_id'=>'4'
                        ]);
    }
}
