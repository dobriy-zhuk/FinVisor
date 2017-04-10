<!DOCTYPE html>
<html class="no-js">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" type="image/png" href="../images/favicon.png">
        <title>Подбор наиболее депозита для предпринимателей и бизнеса</title>
        <meta name="description" content="Подбор депозитов для вашего бизнеса из более 500 предложений Российских банков">
        <meta name="keywords" content="депозиты, бизнес, валюта">
        <meta name="author" content="">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/ionicons.min.css">
        <link rel="stylesheet" href="../css/animate.css">
        <link rel="stylesheet" href="../css/slider.css">
        <link rel="stylesheet" href="../css/owl.carousel.css">
        <link rel="stylesheet" h0ref="../css/owl.theme.css">
        <link rel="stylesheet" href="../css/jquery.fancybox.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/responsive.css">

        <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/wow.min.js"></script>
        <script src="../js/slider.js"></script>

        <script src="../js/main.js"></script>
        <script async src="https://static.addtoany.com/menu/page.js"></script>

        <script async type="text/javascript">

            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });

            function changed_form(){
                var min_time = $("#min_time" ).val();
                var currency = $("#currency" ).val();
                var min_balance = $("#min_balance" ).val();
                var payment = $("#payment" ).val();

                window.history.replaceState({}, "", updateQueryStringParameter(window.location.href,"min_time",min_time));
                window.history.replaceState({}, "", updateQueryStringParameter(window.location.href,"currency",currency));
                window.history.replaceState({}, "", updateQueryStringParameter(window.location.href,"min_balance",min_balance));
                window.history.replaceState({}, "", updateQueryStringParameter(window.location.href,"payment",payment));

                get_deposits();

            }

            function change_page(page){
                window.history.replaceState({}, "", updateQueryStringParameter(window.location.href,"page",page));

                get_deposits();
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

           function get_deposits(){

               var myData={
                   min_time: getUrlVars()['min_time'],
                   currency: getUrlVars()['currency'],
                   min_balance: getUrlVars()['min_balance'],
                   payment: getUrlVars()['payment'],
                   page: getUrlVars()['page']
               };

               jQuery.ajax({
                   type: "GET",
                   url: "../scripts/get_deposits.php",
                   dataType:"text",
                   data: myData,
                   success:function(response){
                       document.getElementById('result').innerHTML = "";
                       var result = JSON.parse(response);

                       result.forEach(function(element){
                           document.getElementById('result').innerHTML += '<tr class="product_card">' +
                               '<td>'+ element.name_institution + ' (' + element.name_deposit + ') <br>' +
                               '<img src="' + element.logo_institution + '" alt="" width = "125" height="125"' + '<br>' +
                               '</td>' +
                               '<td style="text-align: center; vertical-align: middle;">' + element.currency + '</td>' +
                               '<td style="text-align: center; vertical-align: middle;">' + element.min_balance + ' руб.</td>' +
                               '<td class="active" style="text-align: center; vertical-align: middle;">до ' + element.rate + '%<br><button class=\"btn btn-success\" onclick="forward(\'' + element.id + '\',\'' + element.name_institution + '\')"> Открыть депозит</button>' + '</td>' +
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
                mymodal.find('.modal-title').text("Заявление на открытие депозита в " + name_institution);
                mymodal.modal('show');

            }

            function send_order(){
                alert("ok");
            }

        </script>

    </head>
    <body onload="get_deposits()">

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
                            <a href="#" class="dropdown-toggle underline" data-toggle="dropdown">Банковской обслуживание <b class="caret"></b></a>
                            <div class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Обзоры</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/top-finance/top-cash-service.html">Лучшие РКО 2017</a></li>
                                            <li><a href="../blog/top-finance/top-acquiring.html">Топ эквайрингов 2017</a></li>
                                            <li><a href="../blog/top-finance/top-currency.html">Топ зарплатный проект 2017</a></li>
                                            <li><a href="../blog/top-finance/top-deposits.html">Топ депозитов для бизнеса 2017</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Сравнение</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="cash_service.php">РКО для бизнеса</a></li>
                                            <li><a href="acquiring.php">Эквайринг</a></li>
                                            <li><a href="deposits.php">Депозиты для бизнеса</a></li>

                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Рекомендации</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/bank-service/cash-service-choose.html">Как выбрать РКО?</a></li>
                                            <li><a href="../blog/bank-service/acquiring-online-shop.html">Эквайринг для интернет-магазина</a></li>
                                            <li><a href="../blog/bank-service/no_inflation.html">Избавляемся от инфляции</a></li>
                                            <li><a href="../blog/bank-service/mobile-acquiring.html">РКО для ИП</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Кредитование<b class="caret"></b></a>
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
                                            <li><a href="../credit/credit.php">Открытие бизнеса</a></li>
                                            <li><a href="#">Пополнение оборотного капитала</a></li>
                                            <li><a href="#">Коммерческая ипотека</a></li>
                                            <li><a href="#">Лизинг</a></li>

                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Рекомендации</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/credit/get-credit.html">На что обращать внимание?</a></li>
                                            <li><a href="../blog/credit/credit-open-business.html">Кредит на открытие бизнеса</a></li>
                                            <li><a href="../blog/credit/mortgage-vs-plan.html">Ипотека или рассрочка?</a></li>
                                            <li><a href="../blog/credit/credit-documents.html">Кредит в финансовой отчетности</a></li>
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
                                            <li><a href="#">Сотрудники</a></li>

                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Рекомендации</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/insurance/choose-insurance.html">Как выбрать оптимальную страховку?</a></li>
                                            <li><a href="../blog/insurance/liability-insurance.html">Где купить полис автострахования?</a></li>
                                            <li><a href="../blog/insurance/finance-insurance.html">Страхование финансовых рисков</a></li>
                                            <li><a href="../blog/insurance/property-insurance.html">Как формируется стоимость?</a></li>
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
                                            <li><a href="../blog/investing/financial-statement.html">Инвестирование в государственные облигации</a></li>
                                            <li><a href="#">Готовим питч</a></li>
                                            <li><a href="#">Как создать презентацию для инвестора?</a></li>
                                            <li><a href="#">Оценка стоимости компании</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="#">Войти</a></li>
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
                          <h1><strong>Депозиты для малого и среднего бизнеса</strong></h1>
                          <p><i>Теперь стало гораздо проще найти депозиты с высокой процентной ставкой среди всех предложений российских банков для малого и среднего бизнеса</i></p>
                       </div>
                    </div>
    </div>
    <form onchange="changed_form()">
    <div class="container">
        <div class="row">
            <div class="col-xs-3">
                <div class="form-group">
                    <label for="min_time">Минимальный срок размещения</label>
                    <select id="min_time" class="selectpicker form-control">
                        <option value="0">Не имеет значения</option>
                        <option value="7">7 дней</option>
                        <option value="31">31 день</option>
                        <option value="365">от 1 года</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="form-group">
                    <label for="currency">Валюта депозита</label>
                    <select id="currency" class="selectpicker form-control">
                        <option value="RUB">Рубли</option>
                        <option value="USD">Доллары</option>
                        <option value="EUR">Евро</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="form-group">
                    <label for="min_balance">Минимальный остаток</label>
                    <select id="min_balance" class="selectpicker form-control">
                        <option value="0">Не имеет значения</option>
                        <option value="100000">100тыс. руб</option>
                        <option value="1000000">1млн. руб</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="form-group">
                    <label for="payment">Периодичность выплат</label>
                    <select id="payment" class="selectpicker form-control">
                        <option value="1">Ежемесячно</option>
                        <option value="3">Ежеквартально</option>
                        <option value="100">В конце срока</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    </form>
    <div class="container">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th class="col-sm-3 text-center active"><a>Банк (Наименование вклада)</a></th>
                    <th class="col-sm-3 text-center active"><a>Валюта</a></th>
                    <th class="col-sm-3 text-center active"><a>Минимальный остаток</a></th>
                    <th class="col-sm-3 text-center active"><a>Процентная ставка</a></th>
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
                        <h4 class="modal-title" id="modal-title">Заявка на открытие РКО</h4>
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
                                <label class="sr-only" for="email_order">Ваш Email</label>
                                <input type="email" class="form-control" id="email_order" placeholder="Email" required oninvalid="this.setCustomValidity('Пожалуйста, введите Email')">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="inn_order">ИНН организации/ИП</label>
                                <input type="text" class="form-control" id="inn_order" placeholder="ИНН организации/ИП" required oninvalid="this.setCustomValidity('Пожалуйста, введите ИНН')">
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