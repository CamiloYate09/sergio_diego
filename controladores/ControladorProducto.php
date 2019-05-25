<?php include '../modelo/DAOAccesoDatos.php'?>
<?php include '../modelo/ManejadorEntidadesSistema.php'?>
<?php include '../modelo/ProductoVO.php'?>
<?php
   session_start();
   /*********************************************************************/
   /*********************************************************************/
   /*********************************************************************/
   $controladorDAOMysql = new DAOAccesoDatos();
   $manejadorConsultas = new ManejadorEntidadesSistema();
   $registroProducto = new ProductoVO();
   /*********************************************************************/
   /*********************************************************************/
   //Recuperamos los datos del formulario
   $nombre = "";
   $precio = 0.0;
   $referencia = "";
   /*********************************************************************/
   /*********************************************************************/
   /*********************************************************************/
   $nombre = (String)$_POST['nombre'];
   $precio = (float)$_POST['precio'];
   $referencia = (String)$_POST['referencia'];
   /*********************************************************************/
   /*********************************************************************/
   $propiedades = $_SESSION["propiedades"];
   //$conexion = $controladorDAOMysql->conectarBaseDatos("localhost","Tienda","root","");
   $conexion = $controladorDAOMysql->conectarBaseDatos($propiedades['servidor'],$propiedades['basedatos'],$propiedades['usuario'],$propiedades['clave']);

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
      $registroProducto->setNombre($nombre);
      $registroProducto->setPrecio($precio);
      $registroProducto->setReferencia($referencia);
      /*********************************************************************/
      /*********************************************************************/
      $consultaInsercion = $manejadorConsultas->armarConsultaProducto($registroProducto);
      /*********************************************************************/
      /*********************************************************************/
      $resultado = $controladorDAOMysql->realizarConsultaActualizacion($conexion,$consultaInsercion);
      /*********************************************************************/
      /*********************************************************************/
      $resultadoOperacion = $controladorDAOMysql->generarMensajeConfirmacion("EL REGISTRO DEL PRODUCTO ",$resultado,$nombre);
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
    <h2>REGISTRO DE PRODUCTOS</h2>
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
