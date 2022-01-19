<?php

include_once '_includes/_funciones/bd_conexion.php';

if (isset($_POST['registro'])) {
  $ejecuta=$_POST['registro'];
  if ($ejecuta=="add") {
    $case=1;
    $ejecuta="add";
  } else {
    $case=1;
    $ejecuta="addDis";
  }
}

if (isset($_GET['registro'])) {
  $case=2;
}

if (isset($_GET['visita'])) {
  $case=3;
}

switch ($case) {
    case 1:
        $nombre = htmlspecialchars($_POST['nombre']);
        $telefono = htmlspecialchars($_POST['telefono']);
        //$email = htmlspecialchars($_POST['email']);
        $email = htmlspecialchars($_POST['email']);
        $interes = htmlspecialchars($_POST['interes']);
        $date = date("F j, Y");
        //echo $date;
        //echo $nombre;
        break;
    case 2:
        $html = '';
        $page = $_GET['page'];
        $catid = $_GET['catid'];
        $rowsPerPage = $_GET['cantPP'];
        $offset = ($page - 1) * $rowsPerPage;
        sleep(1);
        $ejecuta="paginacion";
        break;
    case 3:
        $id = $_GET['id'];
        $visita = $_GET['visita'];
        //echo $visita;
        $ejecuta="addVisita";
        break;
}

if ($ejecuta == "add") {
  //die(json_encode($_POST));

  try {
    $stmt = $conn->prepare("INSERT INTO contacto (cont_nombre, cont_telefono, cont_correo, cont_mensaje, fecha) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $nombre, $telefono, $email, $interes, $date);
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

if ($ejecuta == "addDis") {
  //die(json_encode($_POST));

  try {
    $stmt = $conn->prepare("INSERT INTO distribuidor (distNombre, distTelefono, distCorreo, distMensaje,  	distFecha) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $nombre, $telefono, $email, $interes, $date);
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


if ($ejecuta == "paginacion") {
  //die(json_encode($_POST));
  $result = $conn->query(
      'SELECT idproducto, producto, visitas, modelo, modeloDesc, Imagen FROM producto
      INNER JOIN prod_imagenes ON producto.idproducto=prod_imagenes.iidproducto and prod_imagenes.icono=1
      WHERE pactivo = 1 AND pidcategoria = '.$catid.' ORDER BY porden ASC LIMIT '.$offset.', '.$rowsPerPage
  );

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $visitas = $row['visitas'] + 1;
          $html .= '<div class="catCuerpoProd">';
          $html .= '<div class="catCuerpoProdImg columnCenterCenter">';
          $html .= '<div class="catCuerpoProdImgImg ">';
          $html .= '<a href="ajax.php?id='.$row['idproducto'].'&visita='.$visitas.'&exzoom="><img class="hvr-grow" src="/img/productos/'.$row['Imagen'].'" alt=""></a>';
          $html .= '</div>';
          $html .= '<div class="catCueProdBorde columnCenterCenter">';
          $html .= '<p>'.$row['modelo'].'</p>';
          $html .= '</div>';
          $html .= '</div>';
          $html .= '</div>';
      }
  }

  echo $html;

}//if ($_POST['registro'


if ($ejecuta == "addVisita") {
  //die(json_encode($_POST));
  try {
    $stmt = $conn->prepare("UPDATE producto SET visitas = ? WHERE idproducto = ?");
    $stmt->bind_param('ii', $visita, $id);
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
  $locationP = "producto.php?id=".$id."&exzoom=";
  //echo $locationP;
  header('Location: '.$locationP);


}//if ($_POST['registro'

?>
