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

        <script async type="text/javascript">
            $( document ).ready(function() {
                var filter = document.getElementsByClassName("scrollbox");
                filter.style.height = $( window ).height();
            });

           function get_cash_services(cashback, transfer_price, subscription_fee, remote_banking_price, withdrawal_commission){

               var id = location.search.split('id=')[1];

               var myData={
                   id: id,
                   cashback: cashback,
                   transfer_price: transfer_price,
                   subscription_fee: subscription_fee,
                   remote_banking_price: remote_banking_price,
                   withdrawal_commission: withdrawal_commission
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
                           document.getElementById('result').innerHTML += '<tr style=\'height: 100px\'>' +
                               '<td>'+ element.name_bank + '<br>' +
                               '<a style="cursor: pointer" data-toggle="collapse" data-target="#collapseExample' + element.id + '" aria-expanded="false" aria-controls="collapseExample">' +
                               'Подробности' +
                               '</a><div class="collapse"  id="collapseExample' + element.id + '">' +
                               '<div class="card card-block">' +
                               'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus <br> terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes <br>anderson cred nesciunt sapiente ea proident.' +
                               '</div>' +
                               '</td>' +
                               '<td>' + element.subscription_fee + '</td>' +
                               '<td>' + element.transfer_price + '</td>' +
                               '<td>' + '0 руб.' + '<br><button class=\"btn btn-success\"> Подать заявку </button>' + '</td>' +
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
    <body onload="get_cash_services(0,0,0,0,0);">
        <header id="top-bar" class="navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand">
                        <a href="index.html" >
                            <img src="images/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <div class="main-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="index.html" >Home</a>
                            </li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="service.html">Service</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="caret"></span></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a href="404.html">404 Page</a></li>
                                        <li><a href="gallery.html">Gallery</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <span class="caret"></span></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a href="blog-fullwidth.html">Blog Full</a></li>
                                        <li><a href="blog-left-sidebar.html">Blog Left sidebar</a></li>
                                        <li><a href="blog-right-sidebar.html">Blog Right sidebar</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <section class="global-page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="#" class="fill">РКО для бизнеса</a>
                                </div>
                                <div class="col-md-3">
                                    <a href="">Эквайринг</a>
                                </div>
                                <div class="col-md-3">
                                    <a href="">Зарплатный проект</a>
                                </div>
                                <div class="col-md-3">
                                    <a href="">Депозиты для бизнеса</a>
                                </div>
                            </div>
                            <h2>Рассчетно-кассовое обслуживание для бизнеса</h2>
                            <p>Теперь стало гораздо проще подобрать качественное и надежное рассчетно-кассовое обслуживание для вашего бизнеса</p>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 scrollbox">
                        <form>
                            <div class="form-group">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-primary col-md-12">
                                        <input type="radio" name="options" id="option1" autocomplete="off" onchange="get_cash_services(0,0,0,0,1);"> Крупные суммы
                                    </label>
                                    <label class="btn btn-primary col-md-12">
                                        <input type="radio" name="options" id="option2" autocomplete="off" onchange="get_cash_services(0,1,0,0,0);"> Частые платежи
                                    </label>
                                    <label class="btn btn-primary col-md-12">
                                        <input type="radio" name="options" id="option3" autocomplete="off" onchange="get_cash_services(1,0,0,0,0);"> Кэшбек
                                    </label>
                                    <label class="btn btn-primary col-md-12">
                                        <input type="radio" name="options" id="option4" autocomplete="off" onchange="get_cash_services(0,0,1,0,0);"> Без абонентской платы
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
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th class="col-sm-3"><a href="?bank_name=1">Банк</a></th>
                                <th class="col-sm-3"><a href="?subscription_fee=1">Абонентская плата</a></th>
                                <th class="col-sm-3"><a href="?transfer_price=1">Плата за перевод</a></th>
                                <th class="col-sm-3"><a href="?transfer_price=1">Стоимость открытия</a></th>
                            </tr>
                            </thead>
                            <tbody id="result" class="table-bordered"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <section id="blog-full-width">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                     </div>
                 </div>
             </div>
         </section>

         <footer id="footer">
             <div class="container">
                 <div class="col-md-8">
                     <p class="copyright">Copyright: <span>2015</span> . Design and Developed by <a href="http://www.Themefisher.com">Themefisher</a></p>
                 </div>
                 <div class="col-md-4">
                     <ul class="social">
                         <li>
                             <a href="#" class="Facebook">
                                 <i class="ion-social-facebook"></i>
                             </a>
                         </li>
                         <li>
                             <a href="#" class="Twitter">
                                 <i class="ion-social-twitter"></i>
                             </a>
                         </li>
                         <li>
                             <a href="#" class="Linkedin">
                                 <i class="ion-social-linkedin"></i>
                             </a>
                         </li>
                         <li>
                             <a href="#" class="Google Plus">
                                 <i class="ion-social-googleplus"></i>
                             </a>
                         </li>

                     </ul>
                 </div>
             </div>
             </footer> <!-- /#footer -->

    <script>

    </script>

         </body>
     </html>