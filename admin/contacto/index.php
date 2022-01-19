<?php
  include_once '../_includes/_funciones/sesiones.php';
  include_once '../../_includes/_funciones/bd_conexion.php';
  include_once '../_includes/_templates/header.php';
  include_once '../_includes/_templates/barra.php';
  include_once '../_includes/_templates/navegacion.php';

  if ($_GET['n'] == "1") {
    $condicion = " WHERE visitado = 0";
  }else{
    $condicion = "";
  }

 ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Contactos
       <small>muestra la información enviada por el cliente desde el sitio web.</small>
     </h1>
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Tabla de contacto</h3>
           </div>

           <!-- /.box-header -->
           <div class="box-body col-xs-12">


             <table id="registros" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Visitado</th>
                 <th>Nombre</th>
                 <th>Telefono</th>
                 <th>Correo Electronico</th>
                 <th>Fecha</th>
                 <th>Acciones</th>
               </tr>
               </thead>
               <tbody>

                 <?php
                    try {
                      $sql = "SELECT * FROM contacto";
                      $sql = $sql . $condicion;
                      $resultado = $conn->query($sql);
                    } catch (Exception $e) {
                      $error = $e->getMessage();
                      echo $error;
                    }
                    while ($admin = $resultado->fetch_assoc()) { ?>
                          <tr>
                              <td>
                                  <?php if ($admin['visitado'] == 0): ?>
                                    <p id="contNuevo">v<i class="fas fa-eye-slash"></i></p>
                                  <?php else: ?>
                                    <p id="contVisitado">n<i class="fas fa-eye"></i></p>
                                  <?php endif; ?>
                              </td>
                              <td><?php echo $admin['cont_nombre']; ?></td>
                              <td><?php echo $admin['cont_telefono']; ?></td>
                              <td><?php echo $admin['cont_correo']; ?></td>
                              <td><?php echo $admin['fecha']; ?></td>
                              <td>
                                <!-- Button trigger modal -->
                                <button type="button" data-id="<?php echo $admin['id_contacto'] ?>" data-visita="<?php echo $admin['visitado'] ?>" class="btn btn-success contacto_visitado" data-toggle="modal" data-target="#ModalAdd<?php echo $admin['id_contacto']; ?>"><i class="fas fa-glasses"></i></button>
                              </td>
                          </tr>

                          <!-- Modal -->
                          <div class="modal fade" id="ModalAdd<?php echo $admin['id_contacto']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Datos de Contacto</h5>
                                </div>

                                <div class="modal-body">
                                  <form role="form" name="crearRegistro" id="crearRegistro" method="post" action="ajax.php">
                                    <div class="box-body">
                                      <div class="form-group">
                                        <label for="usuario">Nombre:</label>
                                        <p><?php echo $admin['cont_nombre']; ?></p>
                                      </div>
                                      <div class="form-group">
                                        <label for="nombre">Telefono:</label>
                                        <p><?php echo $admin['cont_nombre']; ?></p>
                                      </div>
                                      <div class="form-group">
                                        <label for="password">Email:</label>
                                        <p><?php echo $admin['cont_correo']; ?></p>
                                      </div>
                                      <div class="form-group">
                                        <label for="password">Interes:</label>
                                        <p><?php echo $admin['cont_mensaje']; ?></p>
                                      </div>
                                      <div class="form-group">
                                        <label for="password">Fecha:</label>
                                        <p><?php echo $admin['fecha']; ?></p>
                                      </div>
                                    </div>
                                    <!-- /.box-body - ->

                                    <div class="box-footer">
                                      <input type="hidden" name="registro" value="add">
                                      <button type="submit" class="btn btn-primary">Añadir</button>
                                    </div>-->
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
                   <th>Nombre</th>
                   <th>Telefono</th>
                   <th>Correo Electronico</th>
                   <th>Fecha</th>
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



  <?php

    include_once '../_includes/_templates/footer.php';

  ?>
