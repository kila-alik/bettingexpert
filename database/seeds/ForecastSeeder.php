<?php

use Illuminate\Database\Seeder;
use Bett\ForecastModel;
use Carbon\Carbon;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      ForecastModel::create([
                          'command_1'=>'1',
                          'command_2'=>'2',
                          'country_id'=>'43',
                          'champ_id'=>'1',
                          'coeff'=>'1.5',
                          'status'=>'0',
                          'result'=>'',
                          'date_game'=>'2021-02-01' . ' ' . '12:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'2',
                          'command_2'=>'3',
                          'country_id'=>'30',
                          'champ_id'=>'1',
                          'coeff'=>'1.43',
                          'status'=>'1',
                          'result'=>'',
                          'date_game'=>'2021-01-30' . ' ' . '09:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'3',
                          'command_2'=>'5',
                          'country_id'=>'30',
                          'champ_id'=>'1',
                          'coeff'=>'1.13',
                          'status'=>'0',
                          'result'=>'',
                          'date_game'=>'2021-01-30' . ' ' . '10:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'1',
                          'command_2'=>'5',
                          'country_id'=>'43',
                          'champ_id'=>'1',
                          'coeff'=>'1.64',
                          'status'=>'0',
                          'result'=>'',
                          'date_game'=>'2021-01-31' . ' ' . '15:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'10',
                          'command_2'=>'12',
                          'country_id'=>'150',
                          'champ_id'=>'7',
                          'coeff'=>'1.02',
                          'status'=>'0',
                          'result'=>'',
                          'date_game'=>'2021-01-31' . ' ' . '09:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'2',
                          'command_2'=>'6',
                          'country_id'=>'182',
                          'champ_id'=>'3',
                          'coeff'=>'1.2',
                          'status'=>'2',
                          'result'=>'',
                          'date_game'=>'2021-02-01' . ' ' . '12:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'5',
                          'command_2'=>'6',
                          'country_id'=>'150',
                          'champ_id'=>'3',
                          'coeff'=>'1.12',
                          'status'=>'0',
                          'result'=>'',
                          'date_game'=>'2021-01-30' . ' ' . '14:00'
                        ]);
      ForecastModel::create([
                          'command_1'=>'2',
                          'command_2'=>'4',
                          'country_id'=>'182',
                          'champ_id'=>'3',
                          'coeff'=>'1.12',
                          'status'=>'0',
                          'result'=>'',
                          'date_game'=>'2021-01-30' . ' ' . '16:00'
                        ]);
      ForecastModel::create([
                          'command_1'=>'11',
                          'command_2'=>'12',
                          'country_id'=>'131',
                          'champ_id'=>'5',
                          'coeff'=>'1.17',
                          'status'=>'1',
                          'result'=>'',
                          'date_game'=>'2021-01-31' . ' ' . '15:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'13',
                          'command_2'=>'14',
                          'country_id'=>'131',
                          'champ_id'=>'5',
                          'coeff'=>'1.3',
                          'status'=>'0',
                          'result'=>'',
                          'date_game'=>'2021-02-01' . ' ' . '12:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'2',
                          'command_2'=>'18',
                          'country_id'=>'70',
                          'champ_id'=>'11',
                          'coeff'=>'1.6',
                          'status'=>'1',
                          'result'=>'',
                          'date_game'=>'2021-02-01' . ' ' . '17:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'11',
                          'command_2'=>'14',
                          'country_id'=>'150',
                          'champ_id'=>'2',
                          'coeff'=>'1.4',
                          'status'=>'2',
                          'result'=>'',
                          'date_game'=>'2021-01-30' . ' ' . '14:00'
                        ]);
      ForecastModel::create([
                          'command_1'=>'3',
                          'command_2'=>'2',
                          'country_id'=>'30',
                          'champ_id'=>'1',
                          'coeff'=>'1.1',
                          'status'=>'1',
                          'result'=>'',
                          'date_game'=>'2021-01-31' . ' ' . '15:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'2',
                          'command_2'=>'5',
                          'country_id'=>'43',
                          'champ_id'=>'1',
                          'coeff'=>'1.73',
                          'status'=>'0',
                          'result'=>'',
                          'date_game'=>'2021-02-01' . ' ' . '12:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'1',
                          'command_2'=>'5',
                          'country_id'=>'43',
                          'champ_id'=>'1',
                          'coeff'=>'1.61',
                          'status'=>'1',
                          'result'=>'',
                          'date_game'=>'2021-01-30' . ' ' . '14:00'
                        ]);
      ForecastModel::create([
                          'command_1'=>'3',
                          'command_2'=>'6',
                          'country_id'=>'180',
                          'champ_id'=>'3',
                          'coeff'=>'1.2',
                          'status'=>'2',
                          'result'=>'',
                          'date_game'=>'2021-01-31' . ' ' . '15:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'7',
                          'command_2'=>'8',
                          'country_id'=>'64',
                          'champ_id'=>'3',
                          'coeff'=>'1.12',
                          'status'=>'0',
                          'result'=>'',
                          'date_game'=>'2021-02-01' . ' ' . '12:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'10',
                          'command_2'=>'9',
                          'country_id'=>'119',
                          'champ_id'=>'5',
                          'coeff'=>'1.15',
                          'status'=>'2',
                          'result'=>'',
                          'date_game'=>'2021-01-30' . ' ' . '19:00'
                        ]);
      ForecastModel::create([
                          'command_1'=>'3',
                          'command_2'=>'14',
                          'country_id'=>'46',
                          'champ_id'=>'2',
                          'coeff'=>'1.3',
                          'status'=>'0',
                          'result'=>'',
                          'date_game'=>'2021-01-31' . ' ' . '15:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'4',
                          'command_2'=>'14',
                          'country_id'=>'182',
                          'champ_id'=>'2',
                          'coeff'=>'1.4',
                          'status'=>'2',
                          'result'=>'',
                          'date_game'=>'2021-02-01' . ' ' . '14:00'
                        ]);
      ForecastModel::create([
                          'command_1'=>'3',
                          'command_2'=>'6',
                          'country_id'=>'62',
                          'champ_id'=>'4',
                          'coeff'=>'1.17',
                          'status'=>'0',
                          'result'=>'',
                          'date_game'=>'2021-01-30' . ' ' . '12:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'1',
                          'command_2'=>'2',
                          'country_id'=>'194',
                          'champ_id'=>'4',
                          'coeff'=>'1.1',
                          'status'=>'1',
                          'result'=>'',
                          'date_game'=>'2021-01-30' . ' ' . '12:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'2',
                          'command_2'=>'7',
                          'country_id'=>'46',
                          'champ_id'=>'1',
                          'coeff'=>'1.3',
                          'status'=>'2',
                          'result'=>'',
                          'date_game'=>'2021-01-31' . ' ' . '09:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'1',
                          'command_2'=>'6',
                          'country_id'=>'55',
                          'champ_id'=>'1',
                          'coeff'=>'1.68',
                          'status'=>'0',
                          'result'=>'',
                          'date_game'=>'2021-02-01' . ' ' . '15:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'2',
                          'command_2'=>'8',
                          'country_id'=>'62',
                          'champ_id'=>'3',
                          'coeff'=>'1.4',
                          'status'=>'1',
                          'result'=>'',
                          'date_game'=>'2021-01-30' . ' ' . '14:00'
                        ]);
      ForecastModel::create([
                          'command_1'=>'7',
                          'command_2'=>'10',
                          'country_id'=>'117',
                          'champ_id'=>'8',
                          'coeff'=>'1.5',
                          'status'=>'2',
                          'result'=>'',
                          'date_game'=>'2021-01-31' . ' ' . '10:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'8',
                          'command_2'=>'11',
                          'country_id'=>'30',
                          'champ_id'=>'9',
                          'coeff'=>'1.7',
                          'status'=>'0',
                          'result'=>'',
                          'date_game'=>'2021-01-31' . ' ' . '13:00'
                        ]);
      ForecastModel::create([
                          'command_1'=>'8',
                          'command_2'=>'9',
                          'country_id'=>'188',
                          'champ_id'=>'7',
                          'coeff'=>'1.7',
                          'status'=>'0',
                          'result'=>'',
                          'date_game'=>'2021-02-01' . ' ' . '14:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'15',
                          'command_2'=>'16',
                          'country_id'=>'30',
                          'champ_id'=>'9',
                          'coeff'=>'1.16',
                          'status'=>'1',
                          'result'=>'',
                          'date_game'=>'2021-01-30' . ' ' . '10:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'17',
                          'command_2'=>'16',
                          'country_id'=>'150',
                          'champ_id'=>'9',
                          'coeff'=>'1.16',
                          'status'=>'0',
                          'result'=>'',
                          'date_game'=>'2021-01-30' . ' ' . '10:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'15',
                          'command_2'=>'17',
                          'country_id'=>'150',
                          'champ_id'=>'10',
                          'coeff'=>'1.36',
                          'status'=>'2',
                          'result'=>'',
                          'date_game'=>'2021-01-31' . ' ' . '11:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'4',
                          'command_2'=>'5',
                          'country_id'=>'131',
                          'champ_id'=>'2',
                          'coeff'=>'1.1',
                          'status'=>'0',
                          'result'=>'',
                          'date_game'=>'2021-02-01' . ' ' . '10:00'
                        ]);
    }
}
