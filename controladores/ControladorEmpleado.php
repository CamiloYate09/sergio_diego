<!-- ***************************************************** -->
<!-- Incorporación de los objetos del modelo de la aplicación Web -->
<!-- ***************************************************** -->
<?php include '../modelo/DAOAccesoDatos.php'?>
<?php include '../modelo/ManejadorEntidadesSistema.php'?>
<?php include '../modelo/EmpleadoVO.php'?>
<!-- ***************************************************** -->
<!-- ***************************************************** -->
<!--  Scriptlet para implementar el controlador del empleado -->
<!-- ***************************************************** -->
<?php
   session_start();
   /*********************************************************************/
   /*********************************************************************/
   /*********************************************************************/
   //Creamos la instancia a los objetos del MODELO del MVC
   $controladorDAOMysql = new DAOAccesoDatos();
   $manejadorConsultas = new ManejadorEntidadesSistema();
   $registroEmpleado = new EmpleadoVO();
   /*********************************************************************/
   /*********************************************************************/
   //Variables locales del scriptlet del controlador
   $nombre = "";
   $apellido = "";
   $salario = 0.0;
   $conexion = 0;
   $resultadoOperacion = "";
   $seConecto = false;
   $propiedades = null;
   /*********************************************************************/
   /*********************************************************************/
   /*********************************************************************/
   /*********************************************************************/
   /*********************************************************************/
   /*********************************************************************/
   //Procesamiento del request de la petición del formulario
   //Capturar en el controlador la información proveniente del request del envío
   //sincrónico del formulario a través del action por medio del submit (botón guardar)
   $nombre = strtoupper((String)$_POST['nombre']);
   $apellido = strtoupper((String)$_POST['apellido']);
   $salario = (float)$_POST['salario'];
   /*********************************************************************/
   /*********************************************************************/
   /*********************************************************************/
   $propiedades = $_SESSION["propiedades"];
   //$conexion = $controladorDAOMysql->conectarBaseDatos("localhost","Tienda","root","");
   $conexion = $controladorDAOMysql->conectarBaseDatos($propiedades['servidor'],$propiedades['basedatos'],$propiedades['usuario'],$propiedades['clave']);

   //var_dump($conexion);
   /*********************************************************************/
   /*********************************************************************/
   /*********************************************************************/
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
      //Encapsular en el objeto del empleado, los datos recuperados del request
      //para pasarlo al objeto de valores VO de tipo empleado
      $registroEmpleado->setNombre($nombre);
      $registroEmpleado->setApellido($apellido);
      $registroEmpleado->setSalario($salario);
      /*********************************************************************/
      /*********************************************************************/
      //Armar la consulta SQL de inserción en la tabla del empleado
      //INSERT INTO EMPLEADO (X,X,X,X) VALUES (A,B,C,D);
      $consultaInsercion = $manejadorConsultas->armarConsultaEmpleado($registroEmpleado);
      /*********************************************************************/
      /*********************************************************************/
      //Ejecutamos la inserción del registro en la tabla de la BD
      $resultado = $controladorDAOMysql->realizarConsultaActualizacion($conexion,$consultaInsercion);
      //Decirle al motor mysql o el de turno (db2, oracle, etc), que ejecute la operación DML
      /*********************************************************************/
      /*********************************************************************/
      //Preparar la respuesta para la vista.  El resultado de ejecución de la consulta
      $resultadoOperacion = $controladorDAOMysql->generarMensajeConfirmacion("EL REGISTRO DEL EMPLEADO ",$resultado,$nombre);
      /*********************************************************************/
      /*********************************************************************/
   }
   else
   {
      /*********************************************************************/
      /*********************************************************************/
      $resultadoOperacion = "NO SE PUDO ESTABLECER CONEXIÓN CON LA BASE DE DATOS.  Verifique con el administrador del Sistema";
      /*********************************************************************/
      /*********************************************************************/
   }
  /*********************************************************************/
  /*********************************************************************/
  /*********************************************************************/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- ***************************************************** -->
  <!-- ***************************************************** -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Acceso a Bases de Datos con PHP y MYSQL</title>
  <link rel="stylesheet" type="text/css" href="../estilos/estilosAppBD.css"/>
  <script language="JavaScript" type="text/JavaScript" src="../scripts/validacionesJS.js"></script>
  <!-- ***************************************************** -->
  <!-- ***************************************************** -->
</head>
<!-- *********************************************************** -->
<!-- *********************************************************** -->
<!-- *********************************************************** -->
<body class="oneColFixCtrHdr">
<div id="container">
  <div id="header">
    <h1><p align="center"><img src="../imagenes/logoEAN.png"   alt="Universidad EAN" longdesc="http://www.ean.edu.co" /></p></h1>
  <!-- end #header --></div>
  <div id="mainContent">
<h1>EAN University - Web Development</h1>
<p><strong>Professor: Architect Jaime Alberto Gutiérrez Mejía. <?php echo date("Y"); ?></strong></p>
    <center>
    <h2>REGISTRO DE EMPLEADOS</h2>
  </center>
    <p>
   	<center>
      <h2>
         <?=$resultadoOperacion?>
      </h2>
      <br/>
      <br/>
      <a href="../index.php">Regresar al Menú Principal</a>
   	</center>
    </p>
	<!-- end #mainContent --></div>
  <div id="footer">
    <p><b><?php echo date("Y"); ?></b></p>
  <!-- end #footer --></div>
<!-- end #container --></div>
</body>
<!-- *********************************************************** -->
<!-- *********************************************************** -->
<!-- *********************************************************** -->
</html>
