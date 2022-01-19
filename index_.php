<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kolors punto mx</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->


        <!-- BOOSTRAP-->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="/css/sweetalert2.min.css">
        <link rel="stylesheet" href="/css/normalize.css">
        <link rel="stylesheet" href="/css/jquery.mThumbnailScroller.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="/css/jquery.exzoom.css" rel="stylesheet">


        <?php if (isset($_GET['map'])) { ?>
            <!-- -------LEAFLET---->
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
            integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
            crossorigin=""/>
            <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
            integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
            crossorigin=""></script>
            <!---------LEAFLET---->
        <?php } ?>

        <link rel="stylesheet" href="/css/main.css">


    </head>
    <body>

      <div class="header contenedor">
        <div class="cabLogo">
            <img src="img/logo.png" alt="">
        </div>
      </div>

      <nav class="navPrin flex">

          <div class="navContenedor" id="navAzul">
              <div class="navMenu flex-center-center" menuCont="1">
                  <span>Kolors</span>
              </div><!--navMenu-->
              <div class="navCont">
                  <div class="navImg">
                      <img src="/img/azul.jpg" alt="">
                  </div><!--navImg-->
                  <div class="navInfo infoAzul">
                      <img src="/img/cuadrado.png" alt="">
                  </div><!--navInfo-->
              </div><!--navCont-->
          </div><!--navContenedor-->

          <div class="navContenedor" id="navRojo">
              <div class="navMenu flex-center-center" menuCont="2">
                  <span>Servicios</span>
              </div><!--navMenu-->
              <div class="navCont">
                  <div class="navImg">
                      <img src="/img/rojo.jpg" alt="">
                  </div><!--navImg-->
              </div><!--navCont-->
              <div class="navInfo infoRojo">
                  <img src="/img/cuadrado.png" alt="">
              </div>
          </div><!--navContenedor-->

          <div class="navContenedor" id="navAmarillo">
              <div class="navMenu flex-center-center" menuCont="3">
                  <span>SEO</span>
              </div><!--navMenu-->
              <div class="navCont">
                  <div class="navImg">
                      <img src="/img/amarillo.jpg" alt="">
                  </div><!--navImg-->
              </div><!--navCont-->
              <div class="navInfo infoAmarillo">
                  <img src="/img/cuadrado.png" alt="">
              </div><!--navInfo-->
          </div><!--navContenedor-->

          <div class="navContenedor" id="navVerde">
              <div class="navMenu flex-center-center" menuCont="4">
                  <span>Clientes</span>
              </div><!--navMenu-->
              <div class="navCont">
                  <div class="navImg">
                      <img src="/img/verde.jpg" alt="">
                  </div><!--navImg-->
              </div><!--navCont-->
              <div class="navInfo infoVerde">
                  <img src="/img/cuadrado.png" alt="">
              </div><!--navInfo-->
          </div><!--navContenedor-->

          <div class="navContenedor" id="navBW">
              <div class="navMenu flex-center-center" menuCont="5">
                  Contacto
              </div><!--navMenu-->
              <div class="navCont">
                  <div class="navImg">
                      <img src="/img/bw.jpg" alt="">
                  </div><!--navImg-->
              </div><!--navCont-->
              <div class="navInfo infoBW">
                  <img src="/img/cuadrado.png" alt="">
              </div><!--navInfo-->
          </div><!--navContenedor-->

      </nav><!--FLEX-->

      <div class="cerati">
          <img src="/img/cerati.jpg" alt="">
      </div>

      <!--AYUDA OBJETIVOS PARALAX-->
        <div class="ayudaObjetivos parallax">
            <div class="contenido">
              <div class="paralaxCont">
                <h4>No busques más...</h4>
                <p>Te ayudamos a cumplir tus objetivos con soluciones  electronicas o desarrollos web y nube</p>
              </div>
            </div><!--contenido-->
        </div><!--newsletter-->

        <div class="separadorUP">
          <h2>Servicios</h2>
        </div>

        <div class="serviciosPrin">
          <div class="servContenedor flex-spacebetween contenedor">
              <div class="servServicio">
                    <h3>Desarrollo Web</h3>
                    <ul>
                      <li>Diseños personalizados</li>
                      <li>Hosting y Dominio incluidos</li>
                      <li>Sitio Administrable</li>
                      <li>Plugins requeridos</li>
                      <li>Tienda Virtual</li>
                      <li>mucho más...</li>
                    </ul>
                    <a href="#">Más Información...</a>
              </div>
              <div class="servServicio">
                    <h3>SEO</h3>
                    <ul>
                      <li>Integración con Página web</li>
                      <li>Administración real</li>
                      <li>Campañas mensuales</li>
                      <li>Redes sociales a tu favor</li>
                      <li>Genera más tráfico en tu sitio web</li>
                      <li>mucho más...</li>
                    </ul>
                    <a href="#">Más Información...</a>
              </div>
              <div class="servServicio">
                    servicio3
              </div>
              <div class="servServicio">
                    servicio3
              </div>
          </div>
        </div>

        <div class="separadorDN">
          <a href="#">Conoce todos nuestros servicios...</a>
        </div>

      <footer class="column-center-center">
          <div class="footerCont contenedor flex">
              <div class="FooCont">
                <img class="logoF" src="/img/logo.png" alt="">
              </div>
              <div class="FooCont">
                  <a href="#">liga 1</a>
                  <a href="#">liga 2</a>
              </div>
              <div class="FooCont">
                  contacto@kolors.mx
              </div>
          </div>
          <div class="mixup">
              <?php include_once 'mixup.html'; ?>
          </div>
      </footer>
      <?php
        include_once 'mixup.html';
      ?>


      <script src="js/vendor/modernizr-2.8.3.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
      <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
      <!--BOOSTRAP-->
      <script src="/js/bootstrap.bundle.js"></script>
      <script src="/js/bootstrap.js"></script>
      <script src="/js/sweetalert2.min.js"></script>
      <script src="/js/plugins.js"></script>
      <?php if (isset($_GET['exzoom'])) { ?>
          <script src="/js/jquery.exzoom.js"></script>
          <script src="/js/exzoom.js"></script>
      <?php } ?>
      <?php if (isset($_GET['map'])) { ?>
          <script src="js/maps.js"></script>
      <?php } ?>
      <script src="/js/jquery.mThumbnailScroller.js"></script>
      <script src="/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!--
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
      -->
    </body>
</html>
