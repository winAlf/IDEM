<?php

function usuario_autentificado() {
  if(!revisar_usuario()){
    header('Location:index.php');
    exit();
  }
}

function revisar_usuario(){
  return isset($_SESSION['usuario']);
}

session_start();
usuario_autentificado();
$usuarioU = $_SESSION['usuario'];
$nombreU = $_SESSION['NOMBRE'];

 ?>
