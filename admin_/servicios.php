<?php
include_once '_includes/_funciones/bd_conexion.php';
include_once '_includes/_templates/_doctype.php';
include_once '_includes/_templates/_header.php';
include_once '_includes/_templates/_barraPrin.php';
?>

<article class="articleContPrin">
  <div id="arConPrinCont" class="arConPrinCont contenedor columnReverse">

      <aside class="asideContPrin">
              <div class="asideContPrinNav">

                  <?php include '_includes/_templates/_navegacionFull.php'; ?>

              </div><!--asideContPrinNav-->

      </aside><!--asideContPrin-->

      <section class="sectonContPrin">
        <div class="sectonContPrinCont">
            <!--
            <div class="sectonContBanner">
                    <img class="idemImgPrin" src="img/nosotrosPrin.jpg" alt="Imagen principal Nosotros">
            </div><!--sectonContBanner-->

            <div class="idemServicios">
              <img src="img/servicios.jpg" alt="Imagen principal IdemSecure">
              <div class="idemServCont">
                  <h1>SERVICIOS</h1>
                  <p>En Idem Secure tenemos la solución de acuerdo a sus necesidades. Nos esmeramos por estar siempre a la vanguardia tecnológica y brindamos el mejor servicio.  Nuestro gran inventario nos permite ofrecer  productos para entrega inmediata y los mejores precios  del mercado.</p>
              </div>
            </div>

        </div><!--sectonContPrinCont-->



        <!-- ****************SERVICIOS*******************  -->
        <?php
           try {
             $sqlC = "SELECT * FROM servcat WHERE servCatActivo = 1";
             $categorias = $conn->query($sqlC);
           } catch (Exception $e) {
             $error = $e->getMessage();
             echo $error;
           }
           while ($categoria = $categorias->fetch_assoc()) {
                      $idServCat = $categoria['idServCat']?>
                      <div class="secConTitProd">
                          <p><?php echo $categoria['servCategoria']; ?></p>
                      </div>
                      <div class="secConValores spaceBetweenWrap">
                      <?php
                          try {
                            $sqlS = "SELECT * FROM servicios WHERE servCatID = $idServCat AND servActivo = 1";
                            $servicios = $conn->query($sqlS);
                          } catch (Exception $e) {
                            $error = $e->getMessage();
                            echo $error;
                          }
                          while ($servicio = $servicios->fetch_assoc()) {
                       ?>

                              <div class="secConValor secConServicios columnCenterCenter">
                                <i class="<?php echo $servicio['servIco']; ?>"></i>
                                <h1><?php echo $servicio['servicio']; ?></h1>
                                <p><?php echo $servicio['servDesc']; ?></p>
                              </div><!-- secConProducto  -->


                      <?php } ?><!--while $servicio-->
                      </div><!--secConValores-->
              <?php } ?><!--while $categoria-->

        <!--***************FIN SERVICIOS*******************-->

      </section><!--sectonContPrin-->

  </div>
</article>

<!--NEWSLETTER PARALAX-->
  <div class="paraNews parallax">
      <div class="contenido contenedor">
            <div class="paralaxCont">

                    <div class="paraNewTit">
                          <h2>BOLETÍN INFORMATIVO</h2>
                    </div><!--paraNewTit-->
                    <div class="paraNewCont rowCenterCenter">
                          <div class="paraNewIco">
                            <img src="img/news.png" alt="">
                          </div>
                          <div class="paraNewReg">
                            <p>Regístrese para nuestro boletín de noticias y reciba ofertas atractivas mediante la suscripción a nuestros boletines.</p>
                            <form class="" action="index.html" method="post">
                              <input type="text" name="" value="">
                              <a href="#">suscríbete</a>
                            </form>
                          </div>
                    </div><!--paraNewCont-->

            </div><!--paralaxCont-->
      </div><!--contenido-->
  </div><!--newsletter-->


<!--MARCAS-->
<div class="barraMarcas">
      <div class="contenedor">
        <div class="secConTitProd">
            <p>Busca tus productos por marca</p>
        </div>
      </div>

    <div class="barraMarCont contenedor spaceBetweenWrap">
          <div class="barramarmar">
            <img src="img/marcas/canon.jpg" alt="">
          </div>
          <div class="barramarmar">
            <img src="img/marcas/datacard.jpg" alt="">
          </div>
          <div class="barramarmar">
            <img src="img/marcas/hp.jpg" alt="">
          </div>
          <div class="barramarmar">
            <img src="img/marcas/fargo.jpg" alt="">
          </div>
          <div class="barramarmar">
            <img src="img/marcas/matica.jpg" alt="">
          </div>
          <div class="barramarmar">
            <img src="img/marcas/brother.jpg" alt="">
          </div>
          <div class="barramarmar">
            <img src="img/marcas/epson.jpg" alt="">
          </div>
          <div class="barramarmar">
            <img src="img/marcas/zebra.jpg" alt="">
          </div>
          <div class="barramarmar">
            <img src="img/marcas/magicard.jpg" alt="">
          </div>
          <div class="barramarmar">
            <img src="img/marcas/evolis.jpg" alt="">
          </div>

    </div>
</div>

<?php include_once '_includes/_templates/_footer.php'; ?>
