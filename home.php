<?php
include_once '_includes/_funciones/bd_conexion.php';
include_once '_includes/_templates/_doctype.php';
include_once '_includes/_templates/_header.php';
include_once '_includes/_templates/_barraPrin.php';
?>

<article class="articleContPrin">
  <div id="arConPrinCont" class="arConPrinCont contenedor columnReverse">

      <aside class="asideContPrin">

                  <?php include '_includes/_templates/_navegacionFull.php'; ?>

      </aside><!--asideContPrin-->

      <section class="sectonContPrin">
        <div class="sectonContPrinCont">

            <div class="sectonContBanner">

                    <!--**************
                    **slideshow*******
                    *************---->
                    <div id="slideShow" class="slideShow"><!--nivel uno-->
                      <div id="diapositivas" class="diapositivas">

                        <?php
                           try {
                             $sql = "SELECT * FROM banner WHERE activo = 1 ORDER BY orden";
                             $banners = $conn->query($sql);
                           } catch (Exception $e) {
                             $error = $e->getMessage();
                             echo $error;
                           }
                           while ($banner = $banners->fetch_assoc()) {
                             $botonIf = $banner['boton'];
                             if ($botonIf==1) {
                               $boton = "<a href='".$banner['ligaBoton']."'>".$banner['textoBoton']."</a>";
                             } else {
                               $boton = "";
                             }
                        ?>

                            <div class="diapositiva"><!--nivel tres-->
                              <img class="slideImg" src="img/<?php echo $banner['imgBanner']; ?>" alt="Imagen de <?php echo $banner['nombre'] ?>"><!--nivel cuatro-->
                              <div class="slideTexto textoCBtn"><!--nivel cuatro-->
                                <?php echo $boton ?>
                                <p><?php echo $banner['texto']; ?></p><!--nivel cinco-->
                              </div><!--slideTexto--><!--nivel cuatro-->
                            </div><!--diapositiva--><!--nivel tres-->

                      <?php } ?>

                      </div><!--diapositivas-->



                      <div class="contBotones">

                        <div id="izqS" class="flechaBtn">
                          <span class="fa fa-chevron-left"></span>
                        </div>

                        <div class="paginacionS"></div>

                        <div id="derS" class="flechaBtn">
                          <span class="fa fa-chevron-right"></span>
                        </div>

                      </div><!--contBotones-->
                    </div><!--slideShowAlf-->

            </div><!--sectonContBanner-->
            <div class="sectImgServ flex-wrap">

                  <div class="contServBox">
                      <img src="img/servicios/_smartcard.jpg" alt="">
                      <div class="contServFlag">
                        <h1>SMART CARD</h1>
                        <p>Venta de tarjetas de PVC<br><br>Venta de impresoras de etiquetas y tarjetas PVC<br><br>Venta de consumibles<br><br>Servicio a impresoras de tarjetas PVC</p>
                      </div>
                  </div>

                  <div class="contServBox">
                      <img src="img/servicios/acceso.jpg" alt="">
                      <div class="contServFlag">
                        <h1>ACCESO</h1>
                        <p>Control de acceso por medio de lectura de tarjetas de proximidad, código de barras o banda magnética, así como la biometría de huella, iris o mano.</p>
                      </div>
                  </div>

                  <div class="contServBox">
                      <img src="img/servicios/lectura.jpg" alt="">
                      <div class="contServFlag">
                        <h1>lECTURA DE DOCUMENTOS</h1>
                        <p>Elaboración de documentos con elementos de alta seguridad.<BR><BR>Sistemas de lealtad y monedero electrónico.<BR><BR>Control de inventarios.</p>
                      </div>
                  </div>

                  <div class="contServBox">
                      <img src="img/servicios/cctv.jpg" alt="">
                      <div class="contServFlag">
                        <h1>CCTv</h1>
                        <p>Instalación y puesta en operación de equipos de CCTV.</p>
                      </div>
                  </div>
            </div><!--sectImgServ-->

        </div><!--sectonContPrinCont-->




      </section><!--sectonContPrin-->

  </div>
</article>


