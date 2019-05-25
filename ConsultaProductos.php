<?php include 'validadorAutenticacion.php'?>
<?php include 'modelo/DAOAccesoDatos.php'?>
<?php include 'modelo/ManejadorEntidadesSistema.php'?>
<?php
   //session_start();
   //***********************************************************
   //***********************************************************
   //***********************************************************
   $controladorDAOMysql = new DAOAccesoDatos();
   $manejadorConsultas = new ManejadorEntidadesSistema();
   //***********************************************************
   //***********************************************************
   $datosConsulta = array();
   $totalPrecios = 0.0;
   $totalIva = 0.0;
   $consultaLista = "";
   //*****************************************************************
   //*****************************************************************
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
      $consultaLista = $manejadorConsultas->armarConsultaListado("Producto");
      //Obtenemos el cursor mediante el ADO a través de la consulta
      $cursorProductos = $controladorDAOMysql->realizarConsultaDatos($conexion,$consultaLista);
      //var_dump($cursorEmpleados);
      //Descargamos los datos al vector para la vista
      $datosConsulta = $manejadorConsultas->armarSalidaTablaProductos($cursorProductos);
      /*********************************************************************/
      /*********************************************************************/
      $totalPrecios = $manejadorConsultas->generarSumatoriaValoresParametro($datosConsulta,'precio',"precios");

      $totalIva = $manejadorConsultas->generarSumatoriaValoresParametro($datosConsulta,'iva',"iva");
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
  //*****************************************************************
  //*****************************************************************
  //*****************************************************************
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- ***************************************************** -->
  <!-- ***************************************************** -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Acceso a Bases de Datos con PHP y MYSQL</title>
  <link rel="stylesheet" type="text/css" href="estilos/estilosAppBD.css"/>
  <script language="JavaScript" type="text/JavaScript" src="scripts/validacionesJS.js"></script>
  <!-- ***************************************************** -->
  <!-- ***************************************************** -->
</head>
<!-- *********************************************************** -->
<!-- *********************************************************** -->
<!-- *********************************************************** -->
<body class="oneColFixCtrHdr">
<div id="container">
  <div id="header">
    <h1><p align="center"><img src="imagenes/logoEAN.png"   alt="Universidad EAN" longdesc="http://www.ean.edu.co" /></p></h1>
  <!-- end #header --></div>
  <div id="mainContent">
<h1>EAN University - Web Development</h1>
<p><strong>Professor: Architect Jaime Alberto Gutiérrez Mejía. <?php echo date("Y"); ?></strong></p>
    <center>
    <h2>REGISTRO DE PRODUCTOS</h2>
  </center>
    <p>
    <center>
      <table id="tabla" cellpadding="0" cellspacing="0" border="1">
        <tr>
            <td style="width: 20px;"><b>CODIGO PRODUCTO</b></td>
            <td style="width: 50px;"><b>NOMBRE PRODUCTO</b></td>
            <td style="width: 50px;"><b>REFERENCIA</b></td>
            <td style="width: 100px;"><b>PRECIO PRODUCTO</b></td>
            <td style="width: 100px;"><b>IVA</b></td>
        </tr>
    <?php
      for ($i = 0;  $i < count($datosConsulta);  $i+=5)
      {
    ?>
        <tr>
            <td><?=$datosConsulta[$i]['id']?></td>
            <td><?=$datosConsulta[$i+1]['nombre']?></td>
            <td><?=$datosConsulta[$i+2]['referencia']?></td>
            <td align="right">$  <?=number_format($datosConsulta[$i+3]['precio'],2)?></td>
            <td align="right">$  <?=number_format($datosConsulta[$i+4]['iva'],2)?></td>
        </tr>
    <?php
      }
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><b>TOTAL DE PRODUCTOS:</b></td>
    <td align="right"><b>$  <?=number_format($totalPrecios,2)?></b></td>
    <td align="right"><b>$  <?=number_format($totalIva,2)?></b></td>
  </tr>
      </table>
    <br/>
    <br/>
      <a href="panelAutenticado.php">Regresar al Menú Principal</a>
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
