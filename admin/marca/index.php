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
       Marcas
       <small>Administración de las Marcas de productos.</small>
     </h1>
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Tabla de Marcas</h3>
           </div>

           <!-- /.box-header -->
           <div class="box-body col-xs-12">
             <!-- Button trigger modal -->
             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalAdd">Agregar</button>

             <table id="registros" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Marca</th>
                 <th>Activo</th>
                 <th>Imagen</th>
                 <th>Acciones</th>
               </tr>
               </thead>
               <tbody>

                 <?php
                    try {
                      $sql = "SELECT * FROM marcas";
                      $resultado = $conn->query($sql);
                    } catch (Exception $e) {
                      $error = $e->getMessage();
                      echo $error;
                    }
                    while ($admin = $resultado->fetch_assoc()) { ?>
                          <tr>
                            <td><?php echo $admin['marca_nombre']; ?></td>
                            <td>
                              <?php if ($admin['marca_activo']==1): ?>
                                <p id="contVisitado">v<i class="fas fa-check-circle"></i></p>
                              <?php else: ?>
                                <p id="contNuevo">n<i class="fas fa-times-circle"></i></p>
                              <?php endif; ?>
                            </td>
                            <td><img class="formImg" src="/img/marcas/<?php echo $admin['marca_imagen']; ?>" alt=""></td>
                            <td>
                                  <a href="editar.php?id=<?php echo $admin['idmarca'] ?>&id_act=<?php echo $admin['marca_activo']; ?>" class="btn bg-orange btn-flat margin"><i class="fas fa-pencil-alt"></i></a>
                                  <!--<a href="" data-id="<?php //echo $admin['idmarca'] ?>" class="btn btn-danger btn-flat margin borrar_registro"><i class="fas fa-trash-alt"></i></i></a>-->
                            </td>
                          </tr>

                          <!-- Modal -->
                          <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Alta de Marca</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

                                <div class="modal-body">
                                  <form role="form" name="subirArchivo" id="subirArchivo" method="post" action="ajax.php" enctype="multipart/form-data">
                                    <div class="box-body">
                                      <div class="form-group">
                                        <label for="usuario">marca:</label>
                                        <input type="text" name="marca" class="form-control" id="marca" placeholder="Captura el nombre de la marca">
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

                                           <p class="help-block">La imagen debe ser del siguiente tamaño: .</p>
                                       </div>

                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                      <input type="hidden" name="registro" value="add">
                                      <button type="submit" class="btn btn-primary">Añadir</button>
                                    </div>
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--FIN MODAL-->


                    <?php } ?>

               </tbody>
               <tfoot>
                 <tr>
                   <th>Marca</th>
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



<?php include_once '../_includes/_templates/footer.php'; ?>
