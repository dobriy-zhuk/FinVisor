<!DOCTYPE html>
<html class="no-js">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" type="image/png" href="../images/favicon.png">
        <title>Конкурсы на получение инвестиций и грантов для малого и среднего бизнеса</title>
        <meta name="description" content="Все финансовые конкурсы на получение инвестиций и грантов для малого и среднего бизнеса">
        <meta name="keywords" content="венчрные фонды, финансирование, для бизнеса, гранты, инвестиции, инвесторы">
        <meta name="author" content="">

        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
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


                var city_contest = $("#city_contest" ).val();
                var directions = $("#directions" ).val();
                var volume = $("#volume" ).val();

                window.history.replaceState({}, "", updateQueryStringParameter(window.location.href,"city_contest",city_contest));
                window.history.replaceState({}, "", updateQueryStringParameter(window.location.href,"directions",directions));
                window.history.replaceState({}, "", updateQueryStringParameter(window.location.href,"volume",volume));

                get_contest();

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

           function get_contest(){

               var myData={
                   city_contest: getUrlVars()['city_contest'],
                   directions: getUrlVars()['directions'],
                   volume: getUrlVars()['volume']
               };

               jQuery.ajax({
                   type: "GET",
                   url: "../scripts/get_contest.php",
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
                               '<td style="text-align: center; vertical-align: middle;">' + element.date_begin + ' - ' + element.date_end + '</td>' +
                               '<td style="text-align: center; vertical-align: middle;">' + element.directions + '</td>' +
                               '<td class="active" style="text-align: center; vertical-align: middle;">' + element.volume + '<br><button class=\"btn btn-success\" onclick="forward(\'' + element.id + '\',\'' + element.name_institution + '\')"> Подать заявку фонд</button>' + '</td>' +
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

        </script>

    </head>
    <body onload="get_contest()">
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
                            <a href="../finance/cash_service.php" class="dropdown-toggle" data-toggle="dropdown">Банковской обслуживание <b class="caret"></b></a>
                            <div class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Обзоры</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/top-finance/top-cash-service.html">Лучшие РКО 2017</a></li>
                                            <li><a href="../blog/top-finance/top-acquiring.html">Топ эквайрингов 2017</a></li>
                                            <li><a href="../blog/top-finance/top-deposits.html">Топ депозитов для бизнеса 2017</a></li>
                                            <li><a href="../blog/top-finance/top-currency.html">Топ валютный контроль 2017</a></li>
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
                            <a href="../credit/credit.php" class="dropdown-toggle" data-toggle="dropdown">Кредитование<b class="caret"></b></a>
                            <div class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Обзоры</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/top-credit/top-credit-open.html">Топ на открытие бизнеса 2017</a></li>
                                            <li><a href="../blog/top-credit/top-credit-additional.html">Топ кредитов на пополнение капитала</a></li>
                                            <li><a href="../blog/top-credit/top-leasing.html">Топ лизинг автотранспорта 2017</a></li>
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
                                            <li><a href="../blog/credit/get-credit.html">Как получить банковский кредит?</a></li>
                                            <li><a href="../blog/credit/credit-open-business.html">Деньги на открытие бизнеса</a></li>
                                            <li><a href="../blog/credit/credit-documents.html">Документы на получение кредита</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="../insurance/insurance_complex.php" class="dropdown-toggle" data-toggle="dropdown">Страхование <b class="caret"></b></a>
                            <div class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Обзоры</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/top-insurance/top-realty.html">Топ страхования недвижимости</a></li>
                                            <li><a href="../blog/top-insurance/top-transport.html">Топ страхования транспорта</a></li>
                                            <li><a href="../blog/top-insurance/top-finance.html">Топ страхования финансовой деятельности</a></li>
                                            <li><a href="../blog/top-insurance/top-liability.html">Топ страхования ответственности</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Сравнение</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../insurance/insurance_realty.php">Недвижимость</a></li>
                                            <li><a href="../insurance/insurance_transport.php">Автотранспорт</a></li>
                                            <li><a href="../insurance/insurance_finance.php">Финансовая деятельность</a></li>
                                            <li><a href="../insurance/insurance_complex.php">Комплексное страхование</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Рекомендации</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/insurance/choose-insurance.html">Как выбрать оптимальную страховку?</a></li>
                                            <li><a href="../blog/insurance/liability-insurance.html">Страхование ответственности</a></li>
                                            <li><a href="../blog/insurance/property-insurance.html">Страхование недвижимости</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="../investing/funds.php" class="dropdown-toggle" data-toggle="dropdown">Инвестиции <b class="caret"></b></a>
                            <div class="dropdown-menu multi-column columns-3" style="">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Обзоры</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/top-investment/top-venture.html">Топ венчурных фондов 2017</a></li>
                                            <li><a href="../blog/top-investment/top-brokers.html">Топ онлайн-брокеров 2017</a></li>
                                            <li><a href="../blog/top-investment/top-contest.html">Топ финансовых конкурсов 2017</a></li>
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
                                            <li><a href="../blog/investing/financial-statement.html">Как построить финансовую модель?</a></li>
                                            <li><a href="../blog/investing/prepare-pitch.html">Готовим питч</a></li>
                                            <li><a href="../blog/investing/investing-presentation.html">Как создать презентацию для инвестора?</a></li>
                                            <li><a href="../blog/investing/company-value.html">Оценка стоимости компании</a></li>
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
                          <h1><strong>Конкурсы на получение грантов и инвестиций для малого и среднего бизнеса</strong></h1>
                          <p><i>Подавайте заявки на участие в конкурс на получение инвестиций и грантов</i></p>
                       </div>
                   </div>
                           <form onchange="changed_form()">
                               <div class="container">
                                   <div class="row">
                                       <div class="col-xs-4">
                                           <div class="form-group">
                                               <label for="city_contest">Город проведения</label>
                                               <select id="city_contest" class="selectpicker form-control">
                                                   <option value="Moscow">Москва</option>
                                                   <option value="Saint-Petersburg">Санкт-Петербург</option>
                                               </select>
                                           </div>
                                       </div>
                                       <div class="col-xs-4">
                                           <div class="form-group">
                                               <label for="directions">Конкурсные направления</label>
                                               <select id="directions" class="selectpicker form-control">
                                                   <option value="IT">IT</option>
                                                   <option value="Bio">Bio</option>
                                                   <option value="Apps">Apps</option>
                                               </select>
                                           </div>
                                       </div>
                                       <div class="col-xs-4">
                                           <div class="form-group">
                                               <label for="volume">Объем конкурса</label>
                                               <select id="volume" class="selectpicker form-control">
                                                   <option value="0">Любой</option>
                                                   <option value="100000">От 100 тыс. руб.</option>
                                                   <option value="1000000">От 1 млн. руб.</option>
                                                   <option value="10000000" selected>От 10 млн. руб.</option>
                                               </select>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </form>
                       </div>
                    </div>
            </div>

    <div class="col-md-12">
        <table class="table">
            <thead>
            <tr>
                <th class="col-sm-3 text-center active"><a href="">Наименование конкурса</a></th>
                <th class="col-sm-3 text-center active"><a href="">Даты проведения</a></th>
                <th class="col-sm-3 text-center active"><a href="">Направленность конкурса</a></th>
                <th class="col-sm-3 text-center active"><a href="">Объем финансирования</a></th>
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

    <section id="blog-full-width">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
                        <div class="blog-content">
                            <h2 class="blogpost-title">
                                <a href="post-fullwidth.html">Как подготовить презентацию для участия в конкурсе?</a>
                            </h2>
                            <p>Ultrices posuere cubilia curae curabitur sit amet tortor ut massa commodo. Vestibulum consectetur euismod malesuada tincidunt cum. Sed ullamcorper dignissim consectetur ut tincidunt eros sed sapien consectetur dictum. Pellentesques sed volutpat ante, cursus port. Praesent mi magna, penatibus et magniseget dis parturient montes sed quia consequuntur magni dolores eos qui ratione.
                            </p>
                            <a href="../single-post.html" class="btn btn-dafault btn-details">Continue Reading</a>
                        </div>

                    </article>
                </div>
        </div>
    </section>

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

         </body>
     </html>