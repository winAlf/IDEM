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


            <div class="sectImgServ flex-wrap">

                  <div class="contServBox">
                          <h1>Ponte en Contacto</h1>
                          <p class="pBlanco">Queremos escucharte, tus comentarios son lo mas importante para nosotros, contacta con nosotros y muy pronto un agente tendrá el gusto de contactar contigo.</p>
                          <p class="pBlanco">* Campos requeridos</p>
                          <form action="ajax.php" method="post" id="crearRegistro">
                                  <div class="campoCont">
                                      <label for="nombre">*Nombre:</label><br>
                                      <input type="text" name="nombre" id="nombre" required>
                                  </div>
                                  <div class="campoCont">
                                      <label for="nombre">Compañia:</label><br>
                                      <input type="text" name="compania" id="comania">
                                  </div>
                                  <div class="campoCont">
                                      <label for="numero">*Teléfono:</label> <br>
                                      <input type="text" name="telefono" id="telefono" required>
                                  </div>
                                  <div class="campoCont">
                                      <label for="numero">*Email:</label> <br>
                                      <input type="email" name="email" id="email" required>
                                  </div>
                                  <div class="campoCont">
                                      <label for="numero">*Mensaje:</label> <br>
                                      <textarea name="interes" class="form-control" id="interes" rows="5"  placeholder="Por favor describa cual es su interés " required></textarea>
                                  </div>
                                  <input type="hidden" name="registro" value="add">
                                  <input class="btnAceptar" type="submit" name="send" value="Enviar Datos" id="agregar" class="boton">
                          </form>
                  </div><!--contServBox-->

                  <div class="contServBox contServBoxIdem columnCenterCenter">
                        <img src="img/logoBig.png" alt="">
                        <div class="conSerBoxDir flexEndCenter">
                              <div class="conSerBoxIco">
                                      <p><i class="fas fa-globe-americas"></i></p>
                              </div><!--conSerBoxIco-->
                              <div class="conSerBoxAll">
                                      <p>Rosa Blanca 176, Dep 1<br>Molino de Rosas, C.P.: 01470<br>Álvaro Obregón,  Ciudad de México<br>CDMX, México.</p>
                              </div><!--conSerBoxIco-->
                        </div><!--conSerBoxDir-->
                        <div class="conSerBoxDir flexEndCenter">
                              <div class="conSerBoxIco">
                                      <p><i class="fas fa-phone-square"></i></i></p>
                              </div>
                              <div class="conSerBoxAll">
                                      <p>55 7593 7040<br>55 8718 9595 al 98</p>
                                      <a class="TelA" href="tel:+52 1 55 7593">Llamar</a>
                              </div>
                        </div><!--conSerBoxDir-->
                        <div class="footSocial">
                            <a href="https://www.youtube.com/channel/UC36mzWTJAvLTi2ZIx0gayFg?view_as=subscriber"><i class="fab fa-youtube"></i></a>
                            <a href="https://www.facebook.com/idemsecuremexico/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/Idem_Secure"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/idemsecure/"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/feed/?trk=guest_homepage-basic_nav-header-signin"><i class="fab fa-linkedin-in"></i></a>
                        </div><!--footSocial-->
                  </div><!--contServBox-->

            </div><!--sectImgServ-->

            <div class="sectonContBanner">

                <div id="mapa" class="mapa"></div>

            </div><!--sectonContBanner-->

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
