<!DOCTYPE html>
<html class="no-js">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" type="image/png" href="images/favicon.png">
        <title>Лучшее расчетно-кассовое обслуживание для предпринимателей и бизнеса</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/slider.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/jquery.fancybox.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/responsive.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/slider.js"></script>
        <script src="js/jquery.fancybox.js"></script>
        <script src="js/main.js"></script>
        <script async src="https://static.addtoany.com/menu/page.js"></script>

        <script async type="text/javascript">
            $( document ).ready(function() {
                var filter = document.getElementsByClassName("scrollbox");
                filter.style.height = $( window ).height();
            });

            function forward(link){
                window.open(link,'_blank');
            }

           function get_cash_services(cashback, transfer_price, subscription_fee, remote_banking_price, cash_out, limit){

               var myData={
                   cashback: cashback,
                   transfer_price: transfer_price,
                   subscription_fee: subscription_fee,
                   remote_banking_price: remote_banking_price,
                   cash_out: cash_out,
                   limit: limit
               };

               jQuery.ajax({
                   type: "GET",
                   url: "scripts/get_cash_services.php",
                   dataType:"text",
                   data: myData,
                   success:function(response){
                       document.getElementById('result').innerHTML = "";
                       var result = JSON.parse(response);

                       result.forEach(function(element){
                           document.getElementById('result').innerHTML += '<tr class="product_card">' +
                               '<td>'+ element.name_bank + ' - ' + '<i>' + element.name_tariff + '</i><br>' +
                               '<img src="' + element.logo_bank + '" alt="" width = "125" height="125"' + '<br>' +
                                '<a style="font-size: 15px" data-toggle="collapse" data-target="#collapseExample' + element.id + '" aria-expanded="false" aria-controls="collapseExample">' +
                               'Подробности' +
                               '</a><div class="collapse"  id="collapseExample' + element.id + '">' +
                               element.details +
                               '</td>' +
                               '<td style="text-align: center; vertical-align: middle;">' + '<a title="element">' + element.subscription_fee + ' <i class="ion ion-ios-information-outline"></i></a></td>' +
                               '<td style="text-align: center; vertical-align: middle;">' + element.transfer_price + '</td>' +
                               '<td class="active" style="text-align: center; vertical-align: middle;">' + element.open_fee + '<br><button class=\"btn btn-success\" onclick=forward("' + element.logo_bank + '");> Подать заявку </button>' + '</td>' +
                               '</tr>';

                       });

                   },
                   error:function (xhr, ajaxOptions, thrownError){
                       document.getElementById('result').innerHTML = '<b>Ошибка!</b>';
                   }
               });
            }

        </script>

    </head>
    <body onload="get_cash_services(getUrlVars()['cashback'],getUrlVars()['transfer_price'],getUrlVars()['subscription_fee'],getUrlVars()['remote_banking_price'],getUrlVars()['cash_out'],1);">

    <div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style" style="right:0; top:150px;">
        <a class="a2a_button_facebook"></a>
        <a class="a2a_button_twitter"></a>
        <a class="a2a_button_google_plus"></a>
        <a class="a2a_button_reddit"></a>
        <a class="a2a_button_linkedin"></a>
    </div>
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
                    <a href="index.html" >
                        <img src="images/logo.png" alt="" height="25">
                    </a>
                </div>
            </div>
            <nav class="collapse navbar-collapse navbar-right" role="navigation">
                <div class="main-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle underline" data-toggle="dropdown">Банковское обслуживание <span class="caret"></span></a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a href="cash_service.php">РКО для бизнеса</a></li>
                                    <li><a href="gallery.html">Эквайринг</a></li>
                                    <li><a href="gallery.html">Зарплатный проект</a></li>
                                    <li><a href="gallery.html">Депозиты для бизнеса</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Кредитование <span class="caret"></span></a>
                            <div class="dropdown-menu multi-column columns-3">
                                <ul class="col-sm-4">
                                    <li><a href="404.html">Открытие бизнеса</a></li>
                                    <li><a href="gallery.html">Пополнение оборотного капитала</a></li>
                                    <li><a href="gallery.html">Коммерческая ипотека</a></li>
                                    <li><a href="404.html">Лизинг</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Страхование <span class="caret"></span></a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a href="404.html">Транспорт</a></li>
                                    <li><a href="gallery.html">Недвижимость</a></li>
                                    <li><a href="gallery.html">Другие виды</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Инвестирование<span class="caret"></span></a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a href="blog-fullwidth.html">Онлайн - брокеры</a></li>
                                    <li><a href="blog-left-sidebar.html">Венчурные фонды</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="contact.html">Войти</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="col-md-3 col-sm-3 scrollbox">
        <form>
            <div class="form-group">
                <div class="btn-group" data-toggle="buttons">
                    <label onclick="window.location='cash_service.php?transfer_price=1'" class="btn btn-info btn-block">
                        <input type="radio" name="options" id="option0" autocomplete="off"> Крупные суммы
                    </label>
                    <label onclick="window.location='cash_service.php?cash_out=1'" class="btn btn-info btn-block">
                        <input type="radio" name="options" id="option1" autocomplete="off"> Низкая комиссия
                    </label>
                    <label onclick="window.location='cash_service.php?cashback=1'" class="btn btn-info btn-block">
                        <input type="radio" name="options" id="option2" autocomplete="off"> Кэшбек
                    </label>
                    <label onclick="window.location='cash_service.php?subscription_fee=1'" class="btn btn-info btn-block">
                        <input type="radio" name="options" id="option3" autocomplete="off"> Без абонентской платы
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>
                    Абонентская плата
                </label>
                <select class="form-control">
                    <option>Выбор</option>
                </select>
            </div>
            <div class="form-group">
                <label>
                    Город
                </label>
                <input type="email" class="form-control" id="exampleInputEmail" placeholder="Введите город">
            </div>
            <div class="form-group">
                <label>
                    Абонентская плата
                </label>
                <select class="form-control">
                    <option>Выбор</option>
                </select>
            </div>
            <div class="form-group">
                <label>
                    Город
                </label>
                <input type="email" class="form-control" id="exampleInputEmail" placeholder="Введите город">
            </div>
            <div class="form-group">
                <label>
                    Абонентская плата
                </label>
                <select class="form-control">
                    <option>Выбор</option>
                </select>
            </div>
            <div class="form-group">
                <label>
                    Город
                </label>
                <input type="email" class="form-control" id="exampleInputEmail" placeholder="Введите город">
            </div>
            <div class="form-group">
                <label>
                    Абонентская плата
                </label>
                <select class="form-control">
                    <option>Выбор</option>
                </select>
            </div>
            <div class="form-group">
                <label>
                    Город
                </label>
                <input type="email" class="form-control" id="exampleInputEmail" placeholder="Введите город">
            </div>
            <div class="form-group">
                <label>
                    Абонентская плата
                </label>
                <select class="form-control">
                    <option>Выбор</option>
                </select>
            </div>
            <div class="form-group">
                <label>
                    Город
                </label>
                <input type="email" class="form-control" id="exampleInputEmail" placeholder="Введите город">
            </div>
            <div class="form-group">
                <label>
                    Абонентская плата
                </label>
                <select class="form-control">
                    <option>Выбор</option>
                </select>
            </div>
            <div class="form-group">
                <label>
                    Город
                </label>
                <input type="email" class="form-control" id="exampleInputEmail" placeholder="Введите город">
            </div>
            <div class="form-group">
                <label>
                    Абонентская плата
                </label>
                <select class="form-control">
                    <option>Выбор</option>
                </select>
            </div>

        </form>
    </div>
    <div class="col-md-9 col-sm-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="#" class="fill">Раскрытие информации</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9 top-offset">
                                <h1><strong>Рассчетно-кассовое обслуживание для бизнеса</strong></h1>
                                <p><i>Теперь стало гораздо проще подобрать качественное и надежное рассчетно-кассовое
                                        обслуживание для вашего бизнеса</i></p>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th class="col-sm-3 text-center active"><a href="?bank_name=1">Банк - тариф</a></th>
                <th class="col-sm-3 text-center active"><a href="?subscription_fee=1">Абонентская плата</a></th>
                <th class="col-sm-3 text-center active"><a href="?transfer_price=1">Плата за перевод</a></th>
                <th class="col-sm-3 text-center active"><a href="?transfer_price=1">Стоимость открытия</a></th>
            </tr>
            </thead>
            <tbody id="result" class="table-bordered"></tbody>
        </table>
        <nav aria-label="Page navigation ">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#" onclick="get_cash_services(0,0,0,0,0,0);">1</a></li>
                <li class="page-item"><a class="page-link" href="#" onclick="get_cash_services(0,0,0,0,0,3);">2</a></li>
                <li class="page-item"><a class="page-link" href="" onclick="get_cash_services(0,0,0,0,0,6);">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>

            <div class="container">

            </div>


        <footer id="footer">
            <div class="container copyright">
                <div class="col-md-8">
                    <div class="col-md-3">
                        <a href="banks.html">Банкам</a>
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

         </body>
     </html>