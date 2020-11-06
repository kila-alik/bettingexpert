<?
первый уровень это сущности - они превращаются в таблицы
  второй уровень это их своства - они превращаются в преоставления

при постороении полей сначало указываем поля с основным ключем (чаще всего это id)
потом указываем поля с внешними ключами (они указывают на поля в других таблицах)
потом указываем "локальные" поля таблицы


пользователи (users) - таблица
  id
  name
  email
  password
  is_admin - boolean (Администратор или нет!)

Виды_спорта (sports)
  id - bigIncrements (на него будет указывать внешний ключ "sports_id" из таб. championship и из таб. command)
  name - string

Страна (country) - таблица
  id - bigIncrements (на него будет указывать внешний ключ "country_id" из таб. championship и из таб. command и из таб. forecast)
  name - string

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
  description - string (описание команды)

прогноз (forecast) - таблица
  id - bigIncrements
  command_1 - bigInteger (это внешний ключ, он будет указывать на поле id в таб. command)
  command_2 - bigInteger (это внешний ключ, он будет указывать на поле id в таб. command)
  country_id - bigInteger (это внешний ключ, он будет указывать на поле id в таб. country)
  champ_id - bigInteger (это внешний ключ, он будет указывать на поле id в таб. championship)
  coeff - float (Коэффициент прогноза)
  result - string - (результат игры)
  data_game - timestamp (дата игры)
  status - boolean (платные или бесплатные прогнозы)


Подписки

миграции
модели
контролеры для крут

справочно:
создать таблицу
php artisan make:migration create_sports_table

изменить таблицу (добавить удалить или изменить столбцы)
php artisan make:migration change_sports_table --table=sports
