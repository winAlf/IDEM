<?php


include_once '../../_includes/_funciones/bd_conexion.php';

if ($_POST['registro'] == "eliminar") {
      $id_borrar = $_POST['id'];
}elseif ($_POST['registro'] == "addFoto") {
      $id_registro = $_POST['id_registro'];
}else {
  $producto = $_POST['producto'];
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $modeloDesc = $_POST['modeloDesc'];
  $activado = $_POST['activado'];
  $descripcion = $_POST['descripcion'];
  $ordenamiento = $_POST['ordenamiento'];
  $precio = $_POST['precio'];
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
********AGREGAR**FOTO**************
**********************************/
if ($_POST['registro'] == "addFoto") {

  /*
  $respuesta = array(
      'post' => $_POST,
      'file' => $_FILES
  );
  die(json_encode($respuesta));
  */

  $directorio = "../../img/productos/";

  if(!is_dir($directorio)) {
    mkdir($directorio, 0755, true);
  }

  if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
    $archivo_imagen = $_FILES['archivo_imagen']['name'];
    $imagen_resultado = "Se subio correctamente";
  }else {
    $respuesta = array(
        'respuesta' => error_get_last()
    );
  }

  try {
    $stmt = $conn->prepare("INSERT INTO prod_imagenes (iidproducto, Imagen) VALUES (?, ?)");
    $stmt->bind_param('is', $id_registro, $archivo_imagen);
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
**********AGREGAR******************
**********************************/
if ($_POST['registro'] == "add") {

  $categoria = $_POST['id_categoria'];
  $subcategoria = $_POST['id_subcategoria'];

  /*
  $respuesta = array(
      'post' => $_POST,
      'file' => $_FILES
  );
  die(json_encode($respuesta));
  */

  $directorio = "../../pdf/datasheet/";

  if(!is_dir($directorio)) {
    mkdir($directorio, 0755, true);
  }

  if (move_uploaded_file($_FILES['archivo_datasheet']['tmp_name'], $directorio . $_FILES['archivo_datasheet']['name'])) {
    $archivo_data = $_FILES['archivo_datasheet']['name'];
    $imagen_resultado = "Se subio correctamente";
  }else {
    $respuesta = array(
        'respuesta' => error_get_last()
    );
  }

  $directorio2 = "../../pdf/manual/";

  if(!is_dir($directorio2)) {
    mkdir($directorio2, 0755, true);
  }

  if (move_uploaded_file($_FILES['archivo_instructivo']['tmp_name'], $directorio2 . $_FILES['archivo_instructivo']['name'])) {
    $archivo_inst = $_FILES['archivo_instructivo']['name'];
    $imagen_resultado = "Se subio correctamente";
  }else {
    $respuesta = array(
        'respuesta' => error_get_last()
    );
  }





  if ($_FILES['archivo_datasheet']['size'] > 0) {
    $datasheetCount = 2;
  }else{
    $datasheetCount = 4;
  }

  if ($_FILES['archivo_instructivo']['size'] > 0) {
    $instructivoCount = 8;
  }else{
    $instructivoCount = 16;
  }

  $archivoTotal = $instructivoCount + $datasheetCount;

  try {
    if ($archivoTotal == 10) {
        $stmt = $conn->prepare("INSERT INTO producto (pidcategoria, pidsubcategoria, producto, marca, modelo, modeloDesc, pactivo, pdescripcion, porden, instructivo, precio, datasheet) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('iisissisisis', $categoria, $subcategoria, $producto, $marca, $modelo, $modeloDesc, $activado, $descripcion, $ordenamiento, $archivo_inst, $precio, $archivo_data);
    }elseif ($archivoTotal == 18) {
        $stmt = $conn->prepare("INSERT INTO producto (pidcategoria, pidsubcategoria, producto, marca, modelo, modeloDesc, pactivo, pdescripcion, porden, precio, datasheet) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('iisissisiis', $categoria, $subcategoria, $producto, $marca, $modelo, $modeloDesc, $activado, $descripcion, $ordenamiento, $precio, $archivo_data);
    }elseif ($archivoTotal == 12) {
        $stmt = $conn->prepare("INSERT INTO producto (pidcategoria, pidsubcategoria, producto, marca, modelo, modeloDesc, pactivo, pdescripcion, porden, instructivo, precio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('iisissisisi', $categoria, $subcategoria, $producto, $marca, $modelo, $modeloDesc, $activado, $descripcion, $ordenamiento, $archivo_inst, $precio);
    }elseif ($archivoTotal == 20) {
        $stmt = $conn->prepare("INSERT INTO producto (pidcategoria, pidsubcategoria, producto, marca, modelo, modeloDesc, pactivo, pdescripcion, porden, precio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('iisissisii', $categoria, $subcategoria, $producto, $marca, $modelo, $modeloDesc, $activado, $descripcion, $ordenamiento, $precio);
    }

    $stmt->execute();
    $id_insertado = $stmt->insert_id;//obtenemos el id insertado en base de datos del reporte del stmt
    if($stmt->affected_rows) {//si se afectaron bases de datos creamos un reporte de exito
      $respuesta = array(
        'respuesta' => 'exito',
        'id_insertado' => $id_insertado
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

  $directorio = "../../pdf/datasheet/";

  if(!is_dir($directorio)) {
    mkdir($directorio, 0755, true);
  }

  if (move_uploaded_file($_FILES['archivo_datasheet']['tmp_name'], $directorio . $_FILES['archivo_datasheet']['name'])) {
    $archivo_data = $_FILES['archivo_datasheet']['name'];
    $imagen_resultado = "Se subio correctamente";
  }else {
    $respuesta = array(
        'respuesta' => error_get_last()
    );
  }

  $directorio2 = "../../pdf/manual/";

  if(!is_dir($directorio2)) {
    mkdir($directorio2, 0755, true);
  }

  if (move_uploaded_file($_FILES['archivo_instructivo']['tmp_name'], $directorio2 . $_FILES['archivo_instructivo']['name'])) {
    $archivo_inst = $_FILES['archivo_instructivo']['name'];
    $imagen_resultado = "Se subio correctamente";
  }else {
    $respuesta = array(
        'respuesta' => error_get_last()
    );
  }

  if ($_FILES['archivo_datasheet']['size'] > 0) {
    $datasheetCount = 2;
  }else{
    $datasheetCount = 4;
  }

  if ($_FILES['archivo_instructivo']['size'] > 0) {
    $instructivoCount = 8;
  }else{
    $instructivoCount = 16;
  }

  $archivoTotal = $instructivoCount + $datasheetCount;

  try {
    if ($archivoTotal == 10) {
        $stmt = $conn->prepare("UPDATE producto SET producto=?, marca=?, modelo=?, modeloDesc=?,pactivo=?, pdescripcion=?, datasheet=?, porden=?, instructivo=?, precio=? WHERE idproducto = ?");
        $stmt->bind_param('sississisii', $producto, $marca, $modelo, $modeloDesc, $activado, $descripcion, $archivo_data, $ordenamiento, $archivo_inst, $precio, $id_registro);
    }elseif ($archivoTotal == 18) {
        $stmt = $conn->prepare("UPDATE producto SET producto=?, marca=?, modelo=?, modeloDesc=?,pactivo=?, pdescripcion=?, datasheet=?, porden=?, precio=? WHERE idproducto = ?");
        $stmt->bind_param('sississiii', $producto, $marca, $modelo, $modeloDesc, $activado, $descripcion, $archivo_data, $ordenamiento, $precio, $id_registro);
    }elseif ($archivoTotal == 12) {
        $stmt = $conn->prepare("UPDATE producto SET producto=?, marca=?, modelo=?, modeloDesc=?,pactivo=?, pdescripcion=?, porden=?, instructivo=?, precio=? WHERE idproducto = ?");
        $stmt->bind_param('sissisisii', $producto, $marca, $modelo, $modeloDesc, $activado, $descripcion, $ordenamiento, $archivo_inst, $precio, $id_registro);
    }elseif ($archivoTotal == 20) {
        $stmt = $conn->prepare("UPDATE producto SET producto=?, marca=?, modelo=?, modeloDesc=?,pactivo=?, pdescripcion=?, porden=?, precio=? WHERE idproducto = ?");
        $stmt->bind_param('sissisiii', $producto, $marca, $modelo, $modeloDesc, $activado, $descripcion, $ordenamiento, $precio, $id_registro);
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
        $stmt = $conn->prepare("DELETE FROM producto WHERE idproducto = ?");
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
********SELECT CATEGORIA***********
**********************************/
if ($_POST['registro'] == "selectCat") {
  //die(json_encode($_POST));

  if(isset($_POST['id_select'])) {
      //Conexion

      //Obtenemos el valor de la variable de Ajax (es decir, el ID).
      $id_select = mysqli_real_escape_string($conn,$_POST['id_select']);
      //$id_select = $_POST['id_select'];
      //Sentencia -> mostramos resultao segun el 'ID' de nuestro articulo via AJAX.
      $sql = mysqli_query($conn, "SELECT * FROM subcategoria WHERE sidcategoria='$id_select'");

      //echo "<option value=0>Selecciona tu apartado</option>"; //Si no quieres mostrar este mensaje, podrias quitarla.

      //Comprobamos existencias.
      if (mysqli_num_rows($sql) > 0) {

          //Salida data.
          while ($reg = mysqli_fetch_array($sql)) {
              //Obtenemos datos asociados desde la Base de datos.
              $id_bd = $reg['idsubcategoria'];
              $artic_apartado = $reg['subcategoria'];
              //Option modificado :)
              echo "<option value='$id_bd'>" . $artic_apartado . "</option>";
          }

      }
        $conn->close();
    }//if id_select

}//if ($_POST['registro'



?>
