<?php

namespace Bett\Http\Controllers;

use Bett\Forecast;
use Bett\Mail\ContactForm;
use Bett\Sort;
use Bett\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Kim\Activity\Activity;


class IndexController extends SiteController
{
    /**
     * IndexController constructor.
     */
    public function __construct()
    {
      // берем из родительского конструктора настройки Сегодня
      // и указываем имя шаблона вывода
        $this->template = 'index';
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    public function show()
    {
      // в массив vars добавляем переменную title
        $this->vars['title'] = 'Прогнозы на спорт от професионалов - SportPrognoz.pw';

        // Собираем несколько переменных путем запросов к базе данных

        $forecasts = Forecast::where('status', 0)
            ->where('date', '>', Carbon::now())
            ->orderBy('date','DESC')->get();
        $forecasts_statistics = Forecast::where('status', '!=', 0)
            ->orderBy('date', 'DESC')
            ->take(6)->get();

        $forecastsPaid = Forecast::where('status', '!=', 0)
            ->whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])
            ->orderBy('date', 'as')->take(6)->paid()->get();

        $forecastsFree = Forecast::where('status', '!=', 0)
            ->whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])
            ->orderBy('date', 'as')->take(6)->free()->get();

        $forecasts_statistics_graf = Forecast::where('status', '!=', 0)
            ->whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])
            ->orderBy('date', 'as')
            ->get();

        $forecasts_bank = $this->forecastBank($forecasts_statistics_graf);

        $forecasters = User::where('is_forecaster', 1)->get();

        $countOnlineUsers = Activity::usersByMinutes(20)->count()+Activity::guests()->count();
              // Count the number of active guests
        $countOnlineUsers += rand(132, 139);


// передаем в представление index_content сформированные переменные и render-ром представляем их в строку
        $this->vars['content'] = view('index_content')
            ->with([
                    'forecasts' => $forecasts,
                    'forecasts_statistics'=> $forecasts_statistics,
                    'forecastsPaid' => $forecastsPaid,
                    'forecastsFree' => $forecastsFree,
                    'sort'=> Sort::class,
                    'forecasts_bank_all' => $forecasts_statistics_graf,
                    'forecasts_bank' => $forecasts_bank,
                    'forecasters' => $forecasters,
                    'count_online_users' => $countOnlineUsers
                ])
            ->render();

        return $this->renderOutput();
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    public function fullStatistics()
    {
      // создаём тайтел для страницы вывода ПОЛНОЙ СТАТИСТИКИ
        $this->vars['title'] = 'Полная статистика';

      // создаем переменные путем запросов к базе данных
        $forecasts = Forecast::where('status', '!=', 0)
                    ->whereBetween('created_at', [
                            Carbon::now()->startOfYear(),
                            Carbon::now()->endOfYear(),
                        ])
                    ->orderBy('date', 'as')->get();

        $forecastsPaid = Forecast::where('status', '!=', 0)
            ->whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])

            ->orderBy('date', 'as')->paid()->get();
        $forecastsFree = Forecast::where('status', '!=', 0)
            ->whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])
            ->orderBy('date', 'as')->free()->get();

        $months = [
            1 => 'Январь‎',
            2 => 'Февраль',
            3 => 'Март‎',
            4 => 'Апрель',
            5 => 'Май‎',
            6 => 'Июнь‎',
            7 => 'Июль‎',
            8 => 'Август‎',
            9 => 'Сентябрь',
            10 => 'Октябрь‎',
            11 => 'Ноябрь',
            12 => 'Декабрь‎'
        ];


        $months = array_reverse($months, true);

        $forecasts_bank = $this->forecastBank($forecasts);

        // передаем в представление fullStatistics_content сформированные переменные и render-ром представляем их в строку
        $this->vars['content'] = view('fullStatistics_content')
            ->with([
                'forecasts' => $forecasts,
                'forecastsPaid' => $forecastsPaid,
                'forecastsFree' => $forecastsFree,
                'months'=> $months,
                'sort' => Sort::class,
                'forecasts_bank' => $forecasts_bank
            ])->render();

        return $this->renderOutput();

    }

    /**
     * @return $this
     * @throws \Throwable
     */

     // метод передающий три параметра в страницу О НАС в представление aboutUs_content
    public function aboutUs()
    {
        $this->vars['title'] = 'О нас';
        $this->vars['meta_keywords'] = 'точные прогнозы на спорт,проходимые прогнозы на спорт,онлайн прогнозы,ставки на футбольные матчи,прогнозы на спорт,качественные прогнозы от профессионалов';
        $this->vars['meta_description'] = 'Качественные прогнозы от профессионалов, залог успеха любого любителя ставок, это проходимые прогнозы на спорт';

        $this->vars['content'] = view('aboutUs_content')->render();

        return $this->renderOutput();
    }

    /**
     * @return $this
     * @throws \Throwable
     */

     // метод передающий 4 параметра в страницу О НАС в представление ourAdvantages_content
    public function ourAdvantages()
    {
        $this->vars['title'] = 'Наши преимущества';
        $this->vars['meta_keywords'] = 'точные прогнозы на спорт,надежные прогнозы на спорт,прогнозы на спорт с высокой проходимостью,информация о договорных матчах,точные прогнозы на спорт';
        $this->vars['meta_description'] = 'Надежные прогнозы на спорт – наше приоритетное задание, обязывающее привести наших клиентов к стабильной прибыли';

        $this->vars['content'] = view('ourAdvantages_content')->render();

        return $this->renderOutput();
    }

    /**
     * @return $this
     * @throws \Throwable
     */

      // метод передающий 4 параметра в страницу О НАС в представление guaranteesReliability_content
    public function guaranteesReliability()
    {
        $this->vars['title'] = 'Гарантии надежности - Часто задаваемые вопросы';
        $this->vars['meta_keywords'] = 'точные прогнозы на спорт,надежные прогнозы на спорт,прогнозы на спорт с высокой проходимостью,информация о договорных матчах,точные прогнозы на спорт';
        $this->vars['meta_description'] = 'Команда профессионалов нашего сайта  собирает аналитическую информацию и предоставляет нашим клиентам качественные прогнозы с большим процентом проходимости, со ставок на спорт';

        $this->vars['content'] = view('guaranteesReliability_content')->render();

        return $this->renderOutput();
    }


    /**
     * @return $this
     * @throws \Throwable
     */
    public function contact()
    {
        $this->vars['title'] = 'Контакты';

        $this->vars['content'] = view('contact_content')->render();

        return $this->renderOutput();
    }


    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */

     // функция по приему сообщений и автоматически отправки автоматического письма
     // и поттом редирект на представление status
    public function contactSend(Request $request)
    {
        $data = $request->except('_token');
        $validator = Validator::make($data, [
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'message' => 'required|string|min:10|max:1000',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        Mail::to(env('MAIL_USERNAME'))->send(new ContactForm($data));

        return redirect()->back()->with('status', 'Сообщение успешно отправлено!');

    }
}
