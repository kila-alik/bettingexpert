<div id="one-time-overlay" class="dialog5s"></div>
<div id="one-time-banner">
  <div>
    <a href="/tomorrow/"></a>
    <button></button>
  </div>
</div>
        <!-- subscribe  popup -->
<div id="one-time-overlay-subscribe"></div>
<div id="one-time-subscribe">
    <div>
        <a href="javascript:void(0)" onclick="Controller_Subscribe.closePopup();"><!-- close --></a>
        <form method="post" class="subblock" id="subcribe-form" onsubmit="Controller_Subscribe.sendFromPopup(this); return false;">
            <label for="semail">Присылать лучшие прогнозы на email?</label>
            <input type="email" class="subcribe-email" name="subemail" placeholder="Ваш Email..." required="">
            <input type="submit" value="Отправить" class="button-yellow">
            <p class="message-subscribe"></p>
        </form>
    </div>
</div>
<div class="container_14">

<!--            <div id="topbanner">
          <ins> </ins>
          <div class="from">BetFAQ.ru<br>прогнозы<br><strong>от 150 руб!</strong></div>
          <div class="best">
              Лучшие аналитические спортивные прогнозы от<br>профессиональной команды Betfaq
              <br><a href="/vip/"><span>в магазине прогнозов</span></a>
          </div>
      </div>-->
    <div id="authblock">
      <div class="res-text">
        <span>Вход</span>
        <ul>
          <li class="en"><a href="javascript:;" onclick="Controller_Lang.set_domain(&#39;betfaq.com&#39;,&#39;/tomorrow/&#39;);">EN</a></li>
          <li class="ru active"><a href="javascript:;" onclick="Controller_Lang.set_domain(&#39;betfaq.ru&#39;,&#39;/tomorrow/&#39;);">RU</a></li>
        </ul>
      </div>
      <form onsubmit="Controller_Profile.login (this);return false;" action="/profile/login/" id="form-login">
        <input type="email" name="email" class="short" placeholder="E-mail">
        <input type="password" name="password" class="short" placeholder="Пароль">
        <input type="submit" value="Вход">
          <a href="https://oauth.vk.com/authorize?client_id=5041736&amp;redirect_uri=http%3A%2F%2Fbetfaq.com%2Fuser%2Fauth%2Fvk%2F&amp;display=page&amp;scope=email&amp;response_type=code&amp;v=5.37" class="vk-button"></a>
          <div class="register-link" style="margin-top: -3px">
            <a onclick="User_Service.form ({&#39;onShow&#39;:&#39;OPENREGFORMMAIN&#39;,&#39;onReg&#39;: &#39;CLICKREGFORMMAIN&#39;});" class="form-register-form">Регистрация</a>
            <a href="javascript:void(0)" class="recovery-password">Забыли пароль?</a>
          </div>
      </form>
    </div>
    <a href="/" id="logo" class="logo"></a>
</div>

<div class="clear"></div>

<div id="page">
  <div id="content" class="container_14">

    <style type="text/css" media="screen">
        @font-face {
            font-family: 'gotham_probold';
            src: url('{{ env('THEME') }}/fonts/GothaProBol.eot');
            src: local('@'), url('{{ env('THEME') }}/fonts/GothaProBol.woff') format('woff'), url('{{ env('THEME') }}/fonts/GothaProBol.ttf') format('truetype'), url('{{ env('THEME') }}/fonts/GothaProBol.svg') format('svg');
            font-weight: normal;
            font-style: normal;
        }
    </style>

<nav id="mainmenu" class="fixed">
<ul>
  <li>
    <a href="/">Все прогнозы </a>
  </li>

  <li class="vip">
    <a href="/vip/">VIP прогнозы</a>
  </li>

  <li class="prem">
    <a href="/win/premium/">Премиум прогнозы</a>
  </li>

  <li>
    <a href="/win/premium/#premium-reviews">Отзывы</a>
  </li>

  <li class="faq">
    <a href="/vopros-otvet/">Ответы на вопросы</a>
  </li>
</ul>
</nav>