<!-- ****************PRODUCTOS*******************  -->
        <div class="secConTitProd contenedor">
            <p>Lo Más Vendido</p>
        </div>
        <div class="secConProductos spaceBetweenWrap contenedor">

              <div id="my-thumbs-list">
                    <ul>
                      <?php
                         try {
                           $sql = "SELECT * FROM producto WHERE pactivo = 1 ORDER BY vendido DESC LIMIT 1, 10";
                           $sql = $sql;
                           $productos = $conn->query($sql);
                         } catch (Exception $e) {
                           $error = $e->getMessage();
                           echo $error;
                         }
                         while ($producto = $productos->fetch_assoc()) {
                         $id = $producto["idproducto"];
                         $idMarca = $producto["marca"];
                           ?>

                            <li>
                              <div class="secConProducto">
                                <div class="secConProdCont">
                                      <div class="prodClic" id="header" onClick="location.href='producto.php?id=<?php echo $id ?>&exzoom='">

                                      </div>
                                      <div class="secConProdImg">
                                        <?php
                                        $sqli = "SELECT * FROM prod_imagenes WHERE iidproducto = $id AND principal = 1";
                                        $imagenes = $conn->query($sqli);
                                        $imagen = $imagenes->fetch_assoc();
                                        ?>
                                          <img src="img/productos/<?php echo $imagen["Imagen"]; ?>" alt="imagen de producto">
                                          <p><?php echo $producto["modelo"]; ?></p>
                                          <!--<button type="button" class="btn bg-orange btn-flat margin tienda" data-toggle="modal" data-target="#modal<?php //echo $id; ?>"></button>-->
                                      </div><!--secConProdImg-->

                                      <div class="secConProdSep"></div><!--secConProdSep-->

                                      <div class="secConProdDesc columnCenterCenter">
                                          <h4>
                                              <?php
                                                  $sqlm = "SELECT * FROM marcas WHERE idmarca = $idMarca";
                                                  $marcas = $conn->query($sqlm);
                                                  $marca = $marcas->fetch_assoc();
                                                  echo $marca["marca_nombre"];
                                              ?>
                                          </h4>
                                          <p class="descCorta"><?php echo $producto["producto"]; ?></p>
                                          <div class="secConProdDescO">
                                            <p class="descCorta"><?php echo $producto["modeloDesc"]; ?></p>
                                          </div>
                                      </div><!--secConProdDesc-->
                                      <a href="#" data-toggle="modal" data-target="#modal<?php echo $id; ?>"><i class="fas fa-cart-plus"></i></a>
                                </div><!--secConProdCont-->
                              </div><!-- secConProducto  -->

                              <!-- Modal -->
                              <div class="modal fade" id="modal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Compra de producto</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body modal-body-prod">
                                      <h2>Pongase en contacto</h2>
                                      <hr>
                                      <div class="modImgCont flex">
                                        <div class="modImgCol columnCenterCenter">
                                          <h3>Usted está interesado en el siguiente producto:</h3>
                                          <p><b><?php echo $producto["producto"]; ?></b></p>
                                          <p>Marca:</p>
                                          <p><span><?php echo $marca["marca_nombre"]; ?></span></p>
                                          <p>Modelo:</p>
                                          <p><span><?php echo $producto["modelo"]; ?></span></p>
                                        </div>
                                        <div class="modImgCol">
                                          <img src="img/productos/<?php echo $imagen["Imagen"]; ?>" alt="imagen de producto">
                                          <a href="producto.php?id=<?php echo $id; ?>&exzoom=">caracteristicas</a>
                                        </div>
                                      </div>
                                      <hr><br>
                                      <p>Por favor llene el siguiente formulario, muy pronto uno de nuestros ejecutivos se pondrá en contacto con usted..</p><br>
                                      <form class="crearRegistro" name="crearRegistro" action="ajax.php" method="post">
                                        <div class="form-group flex">
                                          <label for="nombre">Nombre:</label>
                                          <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Capture aqui su nombre" required>
                                        </div>
                                        <div class="form-group flex">
                                          <label for="nombre">Telefono:</label>
                                          <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Capture aqui su numero de celular" required>
                                        </div>
                                        <div class="form-group flex">
                                          <label for="nombre">Email:</label>
                                          <input type="text" name="email" class="form-control" id="email" placeholder="Capture aqui su correo electrónico" required>
                                        </div>
                                        <div class="form-group flex">
                                          <label for="nombre">Observaciones:</label>
                                          <textarea name="descripcion" class="form-control" id="descripcion" rows="4" placeholder="Su preferencia es muy importante para nosotros, cuentanos un poco de tus necesidades, si te gustaria que nos comunicaramos en algun horario especial, o solo utiliza este espacio para saludarnos..."></textarea>
                                        </div>
                                        <br>
                                        <h5 class="letraCh">La información que aqui proporcionas está protegida por nuestras politicas de ética, si requieres mas información consulta las politcas de privacidad <a href="politicaP.php" target="_blank">Aquí...</a></h5>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                      <input type="hidden" name="registro" value="Venta">
                                      <input type="hidden" name="id_Prod" value="<?php echo $id; ?>">
                                      <button type="submit" class="btn btn-primary">Enviar</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>

                          <?php } ?>

                      <!-- and so on... -->
                    </ul>
              </div><!--id="my-thumbs-list"--->


          </div><!--secConProductos-->


          <div class="secConTitProd contenedor">
              <p>Lo Más Buscado</p>
          </div>
          <div class="secConProductos spaceBetweenWrap contenedor">

                <div id="my-thumbs-list2">
                      <ul>
                        <?php
                           try {
                             $sql = "SELECT * FROM producto WHERE pactivo = 1 ORDER BY visitas DESC LIMIT 1, 10";
                             $sql = $sql;
                             $productos = $conn->query($sql);
                           } catch (Exception $e) {
                             $error = $e->getMessage();
                             echo $error;
                           }
                           while ($producto = $productos->fetch_assoc()) {
                           $id = $producto["idproducto"];
                           $idMarca = $producto["marca"];
                             ?>

                              <li>
                                <div class="secConProducto">
                                  <div class="secConProdCont">
                                        <div class="prodClic" id="header" onClick="location.href='producto.php?id=<?php echo $id ?>&exzoom='">

                                        </div>
                                        <div class="secConProdImg">
                                          <?php
                                          $sqli = "SELECT * FROM prod_imagenes WHERE iidproducto = $id AND principal = 1";
                                          $imagenes = $conn->query($sqli);
                                          $imagen = $imagenes->fetch_assoc();
                                          ?>
                                            <img src="img/productos/<?php echo $imagen["Imagen"]; ?>" alt="imagen de producto">
                                            <p><?php echo $producto["modelo"]; ?></p>
                                        </div><!--secConProdImg-->
                                        <div class="secConProdSep">

                                        </div><!--secConProdSep-->
                                        <div class="secConProdDesc columnCenterCenter">
                                            <h4>
                                                <?php
                                                    $sqlm = "SELECT * FROM marcas WHERE idmarca = $idMarca";
                                                    $marcas = $conn->query($sqlm);
                                                    $marca = $marcas->fetch_assoc();
                                                    echo $marca["marca_nombre"];
                                                ?>
                                            </h4>
                                            <p class="descCorta"><?php echo $producto["producto"]; ?></p>
                                            <div class="secConProdDescO">
                                              <p class="descCorta"><?php echo $producto["modeloDesc"]; ?></p>
                                            </div>
                                        </div><!--secConProdDesc-->
                                        <a href="#" data-toggle="modal" data-target="#modal<?php echo $id; ?>"><i class="fas fa-cart-plus"></i></a>
                                  </div><!--secConProdCont-->
                                </div><!-- secConProducto  -->

                                <!-- Modal -->
                                <div class="modal fade" id="modal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Compra de producto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body modal-body-prod">
                                        <h2>Pongase en contacto</h2>
                                        <hr>
                                        <div class="modImgCont flex">
                                          <div class="modImgCol columnCenterCenter">
                                            <h3>Usted está interesado en el siguiente producto:</h3>
                                            <p><b><?php echo $producto["producto"]; ?></b></p>
                                            <p>Marca:</p>
                                            <p><span><?php echo $marca["marca_nombre"]; ?></span></p>
                                            <p>Modelo:</p>
                                            <p><span><?php echo $producto["modelo"]; ?></span></p>
                                          </div>
                                          <div class="modImgCol">
                                            <img src="img/productos/<?php echo $imagen["Imagen"]; ?>" alt="imagen de producto">
                                            <a href="producto.php?id=<?php echo $id; ?>&exzoom=">caracteristicas</a>
                                          </div>
                                        </div>
                                        <hr><br>
                                        <p>Por favor llene el siguiente formulario, muy pronto uno de nuestros ejecutivos se pondrá en contacto con usted..</p><br>
                                        <form class="crearRegistro" name="crearRegistro" action="ajax.php" method="post">
                                          <div class="form-group flex">
                                            <label for="nombre">Nombre:</label>
                                            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Capture aqui su nombre" required>
                                          </div>
                                          <div class="form-group flex">
                                            <label for="nombre">Telefono:</label>
                                            <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Capture aqui su numero de celular" required>
                                          </div>
                                          <div class="form-group flex">
                                            <label for="nombre">Email:</label>
                                            <input type="text" name="email" class="form-control" id="email" placeholder="Capture aqui su correo electrónico" required>
                                          </div>
                                          <div class="form-group flex">
                                            <label for="nombre">Observaciones:</label>
                                            <textarea name="descripcion" class="form-control" id="descripcion" rows="4" placeholder="Su preferencia es muy importante para nosotros, cuentanos un poco de tus necesidades, si te gustaria que nos comunicaramos en algun horario especial, o solo utiliza este espacio para saludarnos..."></textarea>
                                          </div>
                                          <br>
                                          <h5 class="letraCh">La información que aqui proporcionas está protegida por nuestras politicas de ética, si requieres mas información consulta las politcas de privacidad <a href="politicaP.php" target="_blank">Aquí...</a></h5>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <input type="hidden" name="registro" value="Venta">
                                        <input type="hidden" name="id_Prod" value="<?php echo $id; ?>">
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                            <?php } ?>

                        <!-- and so on... -->
                      </ul>
                </div><!--id="my-thumbs-list"--->


            </div><!--secConProductos-->



<!--**********FIN PRODUCTOS*******-->


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


<!--personal capacitado-->
<div class="personalCer">
  <img src="img/personal.jpg" alt="">
  <div class="persoCerCont">
      <h3>PERSONAL CERTIFICADO</h3>
      <p>Contamos con ingenieros certificados, con más de 20 años de experiencia en las principales marcas del área de identificación.</p>
  </div>
</div>

<?php include_once '_includes/_templates/_footer.php'; ?>
