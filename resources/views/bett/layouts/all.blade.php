<!DOCTYPE html>
<html lang="ru">
  <head>
    @include(env('THEME').'.layouts.head')
  </head>
  <body class="{{ isset($bodyImage) ? 'page-'.$bodyImage : 'Default' }} js-focus-visible" style="">
    @include(env('THEME').'.layouts.header')


<script>
	(function () {
    function toArray(selector) {
        var collection = document.querySelectorAll(selector);
        return Array.prototype.slice.call(collection);
    }
    var langSwitcher = document.querySelector('.header__lang-switcher');
    var langList = document.querySelector('.header__lang-list');

    collectionEventBinder('.popup-wrapper__close', closePopup);
	collectionEventBinder('.popup-wrapper__button_switcher', contentSwitcher);

    collectionEventBinder('.header__button', openPopup);
    collectionEventBinder('.header__lang-item', changeLanguage);

    function collectionEventBinder(selector, func, eventType) {
	  var collection = toArray(selector);
	  eventType = eventType || 'click';
	  collection.forEach(function(item) {
	    item.addEventListener(eventType, func);
	  });
	}

    $(document).ready(function(){
        $('.js-button-header-popup').click(function(){
            if($('.popupbase-view').get(0)){
                $('.popupbase-view').removeClass('popupbase-view');
            }
            var headerPopupShow = $(this).data('toggler');
            $('#header-popup').toggleClass('popup-wrapper_show');
            $('#header-popup').find('.popup-wrapper__popup').toggleClass('popup-wrapper__popup_show');
            $('#page').addClass('mode-blur');
            contentSwitcher(event);
            return false
        });
    });

	function closePopup(event) {
	  event.preventDefault();
	  hidePopup()
	}

	function hidePopup() {
        removeClass('.popup-wrapper', 'popup-wrapper_show');
        removeClass('.popup-wrapper__popup', 'popup-wrapper__popup_show');

        function removeClass(selector, CSSClass) {
            toArray(selector).forEach(function(item) {
              item.classList.remove(CSSClass);
            });
        }
        if($('.mode-blur').get(0)){
            $('.mode-blur').removeClass('mode-blur');
        }
	}

	function contentSwitcher(event) {
	  event.preventDefault();
	  toArray('.popup-wrapper__content').forEach(function(item) {
	    item.style.display = 'none';
	  });
	  document.querySelector('.popup-wrapper__content.popup-wrapper__content_' + event.target.dataset.toggler).style.display = 'block';
	}

	function openPopup(event) {
        $('#page').addClass('mode-blur');
        event.preventDefault();
        var selector = event.target.closest('a').getAttribute('href');
        showPopup(selector, event);
	}

	function showPopup(selector, event) {
	  var wrapper = document.querySelector(selector);

	  wrapper.classList.toggle('popup-wrapper_show');
	  wrapper.querySelector('.popup-wrapper__popup').classList.toggle('popup-wrapper__popup_show');

	  if ( selector === '#header-popup' ) {
	    contentSwitcher(event);
	  }

	}

	function changeLanguage(event) {
        var target = event.target;
        var classes = langSwitcher.classList;
        var oldLang = langSwitcher.dataset.lang;
        var newLang = target.dataset.lang;

        classes.remove(classes[1]);
        classes.add('header__lang-switcher_' + newLang);

        target.dataset.lang = oldLang;
        langSwitcher.dataset.lang = newLang;

        target.innerText = oldLang[0].toUpperCase() + oldLang.slice(1);
        target.classList.remove(target.classList[1]);
        target.classList.add('header__lang-item_' + oldLang);

        langList.style.display = 'none';
    }

	})();

</script>

  <div class="clear"></div>

@yield('navigation')
                <!--<div class="grid_14 head">
    <h1>Прогнозы на спорт от профессионалов на сегодня</h1>
</div>-->
<div class="clear"></div>

@yield('baner')

@yield('content')


<div class="clear"></div>


