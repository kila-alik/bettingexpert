<header class="header">
  <span class="header__logo">Betfaq - Прогнозы на спорт</span>

  <div class="header__auth">
      <div class="header__row">
          <a href="https://web.archive.org/web/20190828062649/https://betfaq.ru/#header-popup" data-toggler="login" class="header__button header__button_login">Вход</a>
          <a href="https://web.archive.org/web/20190828062649/https://betfaq.ru/#header-popup" data-toggler="reg" class="header__button header__button_reg">Регистрация</a>
          <!--<a href="#header-popup" data-toggler="reg1000" style="width: 300px;" class="header__button header__button_reg">Зарегистрируйся и получи 1000 руб.</a>-->
      </div>
      <div class="header__row">
          <span class="header__text">Войти через:</span>
          <div class="header__social-login">
              <a href="https://web.archive.org/web/20190828062649/https://oauth.vk.com/authorize?client_id=5041736&amp;redirect_uri=http%3A%2F%2Fbetfaq.com%2Fuser%2Fauth%2Fvk%2F&amp;display=page&amp;scope=email&amp;response_type=code&amp;v=5.37" class="header__oauth header__oauth_vk" rel="nofollow" target="_blank">Вконтакте</a>
          </div>
      </div>
    </div>
</header>

<div id="header-popup" class="popup-wrapper">
    <div class="popup-wrapper__popup-container">

        <div class="popup-wrapper__popup popup-wrapper__popup_header">
            <a href="https://web.archive.org/web/20190828062649/https://betfaq.ru/#" class="popup-wrapper__close"></a>
            <div class="popup-wrapper__popup-inner">

                <div class="popup-wrapper__content popup-wrapper__content_remail">
                    <h2 class="popup-wrapper__title">Подтверждение регистрации</h2>
                    <img src="<?php echo e(env('THEME')); ?>/img/icon-mail.png" alt="">
                    <form action="https://web.archive.org/web/20190828062649/https://betfaq.ru/user/remail/" class="popup-wrapper__form" method="POST">
                        <p class="popup-wrapper__thx-text">Вам необходимо подтвердить ваш email адрес, перейдя по ссылке из письма,
                            которое мы отправляли на вашу почту при регистрации!</p>
                        <button type="submit" class="popup-wrapper__button">Отправить еще раз</button>
                    </form>
                </div>

<!--                <div class="popup-wrapper__content popup-wrapper__content_reg1000">
                    <h2 class="popup-wrapper__title">Зарегистрируйся сейчас и получи 1000 р. в подарок!</h2>
                    <form action="/user/registration/index/" onsubmit="User_Registration.index (this);return false;" class="popup-wrapper__form" method="POST">
                        <input type="email" name="email" placeholder="Введите ваш email" required="required" class="popup-wrapper__input" />
                        <input type="checkbox" name="agreed" id="agreed">
                        <label for="agreed">Я принимаю <a target="_blank" href="/oferta/">условия соглашения</a> и <a target="_blank" href="/mailpolicy/">Правила политики email и sms уведомлений</a></label>
                        <button type="submit" class="popup-wrapper__button">Зарегистрироваться</button>
                        <div id="reg_message" class="line-temp line-sd paragraph-xs"></div>
                    </form>
                    <a href="#" data-toggler="login" class="popup-wrapper__button popup-wrapper__button_switcher">Войти</a>
                </div>-->

                <div class="popup-wrapper__content popup-wrapper__content_reg">
                    <h2 class="popup-wrapper__title">Регистрация в 1 клик</h2>
                    <form action="https://web.archive.org/web/20190828062649/https://betfaq.ru/user/registration/index/" onsubmit="User_Registration.index (this);return false;" class="popup-wrapper__form" method="POST">
                        <input type="email" name="email" placeholder="Введите ваш email" required="required" class="popup-wrapper__input">
                        <input type="checkbox" name="agreed" id="agreed">
                        <label for="agreed">
                            Я принимаю
                                <a target="_blank" href="https://web.archive.org/web/20190828062649/https://betfaq.ru/oferta/">условия Оферты</a>
                             и
                                <a target="_blank" href="https://web.archive.org/web/20190828062649/https://betfaq.ru/privacy/">Политики конфиденциальности</a>
                        </label>
                        <button type="submit" class="popup-wrapper__button">Зарегистрироваться</button>
                        <div id="reg_message"></div>
                    </form>
                    <!-- <a href="#" data-toggler="login" class="popup-wrapper__button popup-wrapper__button_switcher">Войти</a> -->
                </div>

                <div class="popup-wrapper__content popup-wrapper__content_login">
                    <h2 class="popup-wrapper__title">Войти</h2>
                    <form action="https://web.archive.org/web/20190828062649/https://betfaq.ru/profile/login/" onsubmit="Controller_Profile.login (this);return false" class="popup-wrapper__form" method="post">
                        <input type="email" name="email" placeholder="Введите ваш email" required="required" class="popup-wrapper__input">
                        <input type="password" name="password" placeholder="Введите ваш пароль" required="required" class="popup-wrapper__input">
                        <div id="login_message"></div>
                        <a href="https://web.archive.org/web/20190828062649/https://betfaq.ru/#" data-toggler="forget" class="popup-wrapper__forget popup-wrapper__button_switcher">Забыли пароль</a>
                        <br>
                        <div style="width: 304px; margin: 0px auto; display: none;" id="recaptcha">
                          <div>
                            <iframe src="index/fallback.html" frameborder="0" scrolling="no" style="width: 302px; height: 422px;">
                            </iframe>
                            <div style="margin: -4px 0px 0px; padding: 0px; background: rgb(249, 249, 249); border: 1px solid rgb(193, 193, 193); border-radius: 3px; height: 60px; width: 300px;">
                              <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: block;">
                              </textarea>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="popup-wrapper__button">Войти</button>
                    </form>
                    <!-- <a href="#" data-toggler="reg" class="popup-wrapper__button popup-wrapper__button_switcher">Зарегистрироваться</a> -->
                </div>

                <div class="popup-wrapper__content popup-wrapper__content_forget">
                    <h2 class="popup-wrapper__title">Восстановить пароль</h2>
                    <form id="requestReset" action="https://web.archive.org/web/20190828062649/https://betfaq.ru/profile/requestReset/" onsubmit="User_Recovery.ask (this);return false;" class="popup-wrapper__form" method="post">
                        <input type="email" name="email" placeholder="Введите ваш email" required="required" class="popup-wrapper__input">
                        <button type="submit" class="popup-wrapper__button">Восстановить</button>
                        <div id="recovery_message"></div>
                    </form>
                </div>

                <div class="popup-wrapper__content popup-wrapper__content_reg-thx js-form-success">
                    <!-- <h2 class="popup-wrapper__title"></h2> -->
                    <img src="<?php echo e(env('THEME')); ?>/img/icon-mail.png" alt="">
                    <p class="popup-wrapper__thx-text"></p>
                </div>
            </div>
        </div>

    </div>
</div>
<?php /**PATH W:\domains\bettingexpert.loc\resources\views/bett/header.blade.php ENDPATH**/ ?>