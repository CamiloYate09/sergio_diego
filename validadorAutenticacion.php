<?php
  session_start();
  if (isset($_SESSION['nombreUsuario']))
  {
    $usuario = $_SESSION['nombreUsuario'];
    $nombre = $_SESSION['nombres'];
    $apellidos = $_SESSION['apellidos'];
    $fecha_ultimo_ingreso = $_SESSION['fecha_ultimo_ingreso'];
    $fecha_ingreso = $_SESSION['fecha_ingreso'];
//    $contrasena = $_SESSION['contrasena'];
  }
  else
  {
      $usuario = "sinusuario";
  }

  if ($usuario == "sinusuario")
  {
    echo "<script type='text/javascript'>alert('No se puede ingresar a la aplicación sin antes no haberse autenticado');
    window.location='index.php';
    </script>";
  }
  //echo $usuario;
?>
