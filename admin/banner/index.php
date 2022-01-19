<?php
  include_once '../_includes/_funciones/sesiones.php';
  include_once '../../_includes/_funciones/bd_conexion.php';
  include_once '../_includes/_templates/header.php';
  include_once '../_includes/_templates/barra.php';
  include_once '../_includes/_templates/navegacion.php';
 ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Banner
       <small>Administración del banner del sitio web.</small>
     </h1>
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Tabla de Banners</h3>
           </div>

           <!-- /.box-header -->
           <div class="box-body col-xs-12">
             <!-- Button trigger modal -->
             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalAdd">Agregar</button>

             <table id="registros" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Orden</th>
                 <th>Banner</th>
                 <th>Texto</th>
                 <th>Activo</th>
                 <th>Imagen</th>
                 <th>Acciones</th>
               </tr>
               </thead>
               <tbody>

                 <?php
                    try {
                      $sql = "SELECT * FROM banner";
                      $banners = $conn->query($sql);
                    } catch (Exception $e) {
                      $error = $e->getMessage();
                      echo $error;
                    }
                    while ($banner = $banners->fetch_assoc()) { ?>
                          <tr>
                            <td><?php echo $banner['orden']; ?></td>
                            <td><?php echo $banner['nombre']; ?></td>
                            <td><?php echo $banner['texto']; ?></td>
                            <td>
                              <?php if ($banner['activo']==1): ?>
                                <p id="contVisitado">v<i class="fas fa-check-circle"></i></p>
                              <?php else: ?>
                                <p id="contNuevo">n<i class="fas fa-times-circle"></i></p>
                              <?php endif; ?>
                            </td>
                            <td><img class="formImg" src="/img/<?php echo $banner['imgBanner']; ?>" alt=""></td>
                            <td>
                                  <a href="editar.php?id=<?php echo $banner['idBanner'] ?>&id_act=<?php echo $banner['activo']; ?>" class="btn bg-orange btn-flat margin"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                          </tr>
                    <?php } ?>

               </tbody>
               <tfoot>
                 <tr>
                   <th>Orden</th>
                   <th>Banner</th>
                   <th>Texto</th>
                   <th>Activo</th>
                   <th>Imagen</th>
                   <th>Acciones</th>
                 </tr>
               </tfoot>
             </table>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </section>
   <!-- /.content -->


 </div>
 <!-- /.content-wrapper -->
 <!-- Modal -->
 <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
          <h5 class="modal-title" id="exampleModalLabel">Alta de Banner</h5>
       </div>

       <div class="modal-body">
         <form role="form" name="subirArchivo" id="subirArchivo" method="post" action="ajax.php" enctype="multipart/form-data">
           <div class="box-body">
             <div class="form-group">
               <label for="usuario">Nombre:</label>
               <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Captura el nombre del banner">
             </div>
             <div class="form-group">
               <label for="usuario">Texto:</label>
               <input type="text" name="texto" class="form-control" id="texto" placeholder="Captura el texto que aparecerá en el banner">
             </div>
             <div class="form-group">
               <label for="usuario">Orden:</label>
               <input type="number" name="orden" class="form-control" id="orden" placeholder="Captura el orden que quieres que aparezca">
             </div>
             <div class="form-group">
               <label for="nombre">La Marca estará activo en el sitio web?</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="activado" id="activado1" value="1" checked="">Activado
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="activado" id="activado2" value="0">Desactivado
                  </div>
             </div>
             <div class="form-group">
                  <label for="imagen_subcategoria">Selecciona Imagen:</label>
                  <input type="file" id="imagen_cliente" name="archivo_imagen">

                  <p class="help-block">La imagen debe ser del siguiente aspecto ratio: 1312 x 728 px.</p>
             </div>
             <div class="form-group">
               <label for="nombre">La banner tiene botón?</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="boton" id="activadoB1" value="1" checked="">Con botón
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="boton" id="activadoB2" value="0">Sin botón
                  </div>
             </div>
             <div class="form-group">
               <label for="usuario">Liga:</label>
               <input type="text" name="liga" class="form-control" id="liga" placeholder="Captura el la liga a la que llevará el botón">
             </div>
             <div class="form-group">
               <label for="usuario">Texto del Botón:</label>
               <input type="text" name="textoBoton" class="form-control" id="textoBoton" placeholder="Captura el texto en el botón">
             </div>


           </div>
           <!-- /.box-body -->

           <div class="box-footer">
             <input type="hidden" name="registro" value="add">
             <button type="submit" class="btn btn-primary">Añadir</button>
             <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
           </div>
         </form>
       </div>
       <div class="modal-footer">

       </div>
     </div>
   </div>
 </div>
 <!--FIN MODAL-->


<?php include_once '../_includes/_templates/footer.php'; ?>
