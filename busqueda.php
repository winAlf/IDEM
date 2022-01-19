<?php
include_once '_includes/_funciones/bd_conexion.php';
include_once '_includes/_templates/_doctype.php';

//Busqueda de productos por modelo
if (isset($_POST['buscaProd'])) {
  $buscaMod = $_POST['buscaMod'];
}else{
  $buscaMod = "";
}
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
        <div id="scrollToHere"></div>
        <div class="catalogoCont">

               <div class="catalogoSeparador" id="catalogO1"></div><!--catalogoDiv-->

               <div class="catalogoHeader spaceBetweenCenter">
                   <div class="catHeadImg">
                       <img src="img/categoria/busqueda.png" alt="">
                   </div><!--catHeadImg-->
                   <div class="catHeadInfo columnSpaceBetween">
                     <h1>Busqueda de Producto</h1>
                     <div class="catHeadInfoSub columnCenterFlexEnd">
                         <div class="catSeparador"></div>
                     </div><!--catHeadInfoSub-->
                   </div><!--catHeadInfo-->
               </div><!--catalogoHeader-->

               <div class="catalogoCuerpo items spaceBetweenWrap">

                 <?php
                           try {
                             $sqlP = "SELECT idproducto, pidsubcategoria, visitas, producto, modelo, modeloDesc, Imagen FROM producto ";
                             $sqlP .= "INNER JOIN prod_imagenes ON producto.idproducto=prod_imagenes.iidproducto and prod_imagenes.icono=1 ";
                             $sqlP .= "WHERE pactivo = 1 AND modelo LIKE '%".$buscaMod."%' ORDER BY visitas DESC";
                             $productos = $conn->query($sqlP);
                           } catch (Exception $e) {
                             $error = $e->getMessage();
                             echo $error;
                           }
                           while ($producto = $productos->fetch_assoc()) {
                                $visitas = $producto['visitas'] + 1;

                                 echo '<div class="catCuerpoProd">';
                                   echo '<div class="catCuerpoProdImg columnCenterCenter">';
                                         echo '<div class="catCuerpoProdImgImg ">';
                                            echo '<a href="ajax.php?id='.$producto['idproducto'].'&visita='.$visitas.'&exzoom="><img class="hvr-grow" src="/img/productos/'.$producto['Imagen'].'" alt=""></a>';
                                         echo '</div>';
                                         echo '<div class="catCueProdBorde columnCenterCenter">';
                                             echo '<p>'.$producto['modelo'].'</p>';
                                         echo '</div>';
                                   echo '</div>';
                                 echo '</div>';

                             } //while ($producto = $productos->fetch_assoc())?
                     ?>

               </div><!--catalogoCuerpo-->
              

        </div><!--catalogoCont-->
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
