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

  $sql = "SELECT * FROM banner WHERE idBanner = $id";
  $resultado = $conn->query($sql);
  $row = $resultado->fetch_assoc();

  $id_actBoton = $row['boton'];
  switch ($id_actBoton) {
    case '1':
      $activoB="checked";
      $inactivoB="";
      break;
    default:
      $activoB="";
      $inactivoB="checked";
      break;
  }

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
                 <label for="usuario">Nombre:</label>
                 <input type="text" name="nombre" value="<?php echo $row['nombre'] ?>" class="form-control" id="nombre" >
               </div>
               <div class="form-group">
                 <label for="usuario">Texto:</label>
                 <input type="text" name="texto" value="<?php echo $row['texto'] ?>" class="form-control" id="texto" >
               </div>
               <div class="form-group">
                 <label for="usuario">Orden:</label>
                 <input type="number" name="orden" value="<?php echo $row['orden'] ?>" class="form-control" id="orden" placeholder="Captura el orden que quieres que aparezca">
               </div>
               <div class="form-group">
                 <label for="nombre">El banner estará activo en el sitio web?</label>
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
               <div class="form-group">
                    <label for="imagen_subcategoria">Selecciona Imagen:</label>
                    <input type="file" id="imagen_cliente" name="archivo_imagen">

                    <p class="help-block">La imagen debe ser del siguiente aspecto ratio: 1312 x 728 px.</p>
                    <img class="formImg" src="/img/<?php echo $row['imgBanner']; ?>" alt="">
               </div>
               <div class="form-group">
                 <label for="nombre">La banner tiene botón?</label>
                    <div class="radio">

                      <label>
                        <input type="radio" name="boton" id="activadoB1" value="1" <?php echo $activoB ?>>Con botón
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="boton" id="activadoB2" value="0" <?php echo $inactivoB ?>>Sin botón
                    </div>
               </div>
               <div class="form-group">
                 <label for="usuario">Liga:</label>
                 <input type="text" name="liga" value="<?php echo $row['ligaBoton'] ?>" class="form-control" id="liga" >
               </div>
               <div class="form-group">
                 <label for="usuario">Texto del Botón:</label>
                 <input type="text" name="textoBoton" value="<?php echo $row['textoBoton'] ?>" class="form-control" id="textoBoton" >
               </div>


             </div>
             <!-- /.box-body -->

             <div class="box-footer">
               <input type="hidden" name="registro" value="edit">
               <input type="hidden" name="id_registro" value="<?php echo $row['idBanner']; ?>">
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
