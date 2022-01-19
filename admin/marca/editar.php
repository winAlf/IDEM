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

  $sql = "SELECT * FROM marcas WHERE idmarca = $id";
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
       Editar Marcas
       <small>Realiza los cambios necesarios en el formulario.</small>
     </h1>
   </section>




   <!-- Main content -->
   <section class="content">
     <!-- Default box -->
     <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Formulario de edición de marcas</h3>
       </div>
       <div class="box-body">
         <div class="col-md-8">
           <form role="form" name="subirArchivo" id="subirArchivo" method="post" action="ajax.php" enctype="multipart/form-data">
             <div class="box-body">
               <div class="form-group">
                 <label for="nombre">Marca:</label>
                 <input type="text" name="marca" class="form-control" id="marca" value="<?php echo $row['marca_nombre']; ?>">
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

                          <img id="imgRegEdit" width="300" src="../../img/marcas/<?php echo $row['marca_imagen'] ?>" alt="">
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
               <input type="hidden" name="id_registro" value="<?php echo $row['idmarca']; ?>">
               <button type="submit" class="btn btn-primary">Actualizar</button>
               <a href="index.php" class="btnBack">Cancelar</a>
               <a href="" data-id="<?php echo $id ?>" class="btn btn-danger btn-flat margin borrar_registro"><i class="fas fa-trash-alt"></i></i></a>
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
