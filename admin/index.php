<?php
  /*********************
  *CERRAR SESION*******
  ********************/
  session_start();
  if (isset($_GET['sesionOff'])) {
      $cerrar_sesion = $_GET['sesionOff'];
      if($cerrar_sesion) {
        session_destroy();
      }
  }

  include_once '_includes/_funciones/funciones.php';
  include_once '_includes/_templates/header.php';

 ?>
<body class="hold-transition login-page">

 <div class="login-box">
   <div class="login-logo">
     <a href="../index.php"><b>Idem</b>Secure</a>
   </div>
   <!-- /.login-logo -->
   <div class="login-box-body">
     <p class="login-box-msg">Registrate para iniciar tu sesión</p>

     <form name="login-admin-form" id="login-admin" method="post" action="funcionInicio.php">
       <div class="form-group has-feedback">
         <input type="text" name="usuario" class="form-control" placeholder="Usuario">
         <span class="glyphicon  form-control-feedback"><i class="fas fa-user"></i></span>
       </div>
       <div class="form-group has-feedback">
         <input type="password" name="password" class="form-control" placeholder="Password">
         <span class="glyphicon form-control-feedback"><i class="fas fa-unlock-alt"></i></span>
       </div>
       <div class="row">
         <!-- /.col -->
         <div class="col-xs-12">
           <input type="hidden" name="login-admin" value="1">
           <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
         </div>
         <!-- /.col -->
       </div>
     </form>


   </div>
   <!-- /.login-box-body -->
 </div>
 <!-- /.login-box -->

  <?php

    include_once '_includes/_templates/footer.php';

  ?>
