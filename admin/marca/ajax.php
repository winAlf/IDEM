<?php


include_once '../../_includes/_funciones/bd_conexion.php';

if ($_POST['registro'] == "eliminar") {
      $id_borrar = $_POST['id'];
}else {
      $marca = $_POST['marca'];
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

  $directorio = "../../img/marcas/";

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
      $stmt = $conn->prepare("INSERT INTO marcas (marca_nombre, marca_imagen, marca_activo) VALUES (?,?,?)");
      $stmt->bind_param('ssi', $marca, $imagen_url, $activado);
    } else {
      //NO viene una imagen seleccionada
      $stmt = $conn->prepare("INSERT INTO marcas (marca_nombre, marca_activo) VALUES (?,?)");
      $stmt->bind_param('si', $marca, $activado);
    }

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

  $directorio = "../../img/marcas/";

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
      $stmt = $conn->prepare("UPDATE marcas SET marca_nombre=?,marca_imagen=?,marca_activo=? WHERE idmarca = ?");
      $stmt->bind_param('ssii', $marca, $imagen_url, $activado, $id_registro);
    } else {
      //NO viene una imagen seleccionada
      $stmt = $conn->prepare("UPDATE marcas SET marca_nombre=?, marca_activo=? WHERE idmarca = ?");
      $stmt->bind_param('sii', $marca, $activado, $id_registro);
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
        $stmt = $conn->prepare("DELETE FROM marcas WHERE  	idmarca = ?");
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
