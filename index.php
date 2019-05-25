<!-- ********************************************************************** -->
<!-- ********************************************************************** -->
<!-- ********************************************************************** -->
<?php include "LectorPropiedades.php"?>
<?php
  session_start();
  $lectorPropiedades = new lectorPropiedades();
  $arregloPropiedades = $lectorPropiedades->leerPropiedadesSistema("propiedades.ini");
  $_SESSION["propiedades"] = $arregloPropiedades;
?>
<!-- ********************************************************************** -->
<!-- ********************************************************************** -->
<!-- ********************************************************************** -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- ***************************************************** -->
  <!-- ***************************************************** -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta charset="UTF-8"/>
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
<form id="formularioLogin" name="formularioLogin" method="POST" action="Autenticacion.php">
<div id="container">
  <div id="header">
    <h1><p align="center"><img src="imagenes/logoEAN.png" alt="Universidad EAN" longdesc="http://www.ean.edu.co" /></p></h1>
  <!-- end #header --></div>
  <div id="mainContent">
<h1>EAN University - Web Development</h1>
<p><strong>Professor: Architect Jaime Alberto Gutiérrez Mejía. <?php echo date("Y"); ?></strong></p>
    <center>
    <h2>AUTENTICACION CON PHP - CONTROL DE MANEJO DE SESIÓN</h2>
  </center>
    <p>
    	<center>
    	<table id="tabla" cellpadding="0" cellspacing="0" border="1">
    		  <tr>
    		  	  <td>USUARIO:</td>
    		  	  <td>
                  <input type="text" id="usuario" name="usuario" size="30"/>
    		  	  </td>
    		  </tr>
    		  <tr>
    		  	  <td>CLAVE:</td>
    		  	  <td>
                  <input type="password" id="clave" name="clave" size="30"/>
    		  	  </td>
    		  </tr>
    		  <tr>
    		  	  <td colspan="2">
                <input type="submit" name="botonOK" id="botonOK" value="Aceptar"/>
                &nbsp;&nbsp;
                <input type="reset" name="botonReset" id="botonReset" value="Reestablecer"/>
              </td>
    		  </tr>
   		</table>
   	</center>
    </p>
    <br/>
    <br/>
	<!-- end #mainContent --></div>
  <div id="footer">
    <p><b><?php echo date("Y"); ?></b></p>
  <!-- end #footer --></div>
<!-- end #container --></div>
</form>
</body>
<!-- *********************************************************** -->
<!-- *********************************************************** -->
<!-- *********************************************************** -->
</html>
