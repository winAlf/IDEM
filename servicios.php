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

                          <div class="paraNewData columnCenterCenter">
                                <p>Regístrese a nuestro boletín de noticias y reciba las ofertas exclusivas que mensualmente tenemos para usted.</p>
                                <div id="cabeSearch" class="cabeSearch">
                                      <form role="form" name="buscarProducto" id="buscarProducto" method="post" action="#" enctype="multipart/form-data">
                                          <div class="form-group">
                                            <button type="button" class="btn bg-orange btn-flat margin tienda" data-toggle="modal" data-target="#modalMailchimp">suscríbete</button>
                                          </div>
                                      </form>
                                </div>
                          </div>
                    </div><!--paraNewCont-->

            </div><!--paralaxCont-->
      </div><!--contenido-->
  </div><!--newsletter-->

  <!-- Modal -->
  <div class="modal fade" id="modalMailchimp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content modal-content-Mailchimp">
        <div class="modal-header modalMailchimpHeader">
          <img src="/img/fondoProd.png" alt="">
          <button type="button" class="close rowCenterCenter" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body modal-body-prod">
          <h2>Boletin de Noticias</h2>
          <hr>

              <!-- Begin Mailchimp Signup Form -->
              <div id="mc_embed_signup">
                <form action="https://idemsecure.us3.list-manage.com/subscribe/post?u=92536221f24210b0808f2d9d2&amp;id=a666736f06" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                  <div id="mc_embed_signup_scroll">

                    <div class="textoMailchimp">
                      <p>Llene el formulario para recibir noticias y ofertas exclusivas<br>Su información está segura con nosotros, para más información consulte nuestro <a href="/politicaP.php" target="_blank">aviso de privacidad</a></p>
                    </div>
                    <div class="form-group contFormMailchimp">
                        <div class="input-group">
                            <span class="input-group-addon rowCenterCenter"><i class="fas fa-envelope-open-text"></i> <span class="asterisk">*</span></span>
                            <input type="email" class="required email inputMailchimp" id="mce-EMAIL" name="EMAIL" placeholder="Correo Electrónico" required="required">
                        </div>
                    </div>
                    <div class="form-group contFormMailchimp">
                        <div class="input-group">
                            <span class="input-group-addon rowCenterCenter"><i class="fas fa-mobile-alt"></i></span>
                            <input type="text" class="required email inputMailchimp" id="mc-PHONE" name="PHONE" placeholder="Número de Teléfono" required="required">
                        </div>
                    </div>
                    <div class="form-group contFormMailchimp">
                        <div class="input-group">
                            <span class="input-group-addon rowCenterCenter"><i class="fas fa-user"></i></span>
                            <input type="text" class="required email inputMailchimp" id="mce-FNAME" name="FNAME" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-group contFormMailchimp">
                        <div class="input-group">
                            <span class="input-group-addon rowCenterCenter"><i class="fas fa-user"></i></span>
                            <input type="text" class="required email inputMailchimp" id="mce-LNAME" name="LNAME" placeholder="Apellido">
                        </div>
                    </div>
                    <div class="contCumpleMailChimp flex">
                        <div class="mailChimpCumpleanos columnReverse">
                            <p>Cumpleaños:<br><span>(Utilice sólo numeros)</span></p>
                        </div>
                        <div class="form-group contFormMailchimp">
                            <div class="input-group">
                                <span class="input-group-addon rowCenterCenter"><i class="fas fa-birthday-cake"></i></span>
                                <input class="birthday " type="text" pattern="[0-9]*" value="" placeholder="Mes" size="2" maxlength="2" name="BIRTHDAY[month]" id="mce-BIRTHDAY-month">
                                <input class="birthday " type="text" pattern="[0-9]*" value="" placeholder="Día" size="2" maxlength="2" name="BIRTHDAY[day]" id="mce-BIRTHDAY-day">
                            </div>
                        </div>
                    </div>

                    <div class="mailChimpCumpleanos columnReverse">
                        <p>*<span> indica que es requerido</span></p>
                    </div>
                    <div class="indicates-required"></div>
                    <div id="mce-responses" class="clear">
                      <div class="response" id="mce-error-response" style="display:none"></div>
                      <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_92536221f24210b0808f2d9d2_a666736f06" tabindex="-1" value=""></div>
                    <div class="clear submitMailchimp">
                          <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                          <input type="button" value="Cerrar" name="Cerrar" data-dismiss="modal" class="button">
                    </div>

                  </div>
                </form>
              </div>

              <!--End mc_embed_signup-->


        </div>
      </div>
    </div>
  </div>


  <!--MARCAS-->
  <div class="barraMarcas">
        <div class="contenedor">
          <div class="secConTitProd">
              <p>Busca tus productos por marca</p>
          </div>
        </div>

      <div class="barraMarCont contenedor spacearound-wrap">

        <?php
           try {
             $sql = "SELECT * FROM marcas WHERE marca_activo = 1";
             $marcas = $conn->query($sql);
           } catch (Exception $e) {
             $error = $e->getMessage();
             echo $error;
           }
           while ($marca = $marcas->fetch_assoc()) { ?>
                <div class="barramarmar rowCenterCenter">
                  <a href="catalogo.php?sel=3&idMarca=<?php echo $marca['idmarca']; ?>"><img src="img/marcas/<?php echo $marca['marca_imagen']; ?>" alt=""></a>
                </div>
            <?php } ?>

      </div>
  </div>

<?php include_once '_includes/_templates/_footer.php'; ?>
