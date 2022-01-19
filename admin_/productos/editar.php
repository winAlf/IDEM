<?php
include_once '../_includes/_funciones/sesiones.php';
include_once '../../_includes/_funciones/bd_conexion.php';
  $id = $_GET['id'];
  $id_cat = $_GET['id_cat'];
  $id_Scat = $_GET['id_Scat'];
  $id_act = $_GET['id_act'];


  switch ($id_act) {
    case '1':
      $activo="checked";
      $inactivo="";
      break;
    default:
      $activo="";
      $inactivo="checked";
      break;
  }

  /*
  echo "<pre>";
    var_dump($_GET);
  echo "</pre>";
  */

  if(!filter_var($id,FILTER_VALIDATE_INT)){
    die("Error!");
  }

  include_once '../_includes/_templates/header.php';
  include_once '../_includes/_templates/barra.php';
  include_once '../_includes/_templates/navegacion.php';


  $sql = "SELECT idproducto, pidcategoria, pidsubcategoria, modeloDesc, pdescripcion, precio, datasheet, instructivo, categoria, subcategoria, producto, marca, modelo, pactivo, visitas, porden ";
  $sql .= "FROM producto ";
  $sql .= "INNER JOIN categoria ";
  $sql .= "ON producto.pidcategoria=categoria.idcategoria ";
  $sql .= "INNER JOIN subcategoria ";
  $sql .= "ON producto.pidsubcategoria=subcategoria.idsubcategoria ";
  $sql .= "WHERE idproducto = $id ";
  $sql .= "ORDER BY idproducto";
  $resultado = $conn->query($sql);
  $producto = $resultado->fetch_assoc();