@yield('footer')


    </div>
        <!-- <div id="popups">
            <div id="lostpwd-box" class="box-modal">
                <div class="box-modal_header">
                    <span>Восстановление пароля</span>

                    <a href="" class="box-modal_close arcticmodal-close"></a>
                </div>

                <div class="box-modal_content">
                    <form id="requestReset" action="/profile/requestReset/" class="lfloat w270" onsubmit="Controller_Profile.requestReset (this);return false;">
                        <div class="clgray">Введите ваш Email для восстановления:</div>

                        <br><input name="email" placeholder="E-mail" class="w250" required="required">

                        <input type="submit" value="Восстановить" class="button-yellow lostpwd-btn" onclick="Controller_Profile.requestReset ($('#requestReset'))">
                        <div style="color: white; margin-top: 10px; width: 400px;" class="res-text-recovery"></div>
                    </form>
                </div>
            </div>
        </div> -->
    <div id="overlay"></div>
    <div class="popupbase init_border-box popup_reg" aria-modal="true" role="dialog">
        <div class="popupbase-table">
            <div class="popupbase-cell">
                <div class="popupbase-body _w_wide">
                    <div class="popupbase-cols">
                        <div class="popupbase-cols__itemcol popupbase-cols__content">
                            <div class="popupbase-cols__itemcol-frame">
                                <div class="popupbase-content">
                                    <div class="popupbase__wrapper-inside">
                                        <div class="line-temp line-base">
                                            <h6 class="title-reset title-large font-bold">
                                                Регистрация в 1 клик
                                            </h6>
                                        </div>
                                        <div class="line-temp line-base">
                                            <p class="title-reset title-sm">
                                                Зарегистрируйтесь или войдите, чтобы продолжить просмотр бесплатных прогнозов.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popupbase-cols__itemcol popupbase-cols__side _back-brand">
                            <div class="popupbase-cols__itemcol-frame">
                                <div class="popupbase-content">
                                    <form action="https://web.archive.org/web/20190828062649/https://betfaq.ru/user/registration/index/" onsubmit="User_Registration_popup_reg.index (this);return false;" method="POST">
                                        <fieldset class="_reset">
                                            <legend class="visually-hidden">Зарегистрируйся, чтобы продолжить просмотр бесплатных прогнозов</legend>
                                            <fieldset class="_reset">
                                                <div class="line-temp line-l">
                                                    <label for="inpreg_mail" class="visually-hidden">Введите ваш email</label>
                                                    <input id="inpreg_mail" type="email" name="email" class="field-reset field-base" value="" placeholder="Введите ваш email">
                                                </div>
                                                <div class="line-temp line-s color_danger paragraph-xs" id="reg_message_popup"></div>
                                                <input type="checkbox" name="agreed" checked="checked" class="visually-hidden">
                                                <div class="line-temp line-xl">
                                                    <button type="submit" class="button-reset button-base _theme-success button-block" onclick="ga(&#39;send&#39;, &#39;pageview&#39;, &#39;/goal-reg-prognoz-popup-ok&#39;);">Зарегистрироваться</button>
                                                </div>
                                            </fieldset>
                                        </fieldset>
                                    </form>
                                    <div class="line-temp line-xl">
                                        <button class="button-reset button-base _theme-success button-block js-button-header-popup" data-toggler="login">Войти</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="button-reset popupbase-close popupbase-button__close _theme-white" title="Закрыть" onclick="ga(&#39;send&#39;, &#39;pageview&#39;, &#39;/goal-reg-prognoz-popup-close&#39;);">
                        Закрыть
                        <svg class="icon-svg popupbase-button__close-icon"><use xlink:href="#icon-close"></use></svg>
                    </button>
                </div>
            </div>
            <div class="popupbase-verlay"></div>
        </div>
    </div><!-- popupbase / popup_reg -->
    <div class="popupbase init_border-box popup_success-reg" aria-modal="true" role="dialog">
        <div class="popupbase-table">
            <div class="popupbase-cell">
                <div class="popupbase-body _w_wide">
                    <div class="popupbase-content">
                        <div class="popupbase__wrapper-inside text-center">
                            <div class="line-temp line-md">
                                <h6 class="title-reset title-lg">
                                    Мы отправили вам письмо!
                                </h6>
                            </div>
                            <div class="line-temp line-md">
                                <img src="{{ asset(env('THEME')) }}/img/icon-mail.png" alt="Письмо успешно отправлено." class="img-accessibility">
                            </div>
                            <div class="line-temp line-md">
                                <p class="title-reset title-sm">
                                    Пожалуйста, зайдите на указанную вами почту и подтвердите регистрацию
                                </p>
                            </div>
                        </div>
                        <button class="button-reset popupbase-close popupbase-button__close _theme-base" title="Закрыть">
                            Закрыть
                            <svg class="icon-svg popupbase-button__close-icon"><use xlink:href="#icon-close"></use></svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="popupbase-verlay"></div>
        </div>
    </div><!-- popupbase / popup_success-reg -->
        <script>
            function stickyTitles(stickies) {
            this.load = function() {
                stickies.each(function() {
                    var thisSticky = $(this).wrap('<div class="follow-wrapper"/>');
                    thisSticky.parent().height(thisSticky.outerHeight());
                    $.data(thisSticky[0], 'pos', thisSticky.offset().top);
                });
            }

            this.scroll = function() {
                stickies.each(function(i) {
                    var thisSticky = $(this),
                        nextSticky = stickies.eq(i + 1),
                        prevSticky = stickies.eq(i - 1),
                        pos = $.data(thisSticky[0], 'pos');
                    var bot = pos - thisSticky.outerHeight(true) + thisSticky.closest('section').outerHeight(true);
                    if (pos <= $(window).scrollTop()) {
                        thisSticky.addClass('fixed');
                        if (nextSticky.length > 0 && thisSticky.offset().top >= $.data(nextSticky[0], 'pos') - thisSticky.outerHeight()) {
                            thisSticky.addClass('absolute').css('top', $.data(nextSticky[0], 'pos') - thisSticky.outerHeight());
                        }
                    } else {
                        thisSticky.removeClass('fixed');
                        if (prevSticky.length > 0 && $(window).scrollTop() <= $.data(thisSticky[0], 'pos')  - prevSticky.outerHeight()) {
                            prevSticky.removeClass('absolute').removeAttr('style');
                        }
                    }

                    if ($(window).scrollTop() > bot) {
                        thisSticky.removeClass('fixed');
                        if (prevSticky.length > 0 && $(window).scrollTop() <= $.data(thisSticky[0], 'pos')  - prevSticky.outerHeight()) {
                            prevSticky.removeClass('absolute').removeAttr('style');
                        }
                    }
                });
            }
        }
            $(function() {

                var width = $(window).width();

                $('#mainmenu').after($('<div id="mainmenu-holder"/>').css({
                    height: '56px',
                    marginTop: '-56px'
                }));

                function updateMenuPosition() {
                    if (width > 1101) {
                        if ($(window).scrollTop() < 182) {
                            $('#mainmenu').removeClass('fixed');
                            $('#mainmenu-holder').css({ marginTop: '-56px' });

                            $('#main-menu').css({top: 0, position: 'absolute'});
                        } else {
                            $('#mainmenu').addClass('fixed');
                            $('#mainmenu-holder').css({ marginTop: 0 });

                            $('#main-menu').css({top: 0, position: 'fixed'});
                        }
                    } else {
                        if ($(window).scrollTop() < 212) {
                            $('#mainmenu').removeClass('fixed');
                            $('#mainmenu-holder').css({ marginTop: '-56px' });
                        } else {
                            $('#mainmenu').addClass('fixed');
                            $('#mainmenu-holder').css({ marginTop: 0 });
                        }

                        $('#main-menu').css({position: 'static'});
                    }
                }
                var stickies = new stickyTitles($('#sticky section header'));

            stickies.load();
            $(window).scroll(function() {
                updateMenuPosition();

                stickies.scroll();

            });


                    $(window).resize(function() {
                        width = $(window).width();
                        updateMenuPosition();
                    });

                            $(window).load(function() {
                    // до конрца дня
                    var cookieName = 'is-new-user';
                    if (!Controller_System.getCookie(cookieName)) {
                        setTimeout('Controller_Subscribe.regPopup()', 1000 * 5)
                    }

                });

        });


        </script>
        <script src="{{ asset(env('THEME')) }}/js/arcticmodal.js"></script>

        <script>
            localStorage.removeItem ('jv_store_J5trncW2TZ_client');

    function jivo_onLoadCallback(){
        jivo_api.setContactInfo ({"name":"","email":null,"phone":"","description":"..."});
                jivo_api.setUserToken ('PHZR0ofZfdoO35KMWXM6k5jS2OvuC8OG');
            };

    (function() {
        var widget_id = 'J5trncW2TZ';
        var d = document;
        var w = window;

        function l() {
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            // s.src = '//web.archive.org/web/20190828062649/https://code.jivosite.com/script/widget/' + widget_id;
            s.src = '{{ asset(env("THEME")) }}/css/' + widget_id;
            var ss = document.getElementsByTagName('script')[0];
            ss.parentNode.insertBefore(s, ss);
        }
        if (d.readyState == 'complete') {
            l();
        } else {
            if (w.attachEvent) {
                w.attachEvent('onload', l);
            } else {
                w.addEventListener('load', l, false);
            }
        }
    })();
