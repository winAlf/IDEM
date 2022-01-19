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
       Usuarios
       <small>Permite Editar Usuarios del Sistema.</small>
     </h1>
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Tabla de usuarios</h3>
           </div>
           <!-- /.box-header -->
           <div class="box-body col-xs-8">
             <!-- Button trigger modal -->
             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalAdd">Agregar</button>

             <table id="registros" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Usuario</th>
                 <th>Nombre</th>
                 <th>Acciones</th>
               </tr>
               </thead>
               <tbody>

                 <?php
                    try {
                      $sql = "SELECT * FROM admins";
                      $resultado = $conn->query($sql);
                    } catch (Exception $e) {
                      $error = $e->getMessage();
                      echo $error;
                    }
                    while ($admin = $resultado->fetch_assoc()) { ?>
                          <tr>
                              <td><?php echo $admin['usuario']; ?></td>
                              <td><?php echo $admin['nombre']; ?></td>
                              <td>
                                    <a href="editar.php?id=<?php echo $admin['id_admin'] ?>" class="btn bg-orange btn-flat margin"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="" data-id="<?php echo $admin['id_admin'] ?>" data-tipo="admin" class="btn btn-danger btn-flat margin borrar_registro"><i class="fas fa-trash-alt"></i></i></a>
                              </td>
                          </tr>
                    <?php } ?>

               </tbody>
               <tfoot>
                 <tr>
                   <th>Usuario</th>
                   <th>Nombre</th>
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
         <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>


       <div class="modal-body">
         <form role="form" name="crearRegistro" id="crearRegistro" method="post" action="ajax.php">
           <div class="box-body">
             <div class="form-group">
               <label for="usuario">Usuario</label>
               <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Captura el usuario para ingresar">
             </div>
             <div class="form-group">
               <label for="nombre">Nombre:</label>
               <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Captura el nombre del usuario">
             </div>
             <div class="form-group">
               <label for="password">Contraseña</label>
               <input type="password" name="password" class="form-control" id="password" placeholder="Captura la contraseña">
             </div>
             <div class="form-group">
               <label for="password">Repetir Contraseña</label>
               <input type="password" name="repetir_contraseña" class="form-control" id="repetir_contraseña" placeholder="Captura la contraseña">
               <label id="resultado_password" class="help_block"></label>
             </div>

           </div>
           <!-- /.box-body -->

           <div class="box-footer">
             <input type="hidden" name="registro" value="add">
             <button type="submit" class="btn btn-primary" id="add_usuario">Añadir</button>
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

<?php include_once '../_includes/_templates/footer.php'; ?>
