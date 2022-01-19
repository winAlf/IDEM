<?php
include_once '_includes/_funciones/bd_conexion.php';
include_once '_includes/_templates/_doctype.php';

/*
$filtroProd:

0 por Categorias
1 por producto
3 por marca
*/
if (isset($_GET['sel'])) {
  $sel = $_GET['sel'];
}
if (isset($_POST['sel'])) {
  $sel = $_POST['sel'];
}
$prodCon = "";
switch ($sel) {
    case 1:
        $cat = $_GET['cat'];
        $subCat = $_GET['subCat'];
        $prodCon = "AND pidsubcategoria =".$subCat." ";
        $catCon = " AND idcategoria = ".$cat;
        $limit = "";//$limit = " LIMIT 0, 10";
        $heroCab = "1";
        //echo $prodCon;
        break;
    case 2:
        $cat = $_GET['cat'];
        $prodCon = "AND pidcategoria =".$cat." ";
        $catCon = " AND idcategoria = ".$cat;
        $limit = " LIMIT 0, 10";
        $heroCab = "2";
        break;
    case 3:
        $idMarca = $_GET['idMarca'];
        $prodCon = "AND marca =".$idMarca." ";
        $limit = "";
        $heroCab = "3";
        break;
    case 4:
        $prodMod = $_POST['prodMod'];
        $prodCon = "AND modelo LIKE '%".$prodMod."%' ";
        $limit = "";
        $heroCab = "4";
        break;
}





/*
if (isset($_GET['cat'])) {
  $cat = $_GET['cat'];
  $filtroProd = "0";
  $prodLimit = "16";
  if (isset($_GET['subCat'])) {
    $subCat = $_GET['subCat'];
    $whereprod = "pidsubcategoria = ".$subCat;
  }else {
    $whereprod = "pidcategoria = ".$cat;
  }
}elseif (isset($_GET['idMarca'])) {
    $idMarca = $_GET['idMarca'];
    $filtroProd = "3";
} else{
  $catCon = "";
  $prodLimit = "8";
}

if (isset($_GET['subCat'])) {
  $subCatCon = "  AND pidsubcategoria = ".$_GET['subCat'];
}else{
  $subCatCon = "";
}
*/







?>

    <meta name="description" content="">

<?php
include_once '_includes/_templates/_header.php';
include_once '_includes/_templates/_barraPrin.php';
?>

<article class="articleContPrin">
  <div id="arConPrinCont" class="arConPrinCont contenedor columnReverse">

      <aside class="asideContPrin">

                  <?php include '_includes/_templates/_navegacionFull.php'; ?>

      </aside><!--asideContPrin-->





      <section id="" class="sectonContPrin">
        <?php
        switch ($heroCab) {
            case 1: ?>

                  <?php
                     try {
                       $sqlC = "SELECT * FROM categoria WHERE activo = 1".$catCon." ORDER BY idcategoria";
                       $categorias = $conn->query($sqlC);
                     } catch (Exception $e) {
                       $error = $e->getMessage();
                       echo $error;
                     }
                     while ($categoria = $categorias->fetch_assoc()) {
                       $catSend = $categoria['idcategoria'];?>

                       <div class="contCatCategoria">
                         <img src="img/categoria/<?php echo $categoria['imagen']; ?>">
                         <div class="catCatMarcaAgua">
                           <div class="marcaAguaTitulo flex">
                             <h1><?php echo $categoria['categoria']; ?></h1>
                           </div><!--marcaAguaTitulo-->
                           <div class="marcaAguaProd columnFlexend">
                             <p>Selecciona una subcategoría:</p>
                             <ul>

                               <?php
                                   try {
                                     $sqlS = "SELECT * FROM subcategoria WHERE sactivo = 1 AND sidcategoria = ".$categoria['idcategoria']." ORDER BY idsubcategoria";
                                     $subcategorias = $conn->query($sqlS);
                                   } catch (Exception $e) {
                                     $error = $e->getMessage();
                                     echo $error;
                                   }
                                   while ($subcategoria = $subcategorias->fetch_assoc()) { ?>

                                        <li><a class="nivelDos" href="catalogo.php?sel=1&subCat=<?php echo $subcategoria['idsubcategoria']; ?>&cat=<?php echo $categoria['idcategoria']; ?>"><?php echo $subcategoria['subcategoria']; ?></a></li>

                               <?php } ?>

                             </ul>
                           </div><!--marcaAguaProd-->
                         </div><!--catCatMarcaAgua-->
                       </div><!--contCatCategoria-->
                       <br>

                  <?php } ?>

                <?php break;
            case 3: ?>


                    <?php
                       try {
                         $sqlI = "SELECT * FROM marcas WHERE marca_activo = 1 AND idmarca = ".$idMarca;
                         $marcas = $conn->query($sqlI);
                         $marca = $marcas->fetch_assoc();
                       } catch (Exception $e) {
                         $error = $e->getMessage();
                         echo $error;
                       }
                    ?>

                        <div class="contCatCategoria contCatMarca">
                           <img src="img/catalogoMarcas.jpg">
                           <div class="marcaCont">
                              <div class="marcaContCol">
                                  <img src="img/marcas/<?php echo $marca['marca_imagen'];; ?>">
                              </div>
                           </div>
                        </div><!--contCatCategoria-->
                      <?php break;

            case 4: ?>
                    <div class="contCatCategoria contCatMarca">
                       <img src="img/catalogoMarcas.jpg">
                       <div class="marcaCont">
                          <div class="marcaContCol">
                              <h1>Busqueda por modelo</h1>
                          </div>
                       </div>
                    </div><!--contCatCategoria-->
        <?php } ?>


