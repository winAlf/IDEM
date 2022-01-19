<?php
/*conexion de la nube*/
    //$conn = new mysqli('localhost:3306', 'logist47','C7txrPC7L2x3vj@#','logist47_');

/*conexion Local*/
    $conn = new mysqli('localhost', 'root','','logisticamaya');


    $conn->set_charset("utf8");

    if($conn->connect_error) {
      echo $error = $conn->connect_error;
    }

?>
