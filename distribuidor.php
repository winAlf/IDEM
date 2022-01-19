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

      <section id="" class="sectonContPrin">
        <div class="sectonContPrinCont">
            <div class="secContPrinHero">
                <img class="heroImg" src="/img/3min.jpg" alt="">
            </div>
            <div class="sectDatCont spaceBetweenWrap">
              <div class="sectDatContCont">
                <p>Quieres Únete a nuestro equipo de distribuidores?<br><br>déjanos tus datos y a la brevedad nos comunicaremos contigo</p>
              </div>
              <div class="sectDatContCont">
                    <form action="ajax.php" method="post" id="crearRegistro">
                        <div class="campo">
                              <label for="nombre">Nombre:</label><br>
                              <input type="text" name="nombre" id="nombre" placeholder="" required>
                        </div>
                        <div class="campo">
                              <label for="numero">Teléfono:</label> <br>
                              <input type="text" name="telefono" id="telefono" placeholder="(00) 0000-0000" required>
                        </div>
                        <div class="campo">
                              <label for="numero">Email:</label> <br>
                              <input type="email" name="email" id="email" placeholder="" required>
                        </div>
                        <div class="campo">
                              <label for="numero">Mensaje:</label> <br>
                              <textarea name="interes" class="form-control" id="interes" rows="5"  placeholder="Por favor deje un mensaje..." required></textarea>
                        </div>
                        <input type="hidden" name="registro" value="addDis">
                        <input class="btnAceptar" type="submit" name="send" value="Enviar Datos" id="agregar" class="boton">
                    </form>
              </div>

            </div><!--sectImgServ-->
        </div><!--sectonContPrinCont-->

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
