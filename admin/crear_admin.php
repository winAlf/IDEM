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
        Crear Usuario
        <small>llenar formulario para crear un usuario.</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Formulario de creación de usuario</h3>
        </div>
        <div class="box-body">
          <div class="col-md-8">
                <form role="form"name="crear-admin" id="crear-admin" method="post" action="insertar_admin.php">
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

                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" name="agregar-admin" value="1">
                    <button type="submit" class="btn btn-primary">Añadir</button>
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

    include_once 'templates/footer.php';

  ?>
