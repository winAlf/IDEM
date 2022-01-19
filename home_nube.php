<?php
include '_includes/_funciones/bd_conexion.php';
include '_includes/_templates/_doctype.php';
include '_includes/_templates/_header.php';
include '_includes/_templates/_barraPrin.php';
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

                        <div class="diapositiva"><!--nivel tres-->
                          <img class="slideImg" src="img/6.jpg" alt="Imagen de slide 6"><!--nivel cuatro-->
                          <div class="slideTexto textoCBtn"><!--nivel cuatro-->
                            <a href="zteco.php">más información..</a>
                            <p>Distribuidores autorizados ZKTeco</p><!--nivel cinco-->
                          </div><!--slideTexto--><!--nivel cuatro-->
                        </div><!--diapositiva--><!--nivel tres-->

                        <div class="diapositiva"><!--nivel tres-->
                          <img class="slideImg" src="img/1.jpg" alt="Imagen de slide 1"><!--nivel cuatro-->
                          <div class="slideTexto"><!--nivel cuatro-->
                            <p>Nuestro trabajo es tu seguridad</p><!--nivel cinco-->
                          </div><!--slideTexto--><!--nivel cuatro-->
                        </div><!--diapositiva--><!--nivel tres-->

                        <div class="diapositiva">
                          <img class="slideImg" src="img/2.jpg" alt="Imagen de slide 4">
                          <div class="slideTexto">
                            <p>Tarjetas inteligentes para soluciones inteligentes </p>
                          </div><!--slideTexto-->
                        </div><!--diapositiva-->

                        <div class="diapositiva">
                          <img class="slideImg" src="img/3.jpg" alt="Imagen de slide 9">
                          <div class="slideTexto">
                            <p>Sistemas integrales para lograr sus objetivos</p>
                          </div><!--slideTexto-->
                        </div><!--diapositiva-->

                        <div class="diapositiva">
                          <img class="slideImg" src="img/4.jpg" alt="Imagen de slide 4">
                          <div class="slideTexto">
                            <p>Protegemos tu mundo</p>
                          </div><!--slideTexto-->
                        </div><!--diapositiva-->

                        <div class="diapositiva">
                          <img class="slideImg" src="img/5.jpg" alt="Imagen de slide 9">
                          <div class="slideTexto">
                            <p>Productos inovadores</p>
                          </div><!--slideTexto-->
                        </div><!--diapositiva-->

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


<!-- ****************PRODUCTOS*******************  -->
      

        <div class="secConTitProd">
            <p>Ofertas de la Semana</p>
        </div>

        <div class="secConProductos spaceBetweenWrap">

              <div id="my-thumbs-list2">
                    <ul>
                            <li>
                              <div class="secConProducto">
                                <div class="secConProdCont">
                                      <div class="secConProdImg">
                                          <img src="img/productos/E-4204b.jpg" alt="imagen de producto">
                                          <p>E-4204b</p>
                                      </div><!--secConProdImg-->
                                      <div class="secConProdSep">

                                      </div><!--secConProdSep-->
                                      <div class="secConProdDesc">
                                          <h4>$ 5555,55</h4>
                                          <p>Marca de producto</p>
                                          <div class="secConProdDescO">
                                            <p>Impresora de tickets</p>
                                            <p>descripcion rapida de producto</p>
                                          </div>
                                      </div><!--secConProdDesc-->
                                </div><!--secConProdCont-->
                              </div><!-- secConProducto  -->
                            </li>

                            <li>
                              <div class="secConProducto">
                                <div class="secConProdCont">
                                      <div class="secConProdImg">
                                          <img src="img/productos/QL800.jpg" alt="imagen de producto">
                                          <p>QL800</p>
                                      </div><!--secConProdImg-->
                                      <div class="secConProdSep">

                                      </div><!--secConProdSep-->
                                      <div class="secConProdDesc">
                                          <h4>$ 5555,55</h4>
                                          <p>Marca de producto</p>
                                          <div class="secConProdDescO">
                                            <p>Impresora de tickets</p>
                                            <p>descripcion rapida de producto</p>
                                          </div>
                                      </div><!--secConProdDesc-->
                                </div><!--secConProdCont-->
                              </div><!-- secConProducto  -->
                            </li>

                            <li>
                              <div class="secConProducto">
                                <div class="secConProdCont">
                                      <div class="secConProdImg">
                                          <img src="img/productos/ZT510.jpg" alt="imagen de producto">
                                          <p>ZT510</p>
                                      </div><!--secConProdImg-->
                                      <div class="secConProdSep">

                                      </div><!--secConProdSep-->
                                      <div class="secConProdDesc">
                                          <h4>$ 5555,55</h4>
                                          <p>Marca de producto</p>
                                          <div class="secConProdDescO">
                                            <p>Impresora de tickets</p>
                                            <p>descripcion rapida de producto</p>
                                          </div>
                                      </div><!--secConProdDesc-->
                                </div><!--secConProdCont-->
                              </div><!-- secConProducto  -->
                            </li>

                            <li>
                              <div class="secConProducto">
                                <div class="secConProdCont">
                                      <div class="secConProdImg">
                                          <img src="img/productos/ZT510.jpg" alt="imagen de producto">
                                          <p>ZT510</p>
                                      </div><!--secConProdImg-->
                                      <div class="secConProdSep">

                                      </div><!--secConProdSep-->
                                      <div class="secConProdDesc">
                                          <h4>$ 5555,55</h4>
                                          <p>Marca de producto</p>
                                          <div class="secConProdDescO">
                                            <p>Impresora de tickets</p>
                                            <p>descripcion rapida de producto</p>
                                          </div>
                                      </div><!--secConProdDesc-->
                                </div><!--secConProdCont-->
                              </div><!-- secConProducto  -->
                            </li>
                      <!-- and so on... -->
                    </ul>
              </div><!--id="my-thumbs-list"--->


          </div><!--secConProductos-->

<!--**********FIN PRODUCTOS*******-->

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

        <?php
           try {
             $sql = "SELECT * FROM marcas WHERE marca_activo = 1";
             $marcas = $conn->query($sql);
           } catch (Exception $e) {
             $error = $e->getMessage();
             echo $error;
           }
           while ($marca = $marcas->fetch_assoc()) { ?>
                <div class="barramarmar">
                  <a href="catalogo.php?idMarca=<?php echo $marca['idmarca']; ?>"><img src="img/marcas/<?php echo $marca['marca_imagen']; ?>" alt=""></a>
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

<?php include '_includes/_templates/_footer.php'; ?>
