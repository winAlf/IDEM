<?php
include_once '_includes/_funciones/bd_conexion.php';
include_once '_includes/_templates/_doctype.php';

/*
$filtroProd:

0 por Categorias
1 por producto
3 por marca
*/


if (isset($_GET['cat'])) {
  $cat = $_GET['cat'];
  $filtroProd = "0";
  $prodLimit = "16";
  $catCon = " AND idcategoria = ".$_GET['cat'];
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
            switch ($filtroProd) {
                case 0:
                    include_once '_includes/_catalogo/_categoria.php';
                    break;
                case 1:
                    echo "es igual a uno";
                    break;
                case 3:
                    include_once '_includes/_catalogo/_marca.php';
                    break;
                }
         ?>



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
             <a href="catalogo.php?cat=<?php echo $CategoriaI['idcategoria']; ?>"><i class="<?php echo $CategoriaI['icono']; ?>"></i></a>
             <a href="catalogo.php?cat=<?php echo $CategoriaI['idcategoria']; ?>"><h1><?php echo $CategoriaI['categoria']; ?></h1></a>
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

<?php include_once '_includes/_templates/_footer.php'; ?>
