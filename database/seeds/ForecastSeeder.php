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
      $text1 = 'Малазийский миллиардер Винсент Тан поставил перед «Кардифф Сити» четкую задачу –
                вернуться в Премьер-лигу. Несмотря на покупку бельгийского «Кортрейка» и боснийского «Сараево»,
                 Тан считает валлийский клуб главным бриллиантом спортивной коллекции. Пока сказать что-то
                 определенное о шансах «Кардифф Сити» нельзя – до конца Чемпионшипа нужно провести еще 11 туров,
                 и за этот отрезок может случиться всякое. Но в желании «лазурным птицам» не откажешь: в настоящее
                 время они занимают 7-е место и по итогам тура могут войти в зону переходного плей-офф.<br />
                 Амбиции у «Кардифф Сити» есть. Присутствует, что немаловажно, и
                 поставленная игра. За последние 10 туров валлийцы потерпели всего одно поражение – на выезде «Миддлсбро»,
                 одному из главных фаворитов гонки за повышение в классе. В последних турах «Кардифф Сити» уверенно по игре
                 расправился с «Бристоль Сити» и «Престон Норт Энд» – с точки зрения турнирной таблицы не самые сильные
                 соперники, но оба сейчас на ходу.<br />
                 Главный тренер «Кардифф Сити» Рассел Слейд старается комбинировать – в меру
                 рациональный футбол на выезде сменяется более активными действиями дома. Для соперников сказываются тяготы
                 географической отдаленности, все-таки нужно ехать в Уэльс, играть в другой стране. На своем стадионе
                 «Кардифф Сити» потерпел всего одно поражение, это самый низкий процент брака среди всех команд Чемпионшипа.
                 Последний раз в Уэльсе подопечные Слейда проигрывали 15 сентября 2015 года «Халл Сити» (ныне команда Стива
                 Брюса идет на третьем месте и борется за прямой выход в Премьер-лигу).';

       $text2 = '«Лидс» переживает не лучшие времена. Постоянная чехарда в руководящих звеньях собственников негативно
                 сказывается на мотивации игроков. В прошлом сезоне «белые» заняли итоговое 15-е место, и сейчас мало что
                 изменилось. Текущая 16-я позиция малоперспективна и не сулит ничего, кроме борьбы за выживание. В гостях
                 «Лидс» играет с переменным успехом, а последний выезд завершился сокрушительным разгромом 0:4 от «Брайтона»
                 (причем все 4 гола были забиты к 38-й минуте матча).';

      ForecastModel::create([
                          'command_1'=>'1',
                          'command_2'=>'2',
                          'country_id'=>'43',
                          'champ_id'=>'1',
                          'coeff'=>'1.5',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'0',
                          'result'=>'0 : 2',
                          'date_game'=>'2021-02-25' . ' ' . '12:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'2',
                          'command_2'=>'3',
                          'country_id'=>'30',
                          'champ_id'=>'1',
                          'coeff'=>'1.43',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'1',
                          'result'=>'1 : 1',
                          'date_game'=>'2021-02-26' . ' ' . '09:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'3',
                          'command_2'=>'5',
                          'country_id'=>'30',
                          'champ_id'=>'1',
                          'coeff'=>'1.13',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'0',
                          'result'=>'3 : 1',
                          'date_game'=>'2021-02-26' . ' ' . '10:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'1',
                          'command_2'=>'5',
                          'country_id'=>'43',
                          'champ_id'=>'1',
                          'coeff'=>'1.64',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'0',
                          'result'=>'0 : 4',
                          'date_game'=>'2021-02-24' . ' ' . '15:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'10',
                          'command_2'=>'12',
                          'country_id'=>'150',
                          'champ_id'=>'7',
                          'coeff'=>'1.02',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'0',
                          'result'=>'2 : 2',
                          'date_game'=>'2021-02-24' . ' ' . '09:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'2',
                          'command_2'=>'6',
                          'country_id'=>'182',
                          'champ_id'=>'3',
                          'coeff'=>'1.2',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'2',
                          'result'=>'3 : 0',
                          'date_game'=>'2021-02-25' . ' ' . '12:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'5',
                          'command_2'=>'6',
                          'country_id'=>'150',
                          'champ_id'=>'3',
                          'coeff'=>'1.12',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'1',
                          'result'=>'3 : 3',
                          'date_game'=>'2021-02-26' . ' ' . '14:00'
                        ]);
      ForecastModel::create([
                          'command_1'=>'2',
                          'command_2'=>'4',
                          'country_id'=>'182',
                          'champ_id'=>'3',
                          'coeff'=>'1.12',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'0',
                          'result'=>'0 : 0',
                          'date_game'=>'2021-02-26' . ' ' . '16:00'
                        ]);
      ForecastModel::create([
                          'command_1'=>'11',
                          'command_2'=>'12',
                          'country_id'=>'131',
                          'champ_id'=>'5',
                          'coeff'=>'1.17',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'1',
                          'result'=>'1 : 1',
                          'date_game'=>'2021-02-24' . ' ' . '15:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'13',
                          'command_2'=>'14',
                          'country_id'=>'131',
                          'champ_id'=>'5',
                          'coeff'=>'1.3',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'0',
                          'result'=>'4 : 3',
                          'date_game'=>'2021-02-25' . ' ' . '12:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'2',
                          'command_2'=>'18',
                          'country_id'=>'70',
                          'champ_id'=>'11',
                          'coeff'=>'1.6',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'1',
                          'result'=>'2 : 4',
                          'date_game'=>'2021-02-25' . ' ' . '17:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'11',
                          'command_2'=>'14',
                          'country_id'=>'150',
                          'champ_id'=>'2',
                          'coeff'=>'1.4',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'2',
                          'result'=>'3 : 1',
                          'date_game'=>'2021-02-26' . ' ' . '14:00'
                        ]);
      ForecastModel::create([
                          'command_1'=>'3',
                          'command_2'=>'2',
                          'country_id'=>'30',
                          'champ_id'=>'1',
                          'coeff'=>'1.1',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'1',
                          'result'=>'0 : 3',
                          'date_game'=>'2021-02-24' . ' ' . '15:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'2',
                          'command_2'=>'5',
                          'country_id'=>'43',
                          'champ_id'=>'1',
                          'coeff'=>'1.73',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'1',
                          'result'=>'2 : 1',
                          'date_game'=>'2021-02-25' . ' ' . '12:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'1',
                          'command_2'=>'5',
                          'country_id'=>'43',
                          'champ_id'=>'1',
                          'coeff'=>'1.61',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'1',
                          'result'=>'1 : 2',
                          'date_game'=>'2021-02-26' . ' ' . '14:00'
                        ]);
      ForecastModel::create([
                          'command_1'=>'3',
                          'command_2'=>'6',
                          'country_id'=>'180',
                          'champ_id'=>'3',
                          'coeff'=>'1.2',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'2',
                          'result'=>'4 : 3',
                          'date_game'=>'2021-02-24' . ' ' . '15:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'7',
                          'command_2'=>'8',
                          'country_id'=>'64',
                          'champ_id'=>'3',
                          'coeff'=>'1.12',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'0',
                          'result'=>'3 : 3',
                          'date_game'=>'2021-02-25' . ' ' . '12:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'10',
                          'command_2'=>'9',
                          'country_id'=>'119',
                          'champ_id'=>'5',
                          'coeff'=>'1.15',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'2',
                          'result'=>'1 : 1',
                          'date_game'=>'2021-02-26' . ' ' . '19:00'
                        ]);
      ForecastModel::create([
                          'command_1'=>'3',
                          'command_2'=>'14',
                          'country_id'=>'46',
                          'champ_id'=>'2',
                          'coeff'=>'1.3',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'0',
                          'result'=>'5 : 2',
                          'date_game'=>'2021-02-24' . ' ' . '15:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'4',
                          'command_2'=>'14',
                          'country_id'=>'182',
                          'champ_id'=>'2',
                          'coeff'=>'1.4',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'2',
                          'result'=>'3 : 3',
                          'date_game'=>'2021-02-25' . ' ' . '14:00'
                        ]);
      ForecastModel::create([
                          'command_1'=>'3',
                          'command_2'=>'6',
                          'country_id'=>'62',
                          'champ_id'=>'4',
                          'coeff'=>'1.17',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'0',
                          'result'=>'5 : 1',
                          'date_game'=>'2021-02-26' . ' ' . '12:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'1',
                          'command_2'=>'2',
                          'country_id'=>'194',
                          'champ_id'=>'4',
                          'coeff'=>'1.1',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'1',
                          'result'=>'2 : 3',
                          'date_game'=>'2021-02-26' . ' ' . '12:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'2',
                          'command_2'=>'7',
                          'country_id'=>'46',
                          'champ_id'=>'1',
                          'coeff'=>'1.3',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'2',
                          'result'=>'3 : 0',
                          'date_game'=>'2021-02-24' . ' ' . '09:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'1',
                          'command_2'=>'6',
                          'country_id'=>'55',
                          'champ_id'=>'1',
                          'coeff'=>'1.68',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'0',
                          'result'=>'3 : 4',
                          'date_game'=>'2021-02-25' . ' ' . '15:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'2',
                          'command_2'=>'8',
                          'country_id'=>'62',
                          'champ_id'=>'3',
                          'coeff'=>'1.4',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'1',
                          'result'=>'1 : 2',
                          'date_game'=>'2021-c' . ' ' . '14:00'
                        ]);
      ForecastModel::create([
                          'command_1'=>'7',
                          'command_2'=>'10',
                          'country_id'=>'117',
                          'champ_id'=>'8',
                          'coeff'=>'1.5',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'2',
                          'result'=>'2 : 2',
                          'date_game'=>'2021-02-24' . ' ' . '10:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'8',
                          'command_2'=>'11',
                          'country_id'=>'30',
                          'champ_id'=>'9',
                          'coeff'=>'1.7',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'0',
                          'result'=>'4 : 6',
                          'date_game'=>'2021-02-24' . ' ' . '13:00'
                        ]);
      ForecastModel::create([
                          'command_1'=>'8',
                          'command_2'=>'9',
                          'country_id'=>'188',
                          'champ_id'=>'7',
                          'coeff'=>'1.7',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'1',
                          'result'=>'3 : 2',
                          'date_game'=>'2021-02-25' . ' ' . '14:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'15',
                          'command_2'=>'16',
                          'country_id'=>'30',
                          'champ_id'=>'9',
                          'coeff'=>'1.16',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'1',
                          'result'=>'5 : 1',
                          'date_game'=>'2021-02-26' . ' ' . '10:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'17',
                          'command_2'=>'16',
                          'country_id'=>'150',
                          'champ_id'=>'9',
                          'coeff'=>'1.16',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'0',
                          'result'=>'1 : 5',
                          'date_game'=>'2021-02-26' . ' ' . '10:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'15',
                          'command_2'=>'17',
                          'country_id'=>'150',
                          'champ_id'=>'10',
                          'coeff'=>'1.36',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'2',
                          'result'=>'3 : 0',
                          'date_game'=>'2021-02-24' . ' ' . '11:30'
                        ]);
      ForecastModel::create([
                          'command_1'=>'4',
                          'command_2'=>'5',
                          'country_id'=>'131',
                          'champ_id'=>'2',
                          'coeff'=>'1.1',
                          'lwin'=>'1.91',
                          'draw'=>'3.5',
                          'rwin'=>'4.75',
                          'lwdraw'=>'1.22',
                          'rwdraw'=>'2.05',
                          'text_before'=>$text1,
                          'text_after'=>$text2,
                          'foto'=>'kardiff-siti-lids_foto16.jpg',
                          'status'=>'0',
                          'result'=>'0 : 2',
                          'date_game'=>'2021-02-25' . ' ' . '10:00'
                        ]);
    }
}
