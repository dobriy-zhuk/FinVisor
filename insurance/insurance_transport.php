<!DOCTYPE html>
<html class="no-js">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" type="image/png" href="../images/favicon.png">
        <title>Подбор наиболее выгодного страхования недвижимости для малого и среднего бизнеса</title>
        <meta name="description" content="Подбор выгодного страхования для вашего бизнеса">
        <meta name="keywords" content="страхование, бизнес, офис, недвижимость, для бизнеса">
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

            function changed_form() {

                var newUrl = '';

                switch ($('#type_insurance' ).val()){
                    case 'transport': newUrl = '/insurance_transport.php'; break;
                    case 'realty': newUrl = '/insurance_realty.php'; break;
                    case 'finance': newUrl = '/insurance_finance.php'; break;
                    case 'complex': newUrl = '/insurance_complex.php'; break;
                }

                window.location.href = document.URL.substr(0,document.URL.lastIndexOf('/')) + newUrl;

            }

            function get_insurance(){

                var myData={
                    type_insurance: $('#type_insurance' ).val()
                };

                jQuery.ajax({
                    type: "GET",
                    url: "../scripts/get_insurance.php",
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
                                '<td style="text-align: center; vertical-align: middle;">' + element.risks + '</td>' +
                                '<td style="text-align: center; vertical-align: middle;">' + element.rating + '</td>' +
                                '<td class="active" style="text-align: center; vertical-align: middle;">' + element.price + '<br><button class=\"btn btn-success\" onclick="forward(\'' + element.id + '\',\'' + element.name_institution + '\')"> Открыть депозит</button>' + '</td>' +
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
                mymodal.find('.modal-title').text("Заявление на страхование в " + name_institution);
                mymodal.modal('show');

            }
        </script>

    </head>
    <body onload="get_insurance()">
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
                                            <li><a href="../credit/credit-capital.php">Пополнение оборотного капитала</a></li>
                                            <li><a href="../credit/credit-mortgage.php">Коммерческая ипотека</a></li>
                                            <li><a href="../credit/credit-leasing.php">Лизинг</a></li>
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
                            <a href="insurance_realty.php" class="dropdown-toggle underline" data-toggle="dropdown">Страхование <b class="caret"></b></a>
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
                                            <li><a href="insurance_transport.php">Автотранспорт</a></li>
                                            <li><a href="insurance_realty.php">Недвижимость</a></li>
                                            <li><a href="insurance_realty.php">Финансовая деятельность</a></li>
                                            <li><a href="insurance_complex.php">Комплексное страхование</a></li>
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
                <h1><strong>Страхование автотранспорта для бизнеса</strong></h1>
                <p><i>Выбирайте лучшие варианты страхования автотранспорта для вашего бизнеса</i></p>
                <form onchange="changed_form()">
                    <div class="form-group">
                        <select id="type_insurance" class="selectpicker form-control">
                            <option value="transport" selected>Страхование автотранспорта</option>
                            <option value="realty">Страхование недвижимости</option>
                            <option value="finance">Страхование финансовой деятельности</option>
                            <option value="complex">Комплексное страхование бизнеса</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                <tr>
                    <th class="col-sm-3 text-center active"><a href="">Организация</a></th>
                    <th class="col-sm-3 text-center active"><a href="">Страхуемые риски</a></th>
                    <th class="col-sm-3 text-center active"><a href="">Рейтинг организации</a></th>
                    <th class="col-sm-3 text-center active"><a href="">Стоимость</a></th>
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