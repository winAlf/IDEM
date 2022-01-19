<?php
include_once '_includes/_funciones/bd_conexion.php';
include_once '_includes/_templates/_doctype.php';

$id = $_GET['id'];
$idVenta = $_GET['id'];

$sql = "SELECT idproducto, pidcategoria, pidsubcategoria, categoria, subcategoria, modeloDesc, pdescripcion, precio, datasheet, instructivo, producto, marca, modelo, pactivo, visitas, porden, marca_nombre, marca_imagen ";
$sql .= "FROM producto ";
$sql .= "INNER JOIN categoria ON producto.pidcategoria=categoria.idcategoria ";
$sql .= "INNER JOIN subcategoria ON producto.pidsubcategoria=subcategoria.idsubcategoria ";
$sql .= "INNER JOIN marcas ON producto.marca=marcas.idmarca ";
$sql .= "WHERE idproducto = $id";
$productos = $conn->query($sql);
$producto = $productos->fetch_assoc();
$pidcategoria = $producto['pidcategoria'];
$idproductoP = $producto['idproducto'];
?>

    <meta name="description" content="">

<?php
include_once '_includes/_templates/_header.php';
include_once '_includes/_templates/_barraPrin.php';
?>

<article class="articleContPrin">
  <div id="arConPrinCont" class="arConPrinCont contenedor columnReverse">

      <aside class="asideContPrin">
              <div class="asideContPrinNav">

                  <?php include '_includes/_templates/_navegacion.php'; ?>

              </div><!--asideContPrinNav-->


      </aside><!--asideContPrin-->

      <section id="" class="sectonContPrin">
          <div class="productoCont spaceBetweenWrap">
                  <div class="prodColumna">
                            <div class="prodImgTitulo">
                              <p><a href="catalogo.php?cat=<?php echo $producto['pidcategoria']; ?>"><?php echo $producto['categoria']; ?></a> / <a href="catalogo.php?sel=1&subCat=<?php echo $producto['pidsubcategoria']; ?>&cat=<?php echo $producto['pidcategoria']; ?>"><?php echo $producto['subcategoria']; ?></a></p>
                            </div>
                            <div class="prodImgTitulo spaceBetweenCenterWrap">
                              <img src="img/marcas/<?php echo $producto['marca_imagen']; ?>" alt="">
                              <h1><?php echo $producto['modelo']; ?></h1>
                            </div>
                  </div><!--prodColumna-->

          </div><!--productoCont-->

          <div class="productoCont spaceBetweenWrap">
                <div class="prodColumna">
                          <div class="exzoom" id="exzoom">
                          <!-- Images -->
                          <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>
                              <?php
                                    try {
                                      $sql = "SELECT Imagen FROM prod_imagenes WHERE iidproducto = ".$producto['idproducto'];
                                      $imagenes = $conn->query($sql);
                                    } catch (Exception $e) {
                                      $error = $e->getMessage();
                                      echo $error;
                                    }
                                    while ($imagen = $imagenes->fetch_assoc()) { ?>

                                        <li><img src="img/productos/<?php echo $imagen['Imagen']; ?>"></li>

                              <?php } ?>
                            </ul>
                          </div>
                          <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
                          <div class="exzoom_nav"></div>
                          <!-- Nav Buttons -->
                          <p class="exzoom_btn">
                              <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                              <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                          </p>
                        </div>
                </div><!--prodColumna-->
                <div class="prodColumna prodColAzul">
                  <div class="separadorAmarilloP">
                    <h1><?php echo $producto['producto']; ?></h1>
                    <p><?php echo $producto['modeloDesc']; ?></p>
                  </div>
                  <hr>
                    <div class="prodColInfo">
                          <h3>Descripción</h3>
                          <p>
                            <?php echo $producto['pdescripcion']; ?>
                          </p>
                    </div>
                    <hr>
                    <!--
                    <div class="prodColPdf flex-wrap">
                        <div class="prodColPdfFile columnCenterCenter">
                              <a href="pdf/datasheet/<?php //echo $producto['datasheet']; ?>" target="_blank"><i class="far fa-file-pdf"></i></a>
                              <p>Datasheet</p>
                        </div>
                        <div class="prodColPdfFile columnCenterCenter">
                              <a href="pdf/datasheet/<?php //echo $producto['instructivo']; ?>" target="_blank"><i class="far fa-file-pdf"></i></a>
                              <p>Instructivo</p>
                        </div>
                    </div>
                  -->
                  <button type="button" class="btn bg-orange btn-flat margin" data-toggle="modal" data-target="#modalVenta">Comprar</button>
                </div><!--prodColumna-->

          </div><!--productoCont-->

      </section><!--sectonContPrin-->

  </div>
</article>

<!-- Modal -->
<div class="modal fade" id="modalVenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            <p><b><?php echo $producto['producto']; ?></b></p>
            <p>Marca:</p>
            <p><span><?php echo $producto["marca_nombre"]; ?></span></p>
            <p>Modelo:</p>
            <p><span><?php echo $producto["modelo"]; ?></span></p>
          </div>
          <div class="modImgCol">
            <?php
              $sqlii = "SELECT * FROM prod_imagenes WHERE iidproducto = $idproductoP AND principal = 1";
              $imagenePs = $conn->query($sqlii);
              $imageneP = $imagenePs->fetch_assoc();
            ?>
            <img src="img/productos/<?php echo $imageneP["Imagen"]; ?>" alt="imagen de producto">

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
        <input type="hidden" name="id_Prod" value="<?php echo $idVenta; ?>">
        <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- ****************PRODUCTOS*******************  -->
        <div class="secConTitProd contenedor">
            <p>Productos relacionados</p>
        </div>
        <div class="secConProductos spaceBetweenWrap contenedor">

              <div id="my-thumbs-list">
                    <ul>
                      <?php
                         try {
                           $sql = "SELECT * FROM producto WHERE pidsubcategoria = ".$producto['pidsubcategoria']." LIMIT 1, 10";
                           $sql = $sql;
                           $productos = $conn->query($sql);
                         } catch (Exception $e) {
                           $error = $e->getMessage();
                           echo $error;
                         }
                         while ($producto = $productos->fetch_assoc()) {
                         $id = $producto["idproducto"];
                         $idMarca = $producto["marca"];
                         $modeloM = $producto["modelo"];
                         $productoM=$producto["producto"];
                           ?>

                            <li>
                              <div class="secConProducto">
                                <div class="secConProdCont">
                                      <div class="prodClic" id="header" onClick="location.href='producto.php?id=<?php echo $id ?>&exzoom='">

                                      </div>
                                      <div class="secConProdImg">
                                        <?php
                                        $sqli = "SELECT * FROM prod_imagenes WHERE iidproducto = $id AND principal = 1";
                                        $imagenesI = $conn->query($sqli);
                                        $imagenI = $imagenesI->fetch_assoc();
                                        ?>
                                          <img src="img/productos/<?php echo $imagenI["Imagen"]; ?>" alt="imagen de producto">
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
                                </div><!--secConProdCont-->
                              </div><!-- secConProducto  -->

                          <?php } ?>

                      <!-- and so on... -->
                    </ul>
              </div><!--id="my-thumbs-list"--->


          </div><!--secConProductos-->


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



<?php include_once '_includes/_templates/_footer.php'; ?>
