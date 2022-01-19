<?php


include_once '../../_includes/_funciones/bd_conexion.php';

if ($_POST['registro'] == "eliminar") {
      $id_borrar = $_POST['id'];
}else {
      $id_catCategoria = $_POST['id_catCategoria'];
      $id_catSubCategoria = $_POST['id_catSubCategoria'];
      $prodNombre = $_POST['prodNombre'];
      $prodMarca = $_POST['prodMarca'];
      $prodModelo = $_POST['prodModelo'];
      $prodActivo = $_POST['prodActivo'];
      $prodDesc = $_POST['prodDesc'];
      $prodVisita = $_POST['prodVisita'];
      $prodOrden = $_POST['prodOrden'];
      $prodImagen = $_POST['prodImagen'];
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
  //die(json_encode($respuesta));
*/


  $directorio = "../../img/productos/";

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
    /*
    $stmt = $conn->prepare("INSERT INTO productos(id_catCategoria, id_catSubCategoria, prodNombre, prodMarca, prodModelo, prodActivo, prodDesc, prodVisita, prodOrden, prodImagen) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param('iisssisiis', $id_catCategoria, $id_catSubCategoria, $prodNombre, $prodMarca, $prodModelo, $prodActivo, $prodDesc, $prodVisita, $prodOrden, $imagen_url);
    */
    $stmt = $conn->prepare("INSERT INTO productos(id_catCategoria, id_catSubCategoria) VALUES (?,?)");
    $stmt->bind_param('ii', $id_catCategoria, $id_catSubCategoria);
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

  try {
    $stmt = $conn->prepare("UPDATE catcategoria SET catCatNombre = ?, catCatDesc = ? WHERE id_catCategoria = ?");
    $stmt->bind_param('ssi', $categoria, $descripcion, $id_registro);
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
        $stmt = $conn->prepare("DELETE FROM catcategoria WHERE id_catCategoria = ?");
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
