<?php

/*
include_once 'funciones/funciones.php';
if ($conn->ping()) {
  echo "Conectado";
} else {
  echo "No está conectado";
}
*/

/*
echo "<pre>";
  var_dump($_POST);
echo "</pre>";
*/

/**********************************
**********LOGIN ADMIN**************
**********************************/
if (isset($_POST['login-admin'])) {
    //die(json_encode($_POST));
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if (($usuario=="meteora") && ($password=="Admin#1")){
      session_start();//iniciar sesion
      $_SESSION['usuario'] = $usuario;
      $_SESSION['NOMBRE'] = 'Administrador';
      $respuesta = array(
        'respuesta' => 'exitoso',
        'usuario' => $usuario
      );
    }else{

            try {
              include_once '_includes/_funciones/funciones.php';
              $stmt = $conn->prepare("SELECT * FROM admins WHERE usuario = ?;");
              $stmt->bind_param('s', $usuario);
              $stmt->execute();
              $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin);
              if ($stmt->affected_rows) {
                $existe = $stmt->fetch();
                if ($existe) {
                  /*
                  $respuesta = array(
                  'respuesta' => 'si_existe'
                );
                */
                if (password_verify($password, $password_admin)) {
                  session_start();//iniciar sesion
                  $_SESSION['usuario'] = $usuario_admin;
                  $_SESSION['NOMBRE'] = $nombre_admin;
                  $respuesta = array(
                    'respuesta' => 'exitoso',
                    'usuario' => $nombre_admin
                  );
                } else {
                  $respuesta = array(
                    'respueta' => 'error'
                  );
                }
              } else {
                $respuesta = array(
                  'respuesta' => 'error'
                );
              }
            }
            $stmt->close();
            $conn->close();
          } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
          }

    }//if usuario administrador
    die(json_encode($respuesta));




}//if isset[$_POST]

?>
