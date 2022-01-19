<body>

  <nav class="navPrin">
      <div class="navContenedor contenedor spaceBetweenCenter">

            <div id="nhResponsiveBtn" class="nhResponsiveBtn">
                <a href="#" id="btnRespDnIdem" class="nhBtnResp"><i class="fas fa-bars"></i></a>
                <a href="#" class="nhBtnResp btnRespClose"><i class="far fa-window-close"></i></a>
            </div><!--nhResponsiveBtn-->

            <div class="nhLogo">
                <a href="/home.php"><img src="img/navIcono.png" alt=""></a>
            </div><!--nhLogo-->

            <div id="nhResponsiveShop" class="nhResponsiveBtn">
                  <a href="#" id="btnRespDnShop" class="nhBtnResp"><i class="fas fa-shopping-bag"></i></a>
                  <a href="#" class="nhBtnResp btnRespClose"><i class="far fa-window-close"></i></a>
            </div><!--nhResponsiveShop-->

            <div id="respNavIdem" class="respNavIdem">

                    <div id='navMenu' class="navMenu">
                        <a href="idemsecure.php">Nosotros</a>
                        <a href="servicios.php">Servicios</a>
                        <a href="contacto.php?map=1">Contacto</a>
                    </div><!--navMenu-->

                    <div id="navSociales" class="navSociales">
                        <a href="https://www.youtube.com/channel/UC36mzWTJAvLTi2ZIx0gayFg?view_as=subscriber" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.facebook.com/idemsecuremexico/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/Idem_Secure" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/idemsecure/" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/feed/?trk=guest_homepage-basic_nav-header-signin" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div><!--navSociales-->

            </div><!--respNavIdem-->

      </div><!--navContenedor-->

      <div id="respNamShop" class="respNamShop">

            <?php include_once '_navegacion.php'; ?>

      </div>
  </nav><!--navPrin-->


  <!--- *****************CABEZAL (HEADER)*****************-->
  <header class="headerCabezal">
      <div id="heCabContenedor" class="heCabContenedor contenedor">
            <div class="heCaLogo">
                <img src="img/logoBig.png" alt="Logo Principal">
            </div>
            <div class="heCaShpo">
                  <div id="cabeSearch" class="cabeSearch">
                    <form role="form" name="buscarProducto" id="buscarProducto" method="post" action="catalogo.php" enctype="multipart/form-data">
                        <div class="form-group">
                          <input type="text" name="prodMod" class="form-control prodMod" id="cliente" placeholder="Buscar producto por modelo">
                          <input type="hidden" name="sel" value="4">
                          <button class="buscarProdBtn" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                  </div>
            </div>
      </div>
  </header>