</script>

<!--<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-58470577-1', 'auto');
        ga('send', 'pageview');
</script>-->


        <!--
        <script>
            // ecortb = {
            //     'counter_id': '73',
            //     'async': false
            // };
            // (function (w,d,o,t) {
            //     o.send = function(){(o.queue = o.queue||[]).push(arguments)}
            //     var s = d.createElement(t);
            //     if (o.async)
            //         s.async = 1;
            //     s.src =  "//echo.ecortb.com/counter.js";
            //     var i = d.getElementsByTagName(t)[0];
            //     i.parentNode.insertBefore(s, i);
            //     o.send('pageview');
            // })(window,document,ecortb,'script');
        </script>
        -->

    <script>

        $(window).load(function() {

            var hash = location.hash;

            if (hash == '#register') {
                User_Service.form ();
            }

            // for vk crosdomain
            if (hash == '#vk') {
                var session_id = Controller_System.getCookie('session_id');
                Controller_Profile.login_vk(session_id);
                window.history.pushState("", "", '/');
            }

            Controller_Lang.setLang('ru');

        });

    </script>

    <script>
    (function (w,i,d,g,e,t,s) {w[d] = w[d]||[];t= i.createElement(g);     t.async=1;t.src=e;s=i.getElementsByTagName(g)[0];s.parentNode.insertBefore(t, s);   })(window, document, '_gscq','script','{{ asset(env('THEME')) }}/js/script.js');
             _gscq.push(['targeting','is_customer', '0']);
             _gscq.push(['targeting','unsubscribed', '0']);
             _gscq.push(['targeting','authed', '0']);
    </script>        <img src="{{ asset(env('THEME')) }}/index/rp_counter.php" style="display:none" alt="#">


        <script src="{{ asset(env('THEME')) }}/js/focus-visible.min.js"></script>
        <script src="{{ asset(env('THEME')) }}/js/main.js"></script>


<!--
     FILE ARCHIVED ON 06:26:49 Aug 28, 2019 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 09:17:06 Oct 01, 2020.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
-->
<!--
playback timings (ms):
  captures_list: 230.832
  PetaboxLoader3.datanode: 133.466 (4)
  LoadShardBlock: 173.787 (3)
  RedisCDXSource: 21.811
  exclusion.robots: 0.275
  exclusion.robots.policy: 0.265
  load_resource: 135.916
  esindex: 0.017
  CDXLines.iter: 25.013 (3)
  PetaboxLoader3.resolve: 99.862 (2)
--></body></html>
