<?php

include_once '_includes/_funciones/bd_conexion.php';

if (isset($_POST['registro'])) {
  $case=1;
}

if (isset($_GET['registro'])) {
  $case=2;
}

if (isset($_GET['visita'])) {
  $case=3;
}

//die(json_encode($_POST));

switch ($case) {
    case 1:
        $registro=$_POST['registro'];
        if ($registro == "Venta") {
          $nombre = htmlspecialchars($_POST['nombre']);
          $telefono = htmlspecialchars($_POST['telefono']);
          $descripcion = htmlspecialchars($_POST['descripcion']);
          $id_Prod = htmlspecialchars($_POST['id_Prod']);
          $email = $_POST['email'];
          $ejecuta="venta";

        } else {
          $nombre = htmlspecialchars($_POST['nombre']);
          $telefono = htmlspecialchars($_POST['telefono']);
          $compania = htmlspecialchars($_POST['compania']);
          $email = htmlspecialchars($_POST['email']);
          $interes = htmlspecialchars($_POST['interes']);
          //echo $date;
          //echo $nombre;
          $ejecuta="add";
        }
        break;
    case 2:
        $html = '';
        $page = $_GET['page'];
        $rowsPerPage = 8;
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
$date = date("F j, Y");
/************************
Agregar registro contacto
************************/
if ($ejecuta == "add") {
  //die(json_encode($_POST));

  try {
    $stmt = $conn->prepare("INSERT INTO contacto (cont_nombre, cont_empresa, cont_telefono, cont_correo, cont_mensaje, fecha) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssss', $nombre, $compania, $telefono, $email, $interes, $date);
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


/************************
Agregar registro de venta
************************/
if ($ejecuta == "venta") {
  //echo $date . "<br>";
  //die(json_encode($_POST));

  try {
    $stmt = $conn->prepare("INSERT INTO ventasdb (ventaNombre, ventaTelefono, ventaNota, id_Prod, email, fecha) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssiss', $nombre, $telefono, $descripcion, $id_Prod, $email, $date);
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

/*******************************
Paginacion productos en catalogo
*******************************/
if ($ejecuta == "paginacion") {
  //die(json_encode($_POST));
  $result = $conn->query(
      'SELECT idproducto, producto, visitas, modelo, modeloDesc, Imagen FROM producto
      INNER JOIN prod_imagenes ON producto.idproducto=prod_imagenes.iidproducto and prod_imagenes.icono=1
      WHERE pactivo = 1 AND pidcategoria = 1
      ORDER BY visitas DESC LIMIT '.$offset.', '.$rowsPerPage
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
          $html .= '<p>'.$row['producto'].'</p>';
          $html .= '</div>';
          $html .= '</div>';
          $html .= '<div class="catCuerpoProdTxt columnCenterCenter">';
          $html .= '<a href="ajax.php?id='.$row['idproducto'].'&visita='.$visitas.'&exzoom=">'.$row['modelo'].'</a>';
          $html .= '</div>';
          $html .= '</div>';
      }
  }

  echo $html;

}//if ($_POST['registro'

/*******************************
***Agregar visita de producto***
*******************************/
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
