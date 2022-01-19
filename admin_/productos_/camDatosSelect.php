<?php
if(isset($_POST['id_select'])) {

    //Conexion
    include_once '../../_includes/_funciones/bd_conexion.php';

    //Obtenemos el valor de la variable de Ajax (es decir, el ID).
    $id_select = mysqli_real_escape_string($conn,$_POST['id_select']);
    //$id_select = $_POST['id_select'];
    //Sentencia -> mostramos resultao segun el 'ID' de nuestro articulo via AJAX.
    $sql = mysqli_query($conn, "SELECT * FROM catsubcategoria WHERE id_catCategoria='$id_select'");

    //echo "<option value=0>Selecciona tu apartado</option>"; //Si no quieres mostrar este mensaje, podrias quitarla.

    //Comprobamos existencias.
    if (mysqli_num_rows($sql) > 0) {

        //Salida data.
        while ($reg = mysqli_fetch_array($sql)) {
            //Obtenemos datos asociados desde la Base de datos.
            $id_bd = $reg['id_catSubCategoria'];
            $artic_apartado = $reg['catSubCatNombre'];
            //Option modificado :)
            echo "<option value='$id_bd'>" . $artic_apartado . "</option>";
        }

    }
      $conn->close();
  }//if id_select
?>
