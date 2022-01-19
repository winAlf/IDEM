<?php
  include_once '../funciones/sesiones.php';
  include_once '../../_includes/_funciones/bd_conexion.php';
  $id = $_GET['id'];
  $id_cat = $_GET['id_cat'];
  $id_catS = $_GET['id_cats'];
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

  include_once '../templates/header.php';
  include_once '../templates/barra.php';
  include_once '../templates/navegacion.php';

  $sql = "SELECT * FROM `productos` WHERE id_productos = $id";
  $resultado = $conn->query($sql);
  $row = $resultado->fetch_assoc();

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
       Editar Productos
       <small>Realiza los cambios necesarios en el formulario.</small>
     </h1>
   </section>




   <!-- Main content -->
   <section class="content">
     <!-- Default box -->
     <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Formulario de edición de Productos</h3>
       </div>
       <div class="box-body">
         <div class="col-md-8">
           <form role="form" name="subirArchivo" id="subirArchivo" method="post" action="ajax.php" enctype="multipart/form-data">
             <div class="box-body">
               <?php
                   $catSel = "SELECT * FROM productos";
                   $categorias = $conn->query($catSel);
                ?>
               <div class="form-group">
                    <label>Categoría</label>
                    <select name="categoria" id="categoria" class="form-control">
                      <?php  while ($categoria = $categorias->fetch_assoc()) { ?>
                          <?php if ($categoria['id_catCategoria'] == $id_cat): ?>
                              <option selected value="<?php echo $categoria['id_catCategoria']; ?>"><?php echo $categoria['catCatNombre']; ?></option>
                          <?php else: ?>
                              <option value="<?php echo $categoria['id_catCategoria']; ?>"><?php echo $categoria['catCatNombre']; ?></option>
                          <?php endif; ?>
                      <?php } ?>
                    </select>
              </div>
               <div class="form-group">
                 <label for="nombre">SubCategoria:</label>
                 <input type="text" name="subcategoria" class="form-control" id="subcategoria" value="<?php echo $row['catSubCatNombre']; ?>" placeholder="Captura el nombre de la subcategoría">
               </div>
               <div class="form-group">
                 <label for="usuario">Descripción:</label>
                 <input type="text" name="descripcion" class="form-control" id="descripcion" value="<?php echo $row['catSubCatDesc']; ?>" placeholder="Captura la descripción de la subcategoria">
               </div>
               <div class="form-group">
                 <label for="nombre">Ordenamiento:</label>
                 <input type="text" name="ordenamiento" class="form-control" id="ordenamiento" value="<?php echo $row['catSubCatOrdenamiento']; ?>" placeholder="">
               </div>
               <div class="form-group">
                 <label for="nombre">Hay existencia del producto y está activo?</label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="activado" id="activado1" value="1" <?php echo $activo ?>>Activado
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="activado" id="activado2" value="0" <?php echo $inactivo ?>>Desactivado
                    </div>
                  </div>
                <div class="flexRow">
                      <div class="imgContenedor">
                          <img id="imgRegEdit" width="300" src="../../img/subcategorias/<?php echo $row['catSubCatImagen'] ?>" alt="">
                      </div>
                      <div class="form-group">
                          <label for="imagen_subcategoria">Selecciona Imagen:</label>
                          <input type="file" id="imagen_subcategoria" name="archivo_imagen">
                          <p class="help-block">La imagen debe ser del siguiente tamaño: .</p>
                      </div>
                </div>


             </div>
             <!-- /.box-body -->

             <div class="box-footer">
               <input type="hidden" name="registro" value="edit">
               <input type="hidden" name="id_registro" value="<?php echo $row['id_catSubCategoria']; ?>">
               <button type="submit" class="btn btn-primary">Actualizar</button>
             </div>
           </form>

         </div>

       </div>
       <!-- /.box-body -->

       <!-- /.box-footer-->
     </div>
     <!-- /.box -->

     <div class="box-footer">
       Footer
     </div>

   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->


  <?php

    include_once '../templates/footer.php';

  ?>
