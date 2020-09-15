<?php

namespace App\Http\Controllers;

use App\Forecast;
use App\News;
use Illuminate\Support\Facades\App;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SiteController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $merchant_id = 72558;
    protected $secret_word = 'fquazirr';
    protected $secret_word2 = 'uhqxhoxa';

    protected $fk_ip_address = ['136.243.38.147', '136.243.38.149', '136.243.38.150', '136.243.38.151', '136.243.38.189', '88.198.88.98'];

    protected $template;
    protected $vars = [
        'title' => ''
    ];


    protected $service;

    /**
     * @param $string
     * @return mixed|null|string|string[]
     */
    protected function transliterate($string){
        $str = mb_strtolower($string, 'UTF-8');

        $letter_array = [
            'ж' => 'zh', 'ч' => 'ch', 'щ' => 'shh', 'ш' => 'sh',
            'ю' => 'yu', 'ё' => 'yo', 'я' => 'ya', 'э' => 'e',
            'а' => 'a', 'б' => 'b', 'в' => 'v',
            'г' => 'g', 'д' => 'd', 'е' => 'e', 'з' => 'z',
            'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l',
            'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p',
            'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u',
            'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ъ' => '',
            'ь' => '', 'ы' => 'i',
            'Ж' => 'Zh', 'Ч' => 'Ch', 'Щ' => 'Shh', 'Ш' => 'Sh',
            'Ю' => 'Yu', 'Ё' => 'Yo', 'Я' => 'Ya', 'Э' => 'E',
            'А' => 'A', 'Б' => 'B', 'В' => 'V',
            'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'З' => 'Z',
            'И' => 'I', 'Й' => 'Y', 'К' => 'K', 'Л' => 'L',
            'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P',
            'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U',
            'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C', 'Ъ' => '',
            'Ь' => '', 'Ы' => 'I',
        ];

        foreach($letter_array as $letter => $kyr){
            $str = str_replace($letter, $kyr, $str);
        }

        $str = preg_replace('/(\s|[^A-Za-z0-9\-])+/', '-', $str);

        $str = trim($str, '-');

        $str = preg_replace('/(-){1,}/', "-", $str);

        return $str;
    }


    public function sitemapGenerate()
    {
        $sitemap = App::make("sitemap");

        $sitemap->add(route('login'), '2018-08-25T20:10:00+02:00', '0', 'monthly');
        $sitemap->add(route('register'), '2018-08-25T20:10:00+02:00', '0', 'monthly');
        $sitemap->add(route('password.request'), '2018-08-25T20:10:00+02:00', '0', 'monthly');
        $sitemap->add(route('aboutUs'), '2018-08-25T20:10:00+02:00', '0', 'monthly');
        $sitemap->add(route('ourAdvantages'), '2018-08-25T20:10:00+02:00', '0', 'monthly');
        $sitemap->add(route('guaranteesReliability'), '2018-08-25T20:10:00+02:00', '0', 'monthly');
        $sitemap->add(route('fullStatistics'), '2018-08-25T20:10:00+02:00', '0', 'daily');
        $sitemap->add(route('reviews'), '2018-04-20T20:10:00+02:00', '0', 'daily');
        $sitemap->add(route('contact'), '2018-08-25T20:10:00+02:00', '0', 'monthly');

        // get all posts from db
        $forecasts = Forecast::orderBy('date', 'desc')->get();
        $news = News::orderBy('updated_at', 'desc')->get();

        // add every post to the sitemap
        foreach ($forecasts as $forecast)
        {
            if($forecast->sort_ord==0) {
                $route = route('forecastWsort', ['sort_ord' => $forecast->sort_ord == 1 ? 'express' : 'ordinar', 'sort' => $forecast->sort->alias, 'alias' => $forecast->alias]);
            }else{
                $route = route('forecast', ['sort_ord' => $forecast->sort_ord == 1 ? 'express' : 'ordinar', 'alias' => $forecast->alias]);
            }
            $sitemap->add($route, $forecast->date, '0.5', 'daily');
        }

        $sitemap->add(route('news'), '2018-08-25T20:10:00+02:00', '1.0', 'daily');

        foreach($news as $item){
            $route = route('newsShow', $item->alias);
            $sitemap->add($route, $item->updated_at, '0.5', 'daily');
        }

        // generate your sitemap (format, filename)
        $sitemap->store('xml', 'sitemap');
    }

    /**
     * @param $forecasts
     * @return array
     */
    protected function forecastBank($forecasts){
        $forecasts_stat = $forecasts->where('sort_ord', 0);
        $start_money = 15000;
        $bank_rate_money = $start_money*20/100;
        $bank_amount = $forecasts_stat->where('status',1)->sum('coeff')*$bank_rate_money+$forecasts_stat->where('status',3)->sum('coeff')*$bank_rate_money-$forecasts_stat->where('status',2)->sum('coeff')*$bank_rate_money;
        $bank_profit = $bank_amount-$start_money;
        $bank_plus_procent = $bank_profit*100/$start_money;
        return $forecasts_bank = [
            'start_money' => $start_money,
            'bank_amount' => $bank_amount,
            'bank_profit' => $bank_profit,
            'bank_plus_procent' => $bank_plus_procent
        ];
    }

    /**
     * @return $this
     */
    public function renderOutput()
    {
        return view($this->template)->with($this->vars);
    }
}
