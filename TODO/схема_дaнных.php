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

Страна (country) - таблица
  id - bigIncrements (на него будет указывать внешний ключ "country_id" из таб. championship)
  name - string

Чемпионат (championship) - таблица
  id - bigIncrements (на него будет указывать внешний ключ "champ_id" из таб. forecast)
  country_id - bigInteger (это внешний ключ, он будет указывать на поле id из таб. country)
  name - string

команда (command) - таблица
  id - bigIncrements (на него будет указывать внешний ключ "command_1" или "command_1" из таб. forecast)
  name - string
  description - string (описание команды)

прогноз (forecast) - таблица
  id - bigIncrements
  command_1 - bigInteger (это внешний ключ, он будет указывать на поле id из таб. command)
  command_2 - bigInteger (это внешний ключ, он будет указывать на поле id из таб. command)
  champ_id - bigInteger (это внешний ключ, он будет указывать на поле id из таб. championship)
  coeff - float (Коэффициент прогноза)
  status - boolean (платные или бесплатные прогнозы)
  data_game - timestamp (дата игры)



Подписки

миграции
модели
контролеры для крут
