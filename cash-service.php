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
           function get_cash_services(){

               var id = location.search.split('id=')[1];
               var subscription_fee = location.search.split('subscription_fee=')[1];

               var myData={
                   id: id,
                   subscription_fee: subscription_fee
               };

               jQuery.ajax({
                   type: "GET",
                   url: "scripts/get_cash_services.php",
                   dataType:"text",
                   data: myData,
                   success:function(response){
                       var result = JSON.parse(response);

                       result.forEach(function(element){

                           document.getElementById('result').innerHTML += '<tr style=\'height: 100px\'>' +
                               '<th scope="row">' + element.id + '</th>' +
                               '<td>'+ element.name_bank + '<br>' +
                               '<a data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">' +
                               'Button with data-target' +
                               '</button><div class="collapse" id="collapseExample">' +
                               '<div class="card card-block">' +
                               'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.' +
                               '</div>' +
                               '</td>' +
                               '<td>' + element.name_tariff + '</td>' +
                               '<td>' + element.subscription_fee + '</td>' +
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
    <body onload="get_cash_services();">
        <header id="top-bar" class="navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->
                    
                    <!-- logo -->
                    <div class="navbar-brand">
                        <a href="index.html" >
                            <img src="images/logo.png" alt="">
                        </a>
                    </div>
                    <!-- /logo -->
                </div>
                <!-- main menu -->
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
                            <h2>Full Width Blog</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.html">
                                        <i class="ion-ios-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="active">Blog</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            </section>

            <div class="container">
                <div class="row">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Банк</th>
                            <th>Тариф</th>
                            <th>Абонентская плата</th>
                        </tr>
                        </thead>
                        <tbody id="result">

                        <?php

                            /*include_once('scripts/Finvision.php');

                            if(!empty($_GET["param"])) echo $_GET["param"];

                            $obj = new CashServices();
                            $obj->displayParam();
*/
                        ?>

                        </tbody>

                    </table>
                </div>
            </div>
            <section id="blog-full-width">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
                                <div class="blog-post-image">
                                    <a href="post-fullwidth.html"><img class="img-responsive" src="images/blog/post-1.jpg" alt="" /></a>
                                </div>
                                <div class="blog-content">
                                    <h2 class="blogpost-title">
                                    <a href="post-fullwidth.html">

                                            Space shouldn’t be the final frontier</a>
                                 </h2>

                                 <div class="blog-meta">
                                     <span>Dec 11, 2020</span>
                                     <span>by <a href="">Admin</a></span>
                                     <span><a href="">business</a>,<a href="">people</a></span>
                                 </div>
                                 <p>Ultrices posuere cubilia curae curabitur sit amet tortor ut massa commodo. Vestibulum consectetur euismod malesuada tincidunt cum. Sed ullamcorper dignissim consectetur ut tincidunt eros sed sapien consectetur dictum. Pellentesques sed volutpat ante, cursus port. Praesent mi magna, penatibus et magniseget dis parturient montes sed quia consequuntur magni dolores eos qui ratione.
                                 </p>
                                 <a href="single-post.html" class="btn btn-dafault btn-details">Continue Reading</a>
                             </div>

                         </article>
                         <article class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">
                             <div class="blog-post-image">
                                 <a href="post-fullwidth.html"><img class="img-responsive" src="images/blog/post-2.jpg" alt="" /></a>
                             </div>
                             <div class="blog-content">
                                 <h2 class="blogpost-title">
                                 <a href="post-fullwidth.html">Space shouldn’t be the final frontier</a>
                                 </h2>
                                 <div class="blog-meta">
                                     <span>Dec 11, 2020</span>
                                     <span>by <a href="">Admin</a></span>
                                     <span><a href="">business</a>,<a href="">people</a></span>
                                 </div>
                                 <p>Ultrices posuere cubilia curae curabitur sit amet tortor ut massa commodo. Vestibulum consectetur euismod malesuada tincidunt cum. Sed ullamcorper dignissim consectetur ut tincidunt eros sed sapien consectetur dictum. Pellentesques sed volutpat ante, cursus port. Praesent mi magna, penatibus et magniseget dis parturient montes sed quia consequuntur magni dolores eos qui ratione.
                                 </p>
                                 <a href="single-post.html" class="btn btn-dafault btn-details">Continue Reading</a>
                             </div>

                         </article>
                         <article class="wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">
                             <div class="blog-post-image">
                                 <a href="post-fullwidth.html"><img class="img-responsive" src="images/blog/post-3.jpg" alt="" /></a>
                             </div>
                             <div class="blog-content">
                                 <h2 class="blogpost-title">
                                 <a href="post-fullwidth.html">Space shouldn’t be the final frontier</a>
                                 </h2>
                                 <div class="blog-meta">
                                     <span>Dec 11, 2020</span>
                                     <span>by <a href="">Admin</a></span>
                                     <span><a href="">business</a>,<a href="">people</a></span>
                                 </div>
                                 <p>Ultrices posuere cubilia curae curabitur sit amet tortor ut massa commodo. Vestibulum consectetur euismod malesuada tincidunt cum. Sed ullamcorper dignissim consectetur ut tincidunt eros sed sapien consectetur dictum. Pellentesques sed volutpat ante, cursus port. Praesent mi magna, penatibus et magniseget dis parturient montes sed quia consequuntur magni dolores eos qui ratione.
                                 </p>
                                 <a href="single-post.html" class="btn btn-dafault btn-details">Continue Reading</a>
                             </div>

                         </article>
                     </div>
                 </div>
             </div>
         </section>
         <!--
         ==================================================
         Call To Action Section Start
         ================================================== -->
         <section id="call-to-action">
             <div class="container">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="block">
                             <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="300ms">SO WHAT YOU THINK ?</h2>
                             <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="300ms">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis,<br>possimus commodi, fugiat magnam temporibus vero magni recusandae? Dolore, maxime praesentium.</p>
                             <a href="contact.html" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="300ms">Contact With Me</a>
                         </div>
                     </div>

                 </div>
             </div>
         </section>
         <!--
         ==================================================
         Footer Section Start
         ================================================== -->
         <footer id="footer">
             <div class="container">
                 <div class="col-md-8">
                     <p class="copyright">Copyright: <span>2015</span> . Design and Developed by <a href="http://www.Themefisher.com">Themefisher</a></p>
                 </div>
                 <div class="col-md-4">
                     <!-- Social Media -->
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

         </body>
     </html>