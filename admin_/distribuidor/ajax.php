<?php


include_once '../../_includes/_funciones/bd_conexion.php';



/**********************************
***********Visitador****************
**********************************/
if ($_POST['registro'] == "visitado") {
  //die(json_encode($_POST));
$id_visitado = $_POST['id'];

  try {
        $stmt = $conn->prepare("UPDATE distribuidor SET distVisitado = 1 WHERE idDistribuidor = ?");
        $stmt->bind_param('i', $id_visitado);
        $stmt->execute();
        if ($stmt->affected_rows) {
              $respuesta = array(
                'visitado' => $id_visitado,
                'respuesta' => 'exito',
                'id_eliminado' => $id_visitado
              );
        } else {
              $respuesta = array(
                'visitado' => $id_visitado,
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
