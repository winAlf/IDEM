<?php
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';

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
                                    <a href="editar_admin.php?id=<?php echo $admin['id_admin'] ?>" class="btn bg-orange btn-flat margin"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" data-id="<?php echo $admin['id_admin'] ?>" data-tipo="admin" class="btn btn-danger btn-flat margin borrar_registro"><i class="fas fa-trash-alt"></i></i></a>
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

  <?php

    include_once 'templates/footer.php';

  ?>
