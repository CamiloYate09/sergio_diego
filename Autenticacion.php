<!-- ****************************************************************************** -->
<!-- ****************************************************************************** -->
<!-- ****************************************************************************** -->
<!-- ****************************************************************************** -->
<!-- ****************************************************************************** -->
<!-- ****************************************************************************** -->
<?php include 'modelo/DAOAccesoDatos.php'?>
<?php include 'modelo/ManejadorEntidadesSistema.php'?>
<?php
   session_start();

   $controladorDAOMysql = new DAOAccesoDatos();
   $manejadorConsultas = new ManejadorEntidadesSistema();

   //Procesamos las entradas
   $usuario = $_POST["usuario"];
   $clave = $_POST["clave"];
//    $contrasena = $_POST["contrasena"];
$nombre = $_POST["nombres"];
$fecha_ultimo_ingreso = $_POST["fecha_ultimo_ingreso"];
$apellidos = $_POST["apellidos"];
$fecha_ingreso= $_POST["fecha_ingreso"];


   $propiedades = $_SESSION["propiedades"];
   $conexion = $controladorDAOMysql->conectarBaseDatos($propiedades['servidor'],$propiedades['basedatos'],$propiedades['usuario'],$propiedades['clave']);
   //*****************************************************************
   //*****************************************************************
   if ($conexion->connect_errno == 1)
   {
      $seConecto = false;
   }
   else
   {
      $seConecto = true;
   }
   /*********************************************************************/
   /*********************************************************************/
   /*********************************************************************/
   if($seConecto == true)
   {
      /*********************************************************************/
      /*********************************************************************/
      //Armamos la consulta dinámica para la tabla SELECT * FROM Empleado
      $consultaLista = $manejadorConsultas->armarConsultaAutenticacion($usuario,$clave);
      //Obtenemos el cursor mediante el ADO a través de la consulta
      $cursorAutenticacion = $controladorDAOMysql->realizarConsultaDatos($conexion,$consultaLista);
      //var_dump($cursorEmpleados);
      //Descargamos los datos al vector para la vista
      $datosAutenticados = $manejadorConsultas->verificarUsuarioAutenticado($cursorAutenticacion);

      //var_dump($datosAutenticados['autentico']);

      if ($datosAutenticados['autentico'] == "true")
      {
          //Se sesión correctamente
            $_SESSION['nombreUsuario'] = $datosAutenticados['nombreUsuario'];
          $_SESSION['nombres'] = $datosAutenticados['nombres'];
          $_SESSION['apellidos'] = $datosAutenticados['apellidos'];
          $_SESSION['fecha_ultimo_ingreso'] = $datosAutenticados['fecha_ultimo_ingreso'];
          $_SESSION['fecha_ingreso'] = $datosAutenticados['fecha_ingreso'];
//          $_SESSION['contrasena'] = $datosAutenticados['contrasena'];
        //echo $_SESSION['userid'];
        header("location:indexMaster.php");
      }
      else
      {
        echo "<script type='text/javascript'>
          alert('La parámetros de ingreso del usuario son incorrectos.  Verifique sus credenciales de autenticación');
          window.location='index.php';
        </script>";
      }
   }
   else
   {
        echo "<script>alert ('No es posible conectarse a la base de datos.  Verifique los parámetros de conexión');</script>";
        header("location:index.php");
   }
?>
<!-- ****************************************************************************** -->
<!-- ****************************************************************************** -->
<!-- ****************************************************************************** -->
<!-- ****************************************************************************** -->
<!-- ****************************************************************************** -->
<!-- ****************************************************************************** -->
