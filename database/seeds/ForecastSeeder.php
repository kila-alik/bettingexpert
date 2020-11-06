<?php

use Illuminate\Database\Seeder;
use Bett\ForecastModel;

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
                          'country_id'=>'2',
                          'champ_id'=>'1',
                          'coeff'=>'1.5',
                          'status'=>'0',
                          'result'=>''
                        ]);
      ForecastModel::create([
                          'command_1'=>'3',
                          'command_2'=>'4',
                          'country_id'=>'1',
                          'champ_id'=>'1',
                          'coeff'=>'1.4',
                          'status'=>'0',
                          'result'=>''
                        ]);
      ForecastModel::create([
                          'command_1'=>'1',
                          'command_2'=>'5',
                          'country_id'=>'3',
                          'champ_id'=>'1',
                          'coeff'=>'1.6',
                          'status'=>'1',
                          'result'=>''
                        ]);
      ForecastModel::create([
                          'command_1'=>'2',
                          'command_2'=>'6',
                          'country_id'=>'7',
                          'champ_id'=>'3',
                          'coeff'=>'1.2',
                          'status'=>'1',
                          'result'=>''
                        ]);
      ForecastModel::create([
                          'command_1'=>'5',
                          'command_2'=>'6',
                          'country_id'=>'7',
                          'champ_id'=>'3',
                          'coeff'=>'1.1',
                          'status'=>'0',
                          'result'=>''
                        ]);
      ForecastModel::create([
                          'command_1'=>'11',
                          'command_2'=>'12',
                          'country_id'=>'7',
                          'champ_id'=>'5',
                          'coeff'=>'1.1',
                          'status'=>'0',
                          'result'=>''
                        ]);
      ForecastModel::create([
                          'command_1'=>'13',
                          'command_2'=>'14',
                          'country_id'=>'1',
                          'champ_id'=>'2',
                          'coeff'=>'1.3',
                          'status'=>'0',
                          'result'=>''
                        ]);
      ForecastModel::create([
                          'command_1'=>'11',
                          'command_2'=>'14',
                          'country_id'=>'1',
                          'champ_id'=>'2',
                          'coeff'=>'1.4',
                          'status'=>'1',
                          'result'=>''
                        ]);
    }
}
