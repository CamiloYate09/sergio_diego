<?php include 'validadorAutenticacion.php'?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- ***************************************************** -->
  <!-- ***************************************************** -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Acceso a Bases de Datos con PHP y MYSQL</title>
  <link rel="stylesheet" type="text/css" href="estilos/estilosAppBD.css"/>
  <!-- ***************************************************** -->
  <!-- ***************************************************** -->
  <!-- JQuery y JavaScript -->
  <script src="scripts/jquery.min.js"></script>
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
    <form id="formularioProducto" name="formularioProducto" 
     method="post" action="controladores/ControladorProducto.php"
     onsubmit="return validarEnvio()">
   	<center>
      <table id="tabla" cellpadding="0" cellspacing="0" border="1">
          <tr>
              <td>Nombre:</td>
              <td>
                <input type="text" id="nombre" name="nombre" size="40"/>
              </td>
          </tr>
          <tr>
              <td>Precio:</td>
              <td>
                <div id="staticParent">
                  <input type="textarea" id="precio" name="precio" size="30"/>
                </div>
              </td>
          </tr>
          <tr>
              <td>Referencia:</td>
              <td>
                <select id="referencia" name="referencia">
                    <option value="Comestible">Comestible</option>
                    <option value="Consumible">Consumible</option>
                    <option value="Electrodoméstico">Electrodoméstico</option>
                    <option value="Ropa">Ropa</option>
                </select
              </td>
          </tr>
          <tr>
              <td>
              </td>
              <td>
                 <input type="submit" id="botonAceptar" name="botonAceptar" value="Guardar"/>
                 &nbsp;&nbsp;
                 <input type="reset" id="botonLimpiar" name="botonLimpiar" value="Reestablecer"/>
              </td>
          </tr>
      </table>
   	</center>
   </form>
    </p>
    <br/>
    <br/>
    <a href="index.php">Regresar al Menú Principal</a>

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
