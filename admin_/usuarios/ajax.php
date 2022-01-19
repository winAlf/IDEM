<?php


include_once '../../_includes/_funciones/bd_conexion.php';

if ($_POST['registro'] == "eliminar") {
      $id_borrar = $_POST['id'];
}else if ($_POST['registro'] == "CambioP"){
      $password = $_POST['password'];
}else{
      $usuario = $_POST['usuario'];
      $nombre = $_POST['nombre'];
}

//configuracion de la encriptacion de password
$opciones = array(
  'cost' => 12
);

/*
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
**********AGREGAR******************
**********************************/
if ($_POST['registro'] == "add") {
  $password = $_POST['password'];
  $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
  //echo $password_hashed;
  //die(json_encode($_POST));

  try {
    $stmt = $conn->prepare("INSERT INTO admins (usuario, nombre, password) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $usuario, $nombre, $password_hashed);
    $stmt->execute();
    $id_registro = $stmt->insert_id;//obtenemos el id insertado en base de datos del reporte del stmt
    if($id_registro > 0) {//si se afectaron bases de datos creamos un reporte de exito
      $respuesta = array(
        'respuesta' => 'exito',
        'id_admin' => $stmt
      );
    }else{
      $respuesta = array(
        'respuesta' => 'error'
      );
    }//if
    $stmt->close();
    $conn->close();
  } catch (\Exception $e) {
      echo "Error: " . $e->getMessage();
  }
  die(json_encode($respuesta));
}//if ($_POST['registro'

/**********************************
**********Editar******************
**********************************/
if ($_POST['registro'] == "edit") {
  $id_registro = $_POST['id_registro'];
  //die(json_encode($_POST));

  try {
    $stmt = $conn->prepare("UPDATE admins SET usuario = ?, nombre = ? WHERE id_admin = ?");
    $stmt->bind_param('ssi', $usuario, $nombre, $id_registro);
    $stmt->execute();
    if ($stmt->affected_rows) {
          $respuesta = array(
            'respuesta' => 'exito',
            'id_actualizado' => $stmt->insert_id
          );
    } else {
          $respuesta = array(
            'respuesta' => 'error'
          );
    }
    $stmt->close();
    $conn->close();
  } catch (Exception $e) {
          $respuesta = array(
            'respuesta' => $e->getMessage()
          );
  }
  die(json_encode($respuesta));

}

/**********************************
***********Eliminar****************
**********************************/
if ($_POST['registro'] == "eliminar") {
  //die(json_encode($_POST));

  try {
        $stmt = $conn->prepare("DELETE FROM admins WHERE id_admin = ?");
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if ($stmt->affected_rows) {
              $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
              );
        } else {
              $respuesta = array(
                'respuesta' => 'error'
              );
        }
        $stmt->close();
        $conn->close();
  } catch (Exception $e) {
          $respuesta = array(
            'respuesta' => $e->getMessage()
          );
  }
  die(json_encode($respuesta));
}//if ($_POST['registro'

/**********************************
********CAMBIAR PASSWORD***********
**********************************/
if ($_POST['registro'] == "CambioP") {
  $id_registro = $_POST['id_registro'];
  $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
  //echo $password_hashed;
  //die(json_encode($_POST));

  try {
    $stmt = $conn->prepare("UPDATE admins SET password = ? WHERE id_admin = ?");
    $stmt->bind_param('si', $password_hashed, $id_registro);
    $stmt->execute();
    if ($stmt->affected_rows) {
          $respuesta = array(
            'respuesta' => 'exito',
            'id_actualizado' => $stmt->insert_id
          );
    } else {
          $respuesta = array(
            'respuesta' => 'error'
          );
    }
    $stmt->close();
    $conn->close();
  } catch (Exception $e) {
          $respuesta = array(
            'respuesta' => $e->getMessage()
          );
  }
  die(json_encode($respuesta));
}



?>
