<?php
include_once '../_includes/_funciones/sesiones.php';
include_once '../../_includes/_funciones/bd_conexion.php';
  $id = $_GET['id'];

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

  $sql = "SELECT * FROM admins WHERE id_admin = $id";

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
       Editar Usuario
       <small>Realiza los cambios necesarios en el formulario.</small>
     </h1>
   </section>

   <!-- Main content -->
   <section class="content">

     <!-- Default box -->
     <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Formulario de edición de usuario</h3>
       </div>

       <div class="editUserCont spaceBetween">

             <div class="box-body">
                     <div class="col-md-12">
                           <form role="form"name="editarRegistro" id="editarRegistro" method="post" action="ajax.php">
                             <div class="box-body">
                               <div class="form-group">
                                 <label for="usuario">Usuario</label>
                                 <input type="text" name="usuario" class="form-control" id="usuario" value="<?php echo $row['usuario']; ?>" placeholder="Captura el usuario para ingresar">
                               </div>
                               <div class="form-group">
                                 <label for="nombre">Nombre:</label>
                                 <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $row['nombre']; ?>" placeholder="Captura el nombre del usuario">
                               </div>
                               <!--
                               <div class="form-group">
                                 <label for="password">Contraseña</label>
                                 <input type="password" name="password" class="form-control" id="password" placeholder="Captura la contraseña">
                               </div>
                             -->

                             </div>
                             <!-- /.box-body -->

                             <div class="box-footer editBotones spaceBetween">
                               <input type="hidden" name="registro" value="edit">
                               <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                               <button type="submit" class="btn btn-primary" >Actualizar</button>
                               <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalCambioP">Cambiar Contraseña</button>
                             </div>
                           </form>
                     </div>
             </div><!-- /.box-body -->

             <div class="box-body">
                      <?php
                          $totalMod = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM adminpermisos WHERE paidadmin = ".$id));
                            if($totalMod==0){
                                 //echo "no hay registros";
                                 try {
                                   $sql = "SELECT * FROM admins";
                                   $resultado = $conn->query($sql);
                                 } catch (Exception $e) {
                                   $error = $e->getMessage();
                                   echo $error;
                                 }
                                 while ($admin = $resultado->fetch_assoc()) {



                                 }
                            }else{
                              echo "si hay registros";
                            }
                       ?>
                     <div class="col-md-12">
                           <form role="form"name="editarPermisos" id="editarPermisos" method="post" action="ajax.php">
<!--
                             <div class="userModulosCont">
                               <div class="userModulosTitulo">
                                 <div class="userModulosTituloCont spaceBetween">
                                   <label for="usuario">Usuario</label>
                                   <select name="id_modulo" id="id_modulo" class="form-control">
                                     <option value="1">Bloqueado</option>
                                     <option value="2">Solo Lectura</option>
                                     <option value="4">Usuario</option>
                                     <option value="8">Administrador</option>
                                   </select>
                                 </div>
                               </div>
                               <div class="userModulosSubMod">

                               </div>
                             </div>
-->
                             <div class="box-footer editBotones">
                               <input type="hidden" name="registro" value="edit">
                               <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                               <button type="submit" class="btn btn-primary" >Actualizar</button>
                             </div>
                           </form>
                     </div>
             </div><!-- /.box-body -->

       </div><!--editUserCont-->

     </div>
     <!-- /.box -->

     <div class="box-footer">
       Footer
     </div>

   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!--MODAL-->
       <div class="modal fade" id="ModalCambioP">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span></button>
             <h4 class="modal-title">Cambiar Password de <?php echo $row['nombre']; ?></h4>
           </div>
           <div class="modal-body">
             <form role="form" name="cambiarPassword" id="cambiarPassword" method="post" action="ajax.php">

               <div class="form-group">
                 <label for="password">Contraseña</label>
                 <input type="password" name="password" class="form-control" id="password" placeholder="Captura la contraseña">
               </div>
               <div class="form-group">
                 <label for="password">Repetir Contraseña</label>
                 <input type="password" name="repetir_contraseña" class="form-control" id="repetir_contraseña" placeholder="Captura la contraseña">
                 <label id="resultado_password" class="help_block"></label>
               </div>
               <div class="box-footer">
                 <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                 <input type="hidden" name="registro" value="CambioP">
                 <button type="submit" class="btn btn-primary" id="add_usuario">Añadir</button>
               </div>

             </form>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
           </div>
         </div>
         <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
     </div>
     <!-- /.modal -->
 <!--FIN MODAL-->

<?php include_once '../_includes/_templates/footer.php'; ?>
