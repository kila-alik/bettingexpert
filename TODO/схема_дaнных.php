<?
первый уровень это сущности - они превращаются в таблицы второй уровень это их своства - они превращаются в преоставления

при постороении полей сначало указываем поля с основным ключем (чаще всего это id)
потом указываем поля с внешними ключами (они указывают на поля в других таблицах)
потом указываем "локальные" поля таблицы


пользователи (users) - таблица
  id
  name
  email
  password
  is_admin - boolean (Администратор или нет!)
  deposit - деньги пользователя

Виды_спорта (sports)
  id - bigIncrements (на него будет указывать внешний ключ "sports_id" из таб. championship и из таб. command)
  name - string
  alias - string

Страна (country) - таблица
  id - bigIncrements (на него будет указывать внешний ключ "country_id" из таб. championship и из таб. command и из таб. forecast)
  name - string
  file - string (имя файла с флагом страны)

Чемпионат (championship) - таблица
  id - bigIncrements (на него будет указывать внешний ключ "champ_id" из таб. forecast)
  sports_id - bigInteger (это внешний ключ, он будет указывать на поле id в таб. sports)
  country_id - bigInteger (это внешний ключ, он будет указывать на поле id в таб. country)
  name - string
  date_begin - timestamp (дата начала чемпионата)
  date_end - timestamp (дата конца чемпионата)

команда (command) - таблица
  id - bigIncrements (на него будет указывать внешний ключ "command_1" или "command_1" из таб. forecast)
  sports_id - bigInteger - вид спорта (это внешний ключ, он будет указывать на поле id в таб. sports)
  country_id - bigInteger - страна (это внешний ключ, он будет указывать на поле id в таб. country)
  name - string
  logo - string (имя файла с логотипом команды)
  description - string (описание команды)

прогноз (forecast) - таблица
  id - bigIncrements
  command_1 - bigInteger (это внешний ключ, он будет указывать на поле id в таб. command)
  command_2 - bigInteger (это внешний ключ, он будет указывать на поле id в таб. command)
  country_id - bigInteger (это внешний ключ, он будет указывать на поле id в таб. country)
  champ_id - bigInteger (это внешний ключ, он будет указывать на поле id в таб. championship)
  coeff - float (Коэффициент прогноза)
  lwin - float (Победа 1-й команды)
  draw - float (Ничья)
  rwin - float (Победа 2-й команды)
  lwdraw - float (Победа 1-й или ничья)
  rwdraw - float (Победа 2-й или ничья)
  text_before - text (Описание игры до фото)
  text_after - text (Описание игры после фото)
  foto - string (Фото в тексте)
  result - string (результат игры)
  data_game - timestamp (дата игры)
  status - integer (платные или бесплатные прогнозы)


миграции
модели
контролеры для крут

справочно:
создать таблицу
php artisan make:migration create_sports_table

изменить таблицу (добавить удалить или изменить столбцы)
php artisan make:migration change_sports_table --table=sports
Имя изменяющего файла и метода внутри должны иметь уникальное имя по отношению к предидущим файлам
---------------------------------------------
Редактировать файл в МС
1.	F4 –
2.	Буква I – появился режим INSERT - редактируем
3.	Esc – закончили редактировать
4.	: - закрыли
5.	wq – записали и вышли
---------------------------------------------
Если надо добавить компонент на хостинге, то это делать не по коротким командам
composer install или php artisan migrate:refresh –seed
На хостинге эти команды вводятся с учетом полного пути к нужной версии php и composer.
Вводить следует /opt/php74/bin/php /usr/local/bin/composer install
устанавливает в vender то чего не хватало на сервере и того что уже было на local
/opt/php74/bin/php artisan migrate:refresh --seed

!!!! иногда надо работать через браузер на https://webconsole.timeweb.ru/
----------------------------------------------
если на стороне сервера (продакшена) были произведены изменения, которые потом
мешают команде git pull (ошибка говорит что у вас уже произошли изменения на
продакшине и залив с git сервера невозможно)
тогда на ПРОДАКШИНЕ в putty или браузере https://webconsole.timeweb.ru/
надо запустить откат к предидущей сохраненной копии git-а
git reset --hard именно --hard а не --soft
после возврата сново накатываем git pull
если loc-але мы устанавливали надстройку то делаем
сначало (например) composer require jenssegers/date
потом прописываем в config/app.php пару строк см. ниже
а потом когда сделали git pull
на продакшине чтоб та же надстройка появилась делаем
/opt/php74/bin/php /usr/local/bin/composer install
----------------------------------------------
как создать авторизацию через МИДЕЛВАРЕ
https://laravel.ru/forum/viewtopic.php?id=1216
Лично я бы для этой задачи создал свой middleware
По шагам:
1) php artisan make:middleware AdminMiddleware
2) Там уже делаешь свою проверку на админа(это уже твои заморочки как ты его вычисляешь), в моём примере через пакет Zizaco/entrust:
namespace App\Http\Middleware;
use Closure;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!\Auth::user()->hasRole(['admin']))
        {
            return redirect()->route('404');
        }
        return $next($request);
    }
}
3) Добавляешь данный Middleware в app/Http/Kernel.php в поле  $routeMiddleware:
'admin' => \App\Http\Middleware\AdminMiddleware::class,
4) Используешь его в роутах, пример:
Route::group(['middleware' => 'auth'], function(){
     //тут роуты для которых нужна авторизация
     Route::group(['middleware' => 'admin'], function(){
             //тут роуты только для админа + авторизация
     });
});
---------------------
как искать метод в проэкте или в папке - через правую клавишу поиск в папке
---------------------
локализованные даты – https://github.com/jenssegers/date
Устанавлиеваем через composer:
composer require jenssegers/date
добавляем строки в config/app.php:

Jenssegers\Date\DateServiceProvider::class,
You can also add it as a Facade in config/app.php:
'Date' => Jenssegers\Date\Date::class,

таймзона настраивается в config/app.php там меняем   'timezone' => 'Europe/Moscow',
-----------------------------------
003. Git — инструмент для совместной работы, с нуля и до регламента в команде — Сергей Сергеев
https://www.youtube.com/watch?v=yDSs80lu3ak
