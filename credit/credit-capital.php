<!DOCTYPE html>
<html class="no-js">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" type="image/png" href="../images/favicon.png">
        <title>Подбор наиболее выгодного кредита на пополнение оборотного капитала для малого и среднего бизнеса</title>
        <meta name="description" content="Подбор выгодного кредита на пополнение оборотного капитала для вашего бизнеса">
        <meta name="keywords" content="кредит, бизнес, пополнение, капитал, кредитование, для бизнеса">
        <meta name="author" content="">

        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/ionicons.min.css">
        <link rel="stylesheet" href="../css/animate.css">
        <link rel="stylesheet" href="../css/slider.css">
        <link rel="stylesheet" href="../css/owl.carousel.css">
        <link rel="stylesheet" href="../css/owl.theme.css">
        <link rel="stylesheet" href="../css/jquery.fancybox.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/responsive.css">

        <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/wow.min.js"></script>
        <script src="../js/slider.js"></script>
        <script src="js/jquery.fancybox.js"></script>
        <script src="../js/main.js"></script>

        <script async type="text/javascript">

            $( document ).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });

            function changed_form(){
                var currency = $("#currency" ).val();
                var interest_rate = $("#interest_rate" ).val();
                var credit_time = $("#credit_time" ).val();
                var max_credit = $("#max_credit" ).val();

                window.history.replaceState({}, "", updateQueryStringParameter(window.location.href,"currency",currency));
                window.history.replaceState({}, "", updateQueryStringParameter(window.location.href,"interest_rate",interest_rate));
                window.history.replaceState({}, "", updateQueryStringParameter(window.location.href,"credit_time",credit_time));
                window.history.replaceState({}, "", updateQueryStringParameter(window.location.href,"max_credit",max_credit));

                get_credit_capital();

            }


            function updateQueryStringParameter(uri, key, value) {
                var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
                var separator = uri.indexOf('?') !== -1 ? "&" : "?";
                if (uri.match(re)) {
                    return uri.replace(re, '$1' + key + "=" + value + '$2');
                }
                else {
                    return uri + separator + key + "=" + value;
                }
            }

           function get_credit_capital(){

               var myData={
                   currency: getUrlVars()['currency'],
                   interest_rate: getUrlVars()['interest_rate'],
                   credit_time: getUrlVars()['credit_time']
               };

               jQuery.ajax({
                   type: "GET",
                   url: "../scripts/get_credit_capital.php",
                   dataType:"text",
                   data: myData,
                   success:function(response){
                       document.getElementById('result').innerHTML = "";
                       var result = JSON.parse(response);

                       result.forEach(function(element){
                           document.getElementById('result').innerHTML += '<tr class="product_card">' +
                               '<td>'+ element.name_institution + '<br>' +
                               '<img src="' + element.logo_institution + '" alt="" width = "125" height="125"' + '<br>' +
                               '</td>' +
                               '<td style="text-align: center; vertical-align: middle;">от ' + element.interest_rate + '%</td>' +
                               '<td style="text-align: center; vertical-align: middle;">до ' + element.credit_time + ' мес.</td>' +
                               '<td class="active" style="text-align: center; vertical-align: middle;">до ' + element.max_credit + ' млн. руб.<br><button class=\"btn btn-success\" onclick="forward(\'' + element.id + '\',\'' + element.name_institution + '\')"> Заявка на кредит</button>' + '</td>' +
                               '</tr>' +
                               '<tr><td style="border: none" colspan="3"><a style="font-size: 15px; cursor: pointer" data-toggle="collapse" data-target="#collapseExample' + element.id + '" aria-expanded="false" aria-controls="collapseExample">' +
                               'Особенности' +
                               '</a><div class="collapse"  id="collapseExample' + element.id + '"><p>' +
                               element.details +
                               '</p></td><td style="border: none" class="active"></td></tr>';
                       });

                   },
                   error:function (xhr, ajaxOptions, thrownError){
                       document.getElementById('result').innerHTML = '<b>Ошибка!</b>';
                   }
               });
            }

            function forward(order_id, name_institution){

                var mymodal = $('#myModalBox');
                mymodal.find('.modal-title').text("Заявление на кредит в " + name_institution);
                mymodal.modal('show');

            }
        </script>

    </head>
    <body onload="get_credit_capital()">
    <header id="top-bar" class="navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand">
                    <a href="../index.html" >
                        <img src="../images/logo.png" alt="" height="25">
                    </a>
                </div>
            </div>
            <nav class="collapse navbar-collapse navbar-right" role="navigation">
                <div class="main-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Банковской обслуживание <b class="caret"></b></a>
                            <div class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Обзоры</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/top/top-cash-service.html">Лучшие РКО 2017</a></li>
                                            <li><a href="../blog/top/top-acquiring.html">Топ эквайрингов 2017</a></li>
                                            <li><a href="../blog/top/top-currency.html">Топ валютный контроль 2017</a></li>
                                            <li><a href="../blog/top/top-deposits.html">Топ депозитов для бизнеса 2017</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Сравнение</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../finance/cash_service.php">РКО для бизнеса</a></li>
                                            <li><a href="../finance/acquiring.php">Эквайринг</a></li>
                                            <li><a href="../finance/deposits.php">Депозиты для бизнеса</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Рекомендации</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/bank-service/cash-service-choose.html">Как выбрать РКО?</a></li>
                                            <li><a href="../blog/bank-service/acquiring-online-shop.html">Эквайринг для интернет-магазина</a></li>
                                            <li><a href="../blog/bank-service/no_inflation.html">Избавляемся от инфляции</a></li>
                                            <li><a href="../blog/bank-service/mobile-acquiring.html">Мобильный эквайринг</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle underline" data-toggle="dropdown">Кредитование<b class="caret"></b></a>
                            <div class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Обзоры</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Топ на открытие бизнеса 2017</a></li>
                                            <li><a href="#">Топ кредитов на пополнение капитала</a></li>
                                            <li><a href="#">Топ лизинг автотранспорта 2017</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Сравнение</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="credit.php">Открытие бизнеса</a></li>
                                            <li><a href="credit-capital.php">Пополнение оборотного капитала</a></li>
                                            <li><a href="credit-mortgage.php">Коммерческая ипотека</a></li>
                                            <li><a href="credit-leasing.php">Лизинг</a></li>

                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Рекомендации</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/credit/choose-credit.html">На что обращать внимание?</a></li>
                                            <li><a href="../blog/credit/credit-open-business.html">Кредит на открытие бизнеса</a></li>
                                            <li><a href="../blog/credit/mortgage-vs-plan.html">Ипотека или рассрочка?</a></li>
                                            <li><a href="../blog/credit/credit_documents.html">Кредит в финансовой отчетности</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="../insurance/insurance_realty.php" class="dropdown-toggle" data-toggle="dropdown">Страхование <b class="caret"></b></a>
                            <div class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Обзоры</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Топ страхования недвижимости</a></li>
                                            <li><a href="#">Топ страхования транспорта</a></li>
                                            <li><a href="#">Топ страхования финансовой деятельности</a></li>
                                            <li><a href="#">Топ страхования сотрудников</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Сравнение</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../insurance/insurance_realty.php">Недвижимость</a></li>
                                            <li><a href="#">Автотранспорт</a></li>
                                            <li><a href="#">Финансовая деятельность</a></li>
                                            <li><a href="#">Комплексное страхование</a></li>

                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Рекомендации</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/insurance/choose-insurance.html">Как выбрать оптимальную страховку?</a></li>
                                            <li><a href="../blog/insurance/place_buying.html">Где купить полис автострахования?</a></li>
                                            <li><a href="../blog/insurance/finance-insurance.html">Страхование финансовых рисков</a></li>
                                            <li><a href="../blog/insurance/price-insurance.html">Как формируется стоимость?</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Инвестиции <b class="caret"></b></a>
                            <div class="dropdown-menu multi-column columns-3" style="">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Обзоры</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Топ венчурных фондов 2017</a></li>
                                            <li><a href="#">Топ онлайн-брокеров 2017</a></li>
                                            <li><a href="#">Топ финансовых конкурсов 2017</a></li>
                                            <li><a href="#">Топ ПО для инвесторов 2017</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Сравнение</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../investing/funds.php">Венчурные фонды</a></li>
                                            <li><a href="../investing/brokers.php">Онлайн-брокеры</a></li>
                                            <li><a href="../investing/contest.php">Финансовые конкурсы</a></li>

                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Рекомендации</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/investing/investing_bonds.html">Инвестирование в государственные облигации</a></li>
                                            <li><a href="#">Готовим питч</a></li>
                                            <li><a href="#">Как создать презентацию для инвестора?</a></li>
                                            <li><a href="#">Оценка стоимости компании</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="../contact.html">Войти</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="container">
                  <div class="row fill">
                      <div class="col-md-3">
                          <a data-toggle="tooltip" title="Мы сохраняем строгую редакторскую оценку в наших обзорах. При этом мы получаем компенсацию, если вы переходите по ссылке на нашем сайте и заказываете услуги у наших партнеров." data-placement="bottom">Раскрытие информации</a>
                      </div>
                   </div>
                   <div class="row">
                       <div class="col-md-8 col-md-push-2 top-offset center-block">
                          <h1><strong>Страхование недвижимости</strong></h1>
                          <p><i>Подберите наилучшие страховые предложения среди всех доступных в РФ</i></p>
                       </div>
                    </div>
    </div>
    <form onchange="changed_form()">
    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-md-4">
                <div class="form-group">
                    <label for="currency">Валюта</label>
                    <select id="currency" class="selectpicker form-control">
                        <option value="RUB" selected>RUB</option>
                        <option value="EUR">EUR</option>
                        <option value="USD">USD</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-md-4">
                <div class="form-group">
                    <label for="interest_rate">Процентная ставка</label>
                    <select id="interest_rate" class="selectpicker form-control">
                        <option value="15">До 15%</option>
                        <option value="20">До 20%</option>
                        <option value="25" selected>До 25%</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-md-4">
                <div class="form-group">
                    <label for="credit_time">Срок кредитования</label>
                    <select id="credit_time" class="selectpicker form-control">
                        <option value="12">до 12 месяцев</option>
                        <option value="24">до 24 месяцев</option>
                        <option value="36">до 36 месяцев</option>
                        <option value="48" selected>до 48 месяцев</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    </form>
    <div class="container">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                <tr>
                    <th class="col-sm-3 text-center active"><a href="">Банк</a></th>
                    <th class="col-sm-3 text-center active"><a href="">Процентная ставка</a></th>
                    <th class="col-sm-3 text-center active"><a href="">Срок кредитования</a></th>
                    <th class="col-sm-3 text-center active"><a href="">Максимальная сумма кредита</a></th>
                </tr>
                </thead>
                <tbody id="result" class="table-bordered"></tbody>
            </table>
        </div>
    </div>
        <footer id="footer">
            <div class="container copyright">
                <div class="col-md-8">
                    <div class="col-md-3">
                        <a href="../banks.html">Банкам</a>
                    </div>
                    <div class="col-md-3">
                        <a href="">Интеграция</a>
                    </div>
                    <div class="col-md-3">
                        <a href="">Оферта</a>
                    </div>
                    <div class="col-md-3">
                        <a href="">Контакты</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="social">
                        <li>
                            <a href="http://wwww.fb.com/themefisher" class="Facebook">
                                <i class="ion-social-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://wwww.twitter.com/themefisher" class="Twitter">
                                <i class="ion-social-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="Linkedin">
                                <i class="ion-social-linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://wwww.fb.com/themefisher" class="Google Plus">
                                <i class="ion-social-googleplus"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
        <div id="myModalBox" class="modal fade modal_center">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="modal-title">Заявка на кредитование</h4>
                    </div>
                    <div class="modal-body">
                        <form class="contact" name="contact" id="ContactForm" method="post" onsubmit="send_order()">
                            <div class="form-group">
                                <label class="sr-only" for="name_order">Ваше имя</label>
                                <input type="text" class="form-control" id="name_order" placeholder="Ваше имя" required oninvalid="this.setCustomValidity('Пожалуйста, введите имя')">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="phone_order">Ваш телефон</label>
                                <input type="tel" class="form-control" id="phone_order" placeholder="Телефон" required oninvalid="this.setCustomValidity('Пожалуйста, введите номер телефона')">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="inn_order">ОГРН организации/ОГРНИП</label>
                                <input type="text" class="form-control" id="inn_order" placeholder="ОГРН организации/ОГРНИП" required oninvalid="this.setCustomValidity('Пожалуйста, введите ИНН')">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="url_order">Сайт организации (если есть)</label>
                                <input type="url" class="form-control" id="url_order" placeholder="Сайт организации (если есть)">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-success" id="submit" type="submit" value="Отправить заявку">
                    </div>
                </div>
            </div>
        </div>
         </body>
     </html>