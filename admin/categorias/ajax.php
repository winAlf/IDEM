<?php


include_once '../../_includes/_funciones/bd_conexion.php';

if ($_POST['registro'] == "eliminar") {
      $id_borrar = $_POST['id'];
}else {
      $categoria = $_POST['categoria'];
      $descripcion = $_POST['descripcion'];
      $orden = $_POST['orden'];
      $icono = $_POST['icono'];
      $activado = $_POST['activado'];
}


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

  /*
  $respuesta = array(
      'post' => $_POST,
      'file' => $_FILES
  );
  die(json_encode($respuesta));
  */

  $directorio = "../../img/categoria/";

  if(!is_dir($directorio)) {
    mkdir($directorio, 0755, true);
  }

  if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
    $imagen_url = $_FILES['archivo_imagen']['name'];
    $imagen_resultado = "Se subio correctamente";
  }else {
    $respuesta = array(
        'respuesta' => error_get_last()
    );
  }

  try {
    $stmt = $conn->prepare("INSERT INTO categoria (categoria, descripcion, orden, icono, activo, imagen) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param('ssisis', $categoria, $descripcion, $orden, $icono, $activado, $imagen_url);
    $stmt->execute();
    $id_insertado = $stmt->insert_id;//obtenemos el id insertado en base de datos del reporte del stmt
    if($stmt->affected_rows) {//si se afectaron bases de datos creamos un reporte de exito
      $respuesta = array(
        'respuesta' => 'exito',
        'id_insertado' => $id_insertado,
        'resultado_imagen' => $imagen_resultado
      );
    }else{
      //die(json_encode($_POST));
      $respuesta = array(
        'respuesta' => 'error'
      );
    }//if
    $stmt->close();
    $conn->close();
  } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
  }
  die(json_encode($respuesta));
}//if _POST registro

/**********************************
**********Editar******************
**********************************/
if ($_POST['registro'] == "edit") {
  $id_registro = $_POST['id_registro'];
  //die(json_encode($_POST));

  $directorio = "../../img/categoria/";

  if(!is_dir($directorio)) {
    mkdir($directorio, 0755, true);
  }

  if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
    $imagen_url = $_FILES['archivo_imagen']['name'];
    $imagen_resultado = "Se subio correctamente";
  }else {
    $respuesta = array(
        'respuesta' => error_get_last()
    );
  }

  try {
    if ($_FILES['archivo_imagen']['size'] > 0) {
      //viene una imagen seleccionada
      $stmt = $conn->prepare("UPDATE categoria SET categoria=?,descripcion=?,orden=?,icono=?,activo=?,imagen=? WHERE idcategoria = ?");
      $stmt->bind_param('ssisisi', $categoria, $descripcion, $orden, $icono, $activado, $imagen_url, $id_registro);
    } else {
      //NO viene una imagen seleccionada
      $stmt = $conn->prepare("UPDATE categoria SET categoria=?,descripcion=?,orden=?,icono=?,activo=? WHERE idcategoria = ?");
      $stmt->bind_param('ssisii', $categoria, $descripcion, $orden, $icono, $activado, $id_registro);
    }
    $stmt->execute();
    $registros = $stmt->affected_rows;
    if ($registros>0) {
          $respuesta = array(
            'respuesta' => 'exito',
            'id_actualizado' => $id_registro
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
        $stmt = $conn->prepare("DELETE FROM categoria WHERE idcategoria = ?");
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

?>