<!-- ****************PRODUCTOS*******************  -->
        <div class="secConProductos spaceBetweenWrap">

              <div>
                    <ul class="spaceBetweenWrap catProdUL">
                      <?php
                         try {
                           $sql = "SELECT * FROM producto WHERE pactivo = 1 ".$prodCon.$limit;
                           //echo $sql;
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
<!--
                                          <button type="button" class="btn bg-orange btn-flat margin" data-toggle="modal" data-target="#modal<?php echo $id; ?>"><i class="fas fa-cart-plus"></i></button>
                                        -->
                                          <!--<a href="#" data-toggle="modal" data-target="#modal<?php //echo $id; ?>"><i class="fas fa-cart-plus"></i></a>-->
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
                                      <form class="crearRegistro" id="crearRegistro" action="ajax.php" method="post">
                                        <div class="form-group flex">
                                          <label for="nombre">Nombre:</label>
                                          <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Capture aqui su nombre" required>
                                        </div>
                                        <div class="form-group flex">
                                          <label for="nombre">Telefono:</label>
                                          <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Capture aqui su numero de celular" required>
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










          <div class="catPuedeInteresarte">
              <div class="secConTitProd">
                  <p></p>
              </div>
              <div class="catPueIntCab">
                <h1>También Puede interesarte...</h1>
              </div>
              <div class="catPueIntCont spaceBetweenCenter">
                <div class="catPueIntOf">
                    <div class="catPueIntOfCont columnFlexend">
                      <p>Impresoras de credenciales</p>
                      <h1>Imprime tarjetas de identificación sorprendentes, con colores brillantes</h1>
                      <a class="btn" href="#">Mas Información</a>
                    </div>
                </div>
                <div class="catPueIntOf">
                  <img src="img/ofertas/impCred.png" alt="">
                </div>
              </div>
          </div>




      </section><!--sectonContPrin-->

  </div>
</article>


<div class="catIconos contenedor">
  <div class="catPueIntCab">
    <h1>Categorías</h1>
  </div>
  <div class="catIconosCont spaceBetweenWrap">
    <?php
       try {
         $sqlC = "SELECT * FROM categoria";
         $CategoriasI = $conn->query($sqlC);
       } catch (Exception $e) {
         $error = $e->getMessage();
         echo $error;
       }
       while ($CategoriaI = $CategoriasI->fetch_assoc()) { ?>
         <div class="catIconosIco columnCenterCenter">
             <a href="catalogo.php?sel=2&cat=<?php echo $CategoriaI['idcategoria']; ?>"><i class="<?php echo $CategoriaI['icono']; ?>"></i></a>
             <a href="catalogo.php?sel=2&cat=<?php echo $CategoriaI['idcategoria']; ?>"><h1><?php echo $CategoriaI['categoria']; ?></h1></a>
         </div>
    <?php } ?>
  </div>
</div>

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
