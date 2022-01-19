<?php
include_once '_includes/_funciones/bd_conexion.php';
include_once '_includes/_templates/_doctype.php';
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
                  <h1>Catálogo de Productos</h1>

                  <?php include '_includes/_templates/_navegacion.php'; ?>

              </div><!--asideContPrinNav-->


      </aside><!--asideContPrin-->

      <section id="sectonContPrin" class="sectonContPrin">
        <div class="sectonContPrinCont">

            <div class="heroMPO">
              <img src="img/lockers.jpg" alt="">
              <div class="heroMPOTxt">
                  <img src="img/logoBig.png" alt="">
              </div>
            </div>

            <div class="mpoSomos">
              <h1>quienes somos?</h1>
              <p>somos una empresa joven orgullosamente mexicana, y nos esforzamos en demostrar nuestra pasión al diseñar y fabricar mobiliario de oficina y sistemas de almacenamiento, contamos con la más innovadora y moderna infraestructura conformada por equipos de trabajo especializados en la planeación y creación de ambientes de trabajo. La calidad de nuestros productos y servicios nos ha ido posicionando poco a poco como la mejor opción en equipamientos de oficinas en México</p>
            </div>

            <div class="heroMPO2">
              <div class="heroMPO2Img">
                <img src="img/mpo02.jpg" alt="">
                <div class="heroMPO2Txt">
                  <h1>Mision</h1>
                  <p>Ser el mejor proveedor de mobiliario a nivel nacional, para lograrlo hemos establecido una cultura que apoya a los miembros de nuestro equipo para que ellos puedan dar a nuestros clientes un servicio excepcional</p>
                  <br><br>
                  <h1>Vision</h1>
                  <p>Hacer la diferencia todos los dias, siendo una empresa lider en la fabricación, comercialización y distribución de mobiliario de oficina y espacios de almacenaje</p>
                </div>
              </div>
            </div>

            <div class="separadorAmarillo">
              <h1>Catálogos</h1>
            </div>
            <div class="sectImgCat spaceBetweenWrap">

              <?php
                    try {
                      $sql = "SELECT idcategoria, categoria, imagen FROM categoria";
                      $categorias = $conn->query($sql);
                    } catch (Exception $e) {
                      $error = $e->getMessage();
                      echo $error;
                    }
                    while ($categoria = $categorias->fetch_assoc()) {
              ?>

                    <div class="sectImgCatCont">
                        <div class="sectImgCatImg">
                            <a href="catalogo.php?cat=<?php echo $categoria['idcategoria']; ?>"><img class="hvr-grow" src="/img/categoria/<?php echo $categoria['imagen']; ?>" alt=""></a>
                        </div><!--sectImgCatImg-->
                        <div class="sectImgCatTxt">
                            <h1><?php echo $categoria['categoria']; ?></h1>
                        </div><!--sectImgCatImg-->
                    </div><!--sectImgCatCont-->

              <?php } ?>

            </div><!--sectImgServ-->
        </div><!--sectonContPrinCont-->

      </section><!--sectonContPrin-->

  </div>
</article>


<div class="prodThumb">
  <div class="prodThumbCont contenedor">

      <div class="separadorAmarillo">
        <h1>Los más buscados</h1>
      </div>

      <div id="my-thumbs-list">
          <ul>

            <?php
                  try {
                    $sqlp = "SELECT idproducto, producto, modelo, modeloDesc FROM producto ORDER BY visitas DESC LIMIT 0,8";
                    $productos = $conn->query($sqlp);
                  } catch (Exception $e) {
                    $error = $e->getMessage();
                    echo $error;
                  }
                  while ($producto = $productos->fetch_assoc()) {
            ?>

                  <li>
                    <div class="myThumListCont">
                            <div class="myThumListImg">
                                    <?php
                                        $sqlImg = "SELECT Imagen FROM prod_imagenes WHERE iidproducto = ".$producto['idproducto']." AND icono = 1";
                                        $resultI = $conn->query($sqlImg);
                                        $imagen = $resultI->fetch_assoc();
                                     ?>
                                    <a href="producto.php?id=<?php echo $producto['idproducto']; ?>&exzoom="><img src="/img/productos/<?php echo $imagen['Imagen']; ?>" /></a>
                                    <div class="myThumListImgTxt hvr-float-shadow">
                                      <p><?php echo $producto['modelo']; ?></p>
                                    </div>
                            </div><!--myThumListImg-->
                            <!--
                            <div class="myThumListTxt">
                                    <a href="producto.php?id=<?php //echo $producto['idproducto']; ?>&exzoom="><p><?php //echo $producto['modelo']; ?><br><span><?php// echo $producto['modeloDesc']; ?></span></p></a>
                            </div><!--myThumListTxt-->
                    </div><!--myThumListCont-->
                  </li>

            <?php } ?>

          </ul>
      </div>

  </div><!--prodThumbCont-->
</div><!--prodThumb-->


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
                          <div class="paraNewData">
                                <p>Regístrese para nuestro boletín de noticias y reciba ofertas atractivas mediante la suscripción a nuestros boletines.</p>
                                <div id="cabeSearch" class="cabeSearch">
                                      <form role="form" name="buscarProducto" id="buscarProducto" method="post" action="ajax.php" enctype="multipart/form-data">
                                          <div class="form-group">
                                            <input type="text" name="cliente" class="form-control buscarProd" id="cliente" placeholder="captura tu correo">
                                            <button class="buscarProdBtn" type="submit">suscríbete</button>
                                          </div>
                                      </form>
                                </div>
                          </div>
                    </div><!--paraNewCont-->

            </div><!--paralaxCont-->
      </div><!--contenido-->
  </div><!--newsletter-->

<?php include_once '_includes/_templates/_footer.php'; ?>
