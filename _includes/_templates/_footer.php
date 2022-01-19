<!----FOOTER----->
<footer>
  <div class="footerCont contenedor spaceBetweenWrap">
    <div class="footCol">
      <h2><span>id</span>em Secure </h2><br>
      <p>Asociación de la palabra latina<span> IDEM</span> (Identidad), y la palabra inglesa <span>Security</span> (Seguridad), creando la construcción discursiva para el concepto de <span>Identidad Segura</span></p>
      <br>
      <a href="politicaP.php">Política de Privacidad</a>
    </div>
    <div class="footCol">
      <h2>Datos de Contacto</h2>
      <div class="footConDir">

          <div class="footConDirDir rowCenterCenter">
                <div class="conSerBoxIco">
                        <p><i class="fas fa-globe-americas"></i></p>
                </div><!--conSerBoxIco-->
                <div class="conSerBoxAll">
                        <p>Rosa Blanca 176, Dep 1<br>Molino de Rosas, C.P.: 01470<br>Álvaro Obregón,  Ciudad de México<br>CDMX, México.</p>
                </div><!--conSerBoxIco-->
          </div><!--conSerBoxDir-->
          <div class="footConDirDir rowCenterCenter">
                <div class="conSerBoxIco">
                        <p><i class="fas fa-phone-square"></i></i></p>
                </div><!--conSerBoxIco-->
                <div class="conSerBoxAll">
                        <p>7593 7040<br>8718 9595 al 98</p>
                </div><!--conSerBoxAll-->
          </div><!--conSerBoxDir-->
          <div class="footSocial">
            <a href="https://www.youtube.com/channel/UC36mzWTJAvLTi2ZIx0gayFg?view_as=subscriber" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="https://www.facebook.com/idemsecuremexico/" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/Idem_Secure" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com/idemsecure/" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/feed/?trk=guest_homepage-basic_nav-header-signin" target="_blank"><i class="fab fa-linkedin-in"></i></a>
          </div><!--footSocial-->
          <div class="">
            <!-- mibew button --><a id="mibew-agent-button" href="/mibew/chat?locale=es" target="_blank" onclick="Mibew.Objects.ChatPopups['5d0031d0ccc53a90'].open();return false;"><img src="/mibew/b?i=mblue&amp;lang=es" border="0" alt="" /></a><script type="text/javascript" src="/mibew/js/compiled/chat_popup.js"></script><script type="text/javascript">Mibew.ChatPopup.init({"id":"5d0031d0ccc53a90","url":"\/mibew\/chat?locale=es","preferIFrame":true,"modSecurity":false,"forceSecure":false,"style":"","width":640,"height":480,"resizable":true,"styleLoader":"\/mibew\/chat\/style\/popup"});</script><!-- / mibew button -->
          </div>

      </div><!--footConDir-->
    </div><!--footCol-->
    <div class="footCol">
      <h2>Últimos Tweets</h2>
      <a class="twitter-timeline" data-height="400" href="https://twitter.com/Idem_Secure?ref_src=twsrc%5Etfw">Tweets by Idem_Secure</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div><!--footCol-->
  </div>
</footer>
<div class="postFooter">

</div>
<?php $conn->close(); ?>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <!--BOOSTRAP-->
        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/sweetalert2.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/jquery.mThumbnailScroller.js"></script>
        <?php if (isset($_GET['exzoom'])) { ?>
            <script src="js/jquery.exzoom.js"></script>
            <script src="js/exzoom.js"></script>
        <?php } ?>
        <?php if (isset($_GET['map'])) { ?>
            <script src="js/maps.js"></script>
        <?php } ?>

        <script src="js/scripts.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
