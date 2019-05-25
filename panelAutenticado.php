<?php include 'validadorAutenticacion.php' ?>
<!-- ********************************************************************** -->
<!-- ********************************************************************** -->
<!-- ********************************************************************** -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- ***************************************************** -->
    <!-- ***************************************************** -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
<div id="container">
    <div id="header">
        <h1><p align="center"><img src="imagenes/logoEAN.png" alt="Universidad EAN" longdesc="http://www.ean.edu.co"/>
            </p></h1>
        <!-- end #header --></div>
    <div id="mainContent">
        <h1>EAN University - Web Development</h1>
            <center>
                <br/>
        <p><b>Usuario de sesión <?= $usuario ?>.

            <br/>
            <b>Nombre <?= $nombre ?></b
            <br/>
            <b>Apellido <?= $apellidos ?></b
            <br/>
            <b>ULtimo Ingreso <?= $fecha_ultimo_ingreso ?></b
            <br/>
            <b>Fecha Ingreso <?= $fecha_ingreso ?></b


        </p>
        <table id="tabla" cellpadding="0" cellspacing="0" border="1">
            <tr>
                <td>REGISTRO DE EMPLEADOS</td>
                <td>
                    <a href="RegistroEmpleados.php">Registrar Nuevo Empleado</a>
                </td>
            </tr>
            <tr>
                <td>REGISTRO DE PRODUCTOS:</td>
                <td>
                    <a href="RegistroProductos.php">Registrar Nuevo Producto</a>
                </td>
            </tr>
            <tr>
                <td>CONSULTA DE EMPLEADOS</td>
                <td>
                    <a href="ConsultaEmpleados.php">Listas Empleados</a>
                </td>
            </tr>
            <tr>
                <td>CONSULTA DE PRODUCTOS</td>
                <td>
                    <a href="ConsultaProductos.php">Listas Productos</a>
                </td>
            </tr>
        </table>
        </center>
        </p>
        <br/>
        <br/>
        <a href='cerrarSesion.php'>Cerrar sesión</a></b>
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
