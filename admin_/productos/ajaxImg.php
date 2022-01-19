<?php


include_once '../../_includes/_funciones/bd_conexion.php';

if (isset($_POST['operacion'])) {
  $id = $_POST['id'];
  $id_cat = $_POST['id_cat'];
  $id_Scat = $_POST['id_Scat'];
  $id_act = $_POST['id_act'];
  $operacion = $_POST['operacion'];
}else{
  $id = $_GET['id'];
  $id_cat = $_GET['id_cat'];
  $id_Scat = $_GET['id_Scat'];
  $id_act = $_GET['id_act'];
  $operacion = $_GET['operacion'];
  $id_Img = $_GET['id_Img'];
}



/**********************************
********BORRAR***FOTO**************
**********************************/
if ($operacion == 'borrar') {

      try {
        $stmt = $conn->prepare("DELETE FROM `prod_imagenes` WHERE idprodImagen = ?");
        $stmt->bind_param('i', $id_Img);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;//obtenemos el id insertado en base de datos del reporte del stmt
        if($stmt->affected_rows) {//si se afectaron bases de datos creamos un reporte de exito
          $respuesta = array(
            'respuesta' => 'exito',
            'id_insertado' => $id_insertado,
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

      $location = "editar.php?id=".$id."&id_cat=".$id_cat."&id_Scat=".$id_Scat."&id_act=".$id_act;
      //echo $location;
      header("Location: $location");

}//if _POST registro


/**********************************
********AGREGAR***FOTO**************
**********************************/
if ($operacion == 'addFoto') {
  $prin = "1";

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

  $total = mysqli_num_rows(mysqli_query($conn,"SELECT idprodImagen FROM prod_imagenes WHERE principal = 1 AND iidproducto =".$id));
    if($total==0){
      $contPrin = 1;
    }else{
      $contPrin = 2;
    }
  $total2 = mysqli_num_rows(mysqli_query($conn,"SELECT idprodImagen FROM prod_imagenes WHERE icono = 1 AND iidproducto =".$id));
    if($total2==0){
      $contIco = 4;
    }else{
      $contIco = 8;
    }

  $contTotal = $contIco + $contPrin;

  try {
    switch ($contTotal) {
    case 5:
      $stmt = $conn->prepare("INSERT INTO prod_imagenes (iidproducto, Imagen, principal, icono) VALUES (?, ?, ?, ?)");
      $stmt->bind_param('isii', $id, $archivo_imagen, $prin, $prin);
      break;
    case 10:
      $stmt = $conn->prepare("INSERT INTO prod_imagenes (iidproducto, Imagen) VALUES (?, ?)");
      $stmt->bind_param('is', $id, $archivo_imagen);
      break;
    case 6:
      $stmt = $conn->prepare("INSERT INTO prod_imagenes (iidproducto, Imagen, icono) VALUES (?, ?, ?)");
      $stmt->bind_param('isi', $id, $archivo_imagen, $prin);
      break;
    case 9:
      $stmt = $conn->prepare("INSERT INTO prod_imagenes (iidproducto, Imagen, principal) VALUES (?, ?, ?)");
      $stmt->bind_param('isi', $id, $archivo_imagen, $prin);
      break;
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
  $location = "editar.php?id=".$id."&id_cat=".$id_cat."&id_Scat=".$id_Scat."&id_act=".$id_act;
  //echo $location;
  header("Location: $location");
  //die(json_encode($respuesta));

}//if _POST registro

/**********************************
*****CONFIGURAR***PRINCIPAL********
**********************************/
if ($operacion == 'principal') {
  $noPrin = "0";
  $prin = "1";


  try {
      $stmt = $conn->prepare("UPDATE prod_imagenes SET principal = ? WHERE principal = ? AND iidproducto = ?");
      $stmt->bind_param('iii', $noPrin, $prin, $id);
      $stmt->execute();
      $id_insertado = $stmt->insert_id;//obtenemos el id insertado en base de datos del reporte del stmt
      if($stmt->affected_rows) {//si se afectaron bases de datos creamos un reporte de exito
        try {
          $stmt1 = $conn->prepare("UPDATE prod_imagenes SET principal = ? WHERE idprodImagen = ?");
          $stmt1->bind_param('ii', $prin, $id_Img);
          $stmt1->execute();
          $id_insertado = $stmt1->insert_id;//obtenemos el id insertado en base de datos del reporte del stmt
          if($stmt1->affected_rows) {//si se afectaron bases de datos creamos un reporte de exito
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
          $stmt1->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
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

  $location = "editar.php?id=".$id."&id_cat=".$id_cat."&id_Scat=".$id_Scat."&id_act=".$id_act;
  //echo $location;
  header("Location: $location");
  //die(json_encode($respuesta));

}//if _POST registro


/**********************************
*******CONFIGURAR***ICONO**********
**********************************/
if ($operacion == 'icono') {
  $noPrin = "0";
  $prin = "1";


  try {
      $stmt = $conn->prepare("UPDATE prod_imagenes SET icono = ? WHERE icono = ? AND iidproducto = ?");
      $stmt->bind_param('iii', $noPrin, $prin, $id);
      $stmt->execute();
      $id_insertado = $stmt->insert_id;//obtenemos el id insertado en base de datos del reporte del stmt
      if($stmt->affected_rows) {//si se afectaron bases de datos creamos un reporte de exito
        try {
          $stmt1 = $conn->prepare("UPDATE prod_imagenes SET icono = ? WHERE idprodImagen = ?");
          $stmt1->bind_param('ii', $prin, $id_Img);
          $stmt1->execute();
          $id_insertado = $stmt1->insert_id;//obtenemos el id insertado en base de datos del reporte del stmt
          if($stmt1->affected_rows) {//si se afectaron bases de datos creamos un reporte de exito
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
          $stmt1->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
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

  $location = "editar.php?id=".$id."&id_cat=".$id_cat."&id_Scat=".$id_Scat."&id_act=".$id_act;
  //echo $location;
  header("Location: $location");
  //die(json_encode($respuesta));

}//if _POST registro



//die(json_encode($_GET));
?>
