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
                          'country_id'=>'30',
                          'logo'=>'Great Britain/417867.png'
                        ]);
      CommandModel::create([
                          'name'=>'Бюргер',
                          'description'=>'Немецкая команда',
                          'sports_id'=>'1',
                          'country_id'=>'4',
                          'logo'=>'Albania/11010795.png'
                        ]);
      CommandModel::create([
                          'name'=>'Мушкетёры',
                          'description'=>'Француская команда',
                          'sports_id'=>'1',
                          'country_id'=>'3',
                          'logo'=>'Azerbaijan/145749.png'
                        ]);
      CommandModel::create([
                          'name'=>'ЦСК',
                          'description'=>'Русская команда',
                          'sports_id'=>'1',
                          'country_id'=>'1',
                          'logo'=>'Russia/479229.png'
                        ]);
      CommandModel::create([
                          'name'=>'Спартак',
                          'description'=>'Русская команда',
                          'sports_id'=>'1',
                          'country_id'=>'1',
                          'logo'=>'Russia/477596.png'
                        ]);
      CommandModel::create([
                          'name'=>'Янки',
                          'description'=>'Американская команда',
                          'sports_id'=>'1',
                          'country_id'=>'7',
                          'logo'=>'USA/108955.png'
                        ]);
      CommandModel::create([
                          'name'=>'Ювентус',
                          'description'=>'Литовская команда',
                          'sports_id'=>'3',
                          'country_id'=>'5',
                          'logo'=>'Latvia/1106859.png'
                        ]);
      CommandModel::create([
                          'name'=>'Ейск',
                          'description'=>'Российская команда',
                          'sports_id'=>'3',
                          'country_id'=>'1',
                          'logo'=>'Argentina/102483.png'
                        ]);
      CommandModel::create([
                          'name'=>'Москва',
                          'description'=>'Российская команда',
                          'sports_id'=>'3',
                          'country_id'=>'1',
                          'logo'=>'Russia/130525.png'
                        ]);
      CommandModel::create([
                          'name'=>'Нью-Йорк',
                          'description'=>'Английская команда',
                          'sports_id'=>'3',
                          'country_id'=>'7',
                          'logo'=>'Serbia/1301383.png'
                        ]);
      CommandModel::create([
                          'name'=>'Лондон',
                          'description'=>'Английская команда',
                          'sports_id'=>'2',
                          'country_id'=>'2',
                          'logo'=>'Afghanistan/5626485.png'
                        ]);
      CommandModel::create([
                          'name'=>'Ростов',
                          'description'=>'Российская команда',
                          'sports_id'=>'2',
                          'country_id'=>'1',
                          'logo'=>'Afghanistan/1013540.png'
                        ]);
      CommandModel::create([
                          'name'=>'Париж',
                          'description'=>'Француская команда',
                          'sports_id'=>'2',
                          'country_id'=>'3',
                          'logo'=>'France/100796.png'
                        ]);
      CommandModel::create([
                          'name'=>'Эль',
                          'description'=>'Канадская команда',
                          'sports_id'=>'1',
                          'country_id'=>'70',
                          'logo'=>'Canada/145763.png'
                        ]);
      CommandModel::create([
                          'name'=>'Берлин',
                          'description'=>'Немецкая команда',
                          'sports_id'=>'2',
                          'country_id'=>'4',
                          'logo'=>'Germany/121173.png'
                        ]);
      CommandModel::create([
                          'name'=>'Курникова',
                          'description'=>'Русская Тенисная чика',
                          'sports_id'=>'4',
                          'country_id'=>'1',
                          'logo'=>'Russia/130545.png'
                        ]);
      CommandModel::create([
                          'name'=>'Вильямс',
                          'description'=>'Английская герл',
                          'sports_id'=>'4',
                          'country_id'=>'30',
                          'logo'=>'Denmark/27018925.png'
                        ]);
      CommandModel::create([
                          'name'=>'Макрон',
                          'description'=>'Франц герл',
                          'sports_id'=>'4',
                          'country_id'=>'174',
                          'logo'=>'France/50041763.png'
                        ]);
    }
}