/*
  echo "<pre>";
    var_dump($row);
  echo "</pre>";
*/
 ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Editar Categría
       <small>Realiza los cambios necesarios en el formulario.</small>
     </h1>
   </section>




   <!-- Main content -->
   <section class="content">
     <!-- Default box -->
     <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Formulario de edición de categoria</h3>
       </div>
       <div class="box-body">
         <div class="col-md-12">
           <form role="form" name="subirArchivo" id="subirArchivo" method="post" action="ajax.php" enctype="multipart/form-data">
             <div class="box-body">

               <div class="spaceBetween">
                     <div class="columna">
                                    <div class="form-group">
                                      <label for="nombre">Categoria:</label>
                                      <input type="text" name="categoria" class="form-control" id="categoria" disabled value="<?php echo $producto['categoria']; ?>">
                                    </div>
                                    <div class="form-group">
                                       <label for="nombre">SubCategoria:</label>
                                       <input type="text" name="subcategoria" class="form-control" disabled id="subcategoria" value="<?php echo $producto['subcategoria']; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="usuario">Producto:</label>
                                      <input type="text" name="producto" class="form-control" id="producto" value="<?php echo $producto['producto']; ?>">
                                    </div>
                                    <label for="usuario">Marca:</label>
                                    <select class="form-control" name="marca" id="marca">
                                      <option value="0">Seleccione una marca</option>
                                            <?php
                                                    $addMarcas = mysqli_query($conn, "SELECT * FROM marcas");
                                                    while ($addMarca = mysqli_fetch_array($addMarcas)) {
                                                      if ($addMarca['idmarca']==$producto['marca']) {
                                                        $mactivo= " selected";
                                                      }else{
                                                        $mactivo= "";
                                                      }
                                                      echo "<option value=".$addMarca['idmarca']." ".$mactivo.">".$addMarca['marca_nombre']."</option>";
                                                    }
                                             ?>
                                    </select>
                                    <div class="form-group">
                                      <label for="usuario">Modelo:</label>
                                      <input type="text" name="modelo" class="form-control" id="modelo" value="<?php echo $producto['modelo']; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="usuario">Modelo (Desc Min):</label>
                                      <input type="text" name="modeloDesc" class="form-control" id="modeloDesc" value="<?php echo $producto['modeloDesc']; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="nombre">Estará activa en la pagina web?</label>
                                         <div class="radio">
                                             <input type="radio" name="activado" id="activado1" value="1" <?php echo $activo ?>>Activado
                                         </div>
                                         <div class="radio">
                                             <input type="radio" name="activado" id="activado2" value="0" <?php echo $inactivo ?>>Desactivado
                                         </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="usuario">Descripción:</label>
                                       <textarea name="descripcion" class="form-control" id="descripcion" rows="7" placeholder="Capture la descripción de la categoria"><?php echo $producto['pdescripcion']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label for="nombre">Ordenamiento:</label>
                                      <input type="text" name="ordenamiento" class="form-control" id="ordenamiento" value="<?php echo $producto['porden']; ?>" placeholder="">
                                    </div>
                                    <div class="form-group">
                                      <label for="nombre">Precio:</label>
                                      <input type="text" name="precio" class="form-control" id="precio" value="<?php echo $producto['precio']; ?>" placeholder="">
                                    </div>

                  </div><!--columna-->
                  <div class="columna">
                        <div class="titulo">
                            <h2>Fotografias</h2>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalAdd">Agregar Fotografía</button>
                        </div><!--titlulo-->

                        <div class="editImgProd">

                          <?php

                          try {
                            $sql = "SELECT * FROM prod_imagenes WHERE iidproducto = $id";
                            $imagenes = $conn->query($sql);
                          } catch (Exception $e) {
                            $error = $e->getMessage();
                            echo $error;
                          }
                          while ($imagen = $imagenes->fetch_assoc()) {
                           ?>

                            <div class="prodImgCont columnCenterCenter">
                                  <div class="imgCont">
                                        <img src="/../../img/productos/<?php echo $imagen['Imagen']; ?>" alt="">
                                        <?php if ($imagen['principal'] == 1) {?>
                                            <div class="imgPrin">
                                                <!--<i class="fas fa-rocket"></i>-->
                                                <i class="fas fa-meteor"></i>
                                            </div>
                                        <?php } ?>
                                        <?php if ($imagen['icono'] == 1) {?>
                                          <div class="imgIco">
                                              <i class="fas fa-star"></i>
                                              <!--<i class="fas fa-rocket"></i>-->
                                          </div>
                                        <?php } ?>
                                  </div><!--imgCont-->
                                  <div class="btnCont spaceBetween">
                                        <?php if ($imagen['principal'] == 0 AND $imagen['icono'] == 0) {?>
                                            <a data-toggle="modal" data-target="#modal-<?php echo $imagen['idprodImagen']; ?>" class="imgElim"><i class="far fa-trash-alt"></i></a>
                                        <?php } ?>
                                        <?php if ($imagen['icono'] == 0) { ?>
                                            <a class="imgIco" href="ajaxImg.php?id=<?php echo $id; ?>&id_cat=<?php echo $id_cat; ?>&id_Scat=<?php echo $id_Scat; ?>&id_act=<?php echo $id_act; ?>&operacion=icono&id_Img=<?php echo $imagen['idprodImagen']; ?>"><i class="fas fa-star"></i></a>
                                          <?php } ?>
                                          <?php if ($imagen['principal'] == 0) { ?>
                                            <a class="imgPrin" href="ajaxImg.php?id=<?php echo $id; ?>&id_cat=<?php echo $id_cat; ?>&id_Scat=<?php echo $id_Scat; ?>&id_act=<?php echo $id_act; ?>&operacion=principal&id_Img=<?php echo $imagen['idprodImagen']; ?>"><i class="fas fa-meteor"></i></a>
                                        <?php } ?>
                                  </div><!--btnCont-->
                            </div><!--prodImgCont-->

                            <!--MODAL-->
                                  <div class="modal fade" id="modal-<?php echo $imagen['idprodImagen']; ?>">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Eliminar Imagen</h4>
                                      </div>
                                      <div class="modal-body spaceBetween">
                                        <div class="columna">
                                          <p>Esta seguro que quiere borrar Esta imagen <?php echo $imagen['idprodImagen']; ?><br>Esta acción no se podrá recuperar</p>
                                        </div>
                                        <div class="columna imgSmall">
                                            <img src="/../../img/productos/<?php echo $imagen['Imagen']; ?>" alt="">
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                                        <a href="ajaxImg.php?id=<?php echo $id; ?>&id_cat=<?php echo $id_cat; ?>&id_Scat=<?php echo $id_Scat; ?>&id_act=<?php echo $id_act; ?>&operacion=borrar&id_Img=<?php echo $imagen['idprodImagen']; ?>" class="imgElim"><i class="far fa-trash-alt"></i>  Si, Eliminar Permanentemente</a>
                                      </div>
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            <!--FIN MODAL-->

                          <?php } ?>

                        </div><!--Imagenes-->

                  </div><!--columna-->

            </div><!--flexbox-->


                              <div class="flexRow">
                                <div class="texto-container">
                                    Seleccione aqui el archivo a subir<br>para revisar el archivo activo dar clic en la siguiente liga<br><a target="_blank" href="../../pdf/datasheet/<?php echo $producto['datasheet']; ?>"><?php echo $producto['datasheet']; ?></a>
                                </div>
                                <div class="form-group">
                                    <label for="archivo_sheet">Selecciona Archivo Datasheet:</label>
                                    <input type="file" id="archivo_sheet" name="archivo_datasheet">
                                    <p class="help-block">El archivo debe estar en formato PDF.</p>
                                </div>
                              </div>
                              <div class="flexRow">
                                <div class="texto-container">
                                    Seleccione aqui el archivo a subir<br>para revisar el archivo activo dar clic en la siguiente liga<br><a  target="_blank" href="../../pdf/manual/<?php echo $producto['instructivo']; ?>"><?php echo $producto['instructivo']; ?></a>
                                </div>
                                <div class="form-group">
                                    <label for="archivo_instructivo">Selecciona Archivo Intructivo:</label>
                                    <input type="file" id="archivo_instructivo" name="archivo_instructivo">
                                    <p class="help-block">El archivo debe estar en formato PDF.</p>
                                </div>
                              </div>

             </div>
             <!-- /.box-body -->

             <div class="box-footer">
               <input type="hidden" name="registro" value="edit">
               <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
               <button type="submit" class="btn btn-primary">Actualizar</button>
               <a href="index.php" class="btnBack">Cancelar</a>
             </div>
           </form>

         </div>

       </div>
       <!-- /.box-footer-->
     </div>
     <!-- /.box -->

     <!-- Modal -->
     <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Agregar Imagen</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div><!--modal-header-->

                    <div class="modal-body">
                        <form role="form" name="subirFoto" id="subirFoto" method="post" action="ajaxImg.php" enctype="multipart/form-data">
                          <div class="box-body">
                              <div class="form-group">
                                        <label for="archivo_imagen">Selecciona Imagen:</label>
                                        <input type="file" id="archivo_imagen" name="archivo_imagen">

                                        <p class="help-block">El archivo no debe exceder los 10mb.</p>
                              </div><!--form-group-->
                              <div class="box-footer">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="id_cat" value="<?php echo $id_cat; ?>">
                                    <input type="hidden" name="id_Scat" value="<?php echo $id_Scat; ?>">
                                    <input type="hidden" name="id_act" value="<?php echo $id_act; ?>">
                                    <input type="hidden" name="operacion" value="addFoto">
                                    <button type="submit" class="btn btn-primary">Añadir</button>
                              </div><!--box-footer-->
                            </div>
                        </form><!--subirArchivo-->
                    </div><!--modal-body-->
                    <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div><!--modal-footer-->
            </div><!--modal-content-->
         </div><!--modal-dialog-->
     </div><!--modal fade-->
     <!--FIN MODAL-->

     <div class="box-footer">
       Footer
     </div>

   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->



<?php include_once '../_includes/_templates/footer.php'; ?>
