<?php
include_once '../_includes/_funciones/sesiones.php';
include_once '../../_includes/_funciones/bd_conexion.php';
  $id = $_GET['id'];
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

  $sql = "SELECT * FROM categoria WHERE idcategoria = $id";
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
       Editar Categorías
       <small>Realiza los cambios necesarios en el formulario.</small>
     </h1>
   </section>




   <!-- Main content -->
   <section class="content">
     <!-- Default box -->
     <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Formulario de edición de categorias</h3>
       </div>
       <div class="box-body">
         <div class="col-md-8">
           <form role="form" name="subirArchivo" id="subirArchivo" method="post" action="ajax.php" enctype="multipart/form-data">
             <div class="box-body">
               <div class="form-group">
                 <label for="nombre">Categoria:</label>
                 <input type="text" name="categoria" class="form-control" id="categoria" value="<?php echo $row['categoria']; ?>">
               </div>
               <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="descripcion" class="form-control" id="descripcion" rows="4"><?php echo $row['descripcion']; ?></textarea>
                  </div>
               <div class="form-group">
                 <label for="nombre">Orden:</label>
                 <input type="text" name="orden" class="form-control" id="orden" value="<?php echo $row['orden']; ?>">
               </div>
               <div class="form-group">
                 <label for="nombre">Ícono:</label>
                 <input type="text" name="icono" class="form-control" id="icono" value="<?php echo $row['icono']; ?>">
               </div>
               <div class="form-group">
                 <label for="nombre">Quieres que aparezca la categoría en el sitio web?</label>
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

                          <img id="imgRegEdit" width="300" src="../../img/categoria/<?php echo $row['imagen'] ?>" alt="">
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
               <input type="hidden" name="id_registro" value="<?php echo $row['idcategoria']; ?>">
               <button type="submit" class="btn btn-primary">Actualizar</button>
               <a href="index.php" class="btnBack">Cancelar</a>
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


  <?php include_once '../_includes/_templates/footer.php'; ?>
