<?php
// Show PHP errors
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require_once 'classes/user.php';

require_once 'Autenticacion.php';

require_once 'panelAutenticado.php';

$objUser = new User();

$objectUsuario = new UsuarioMaster();

/*********************************************************************/
/*********************************************************************/
//Armamos la consulta dinámica para la tabla SELECT * FROM Empleado
$consultaLista = $manejadorConsultas->armarConsultaAutenticacion($usuario,$clave);
//Obtenemos el cursor mediante el ADO a través de la consulta
$cursorAutenticacion = $controladorDAOMysql->realizarConsultaDatos($conexion,$consultaLista);
//var_dump($cursorEmpleados);
//Descargamos los datos al vector para la vista
$datosAutenticados = $manejadorConsultas->verificarUsuarioAutenticado($cursorAutenticacion);

//$_SESSION['nombreUsuario'] = $datosAutenticados['nombreUsuario'];
//$_SESSION['nombres'] = $datosAutenticados['nombres'];
//$_SESSION['apellidos'] = $datosAutenticados['apellidos'];
//$_SESSION['fecha_ultimo_ingreso'] = $datosAutenticados['fecha_ultimo_ingreso'];
//$_SESSION['fecha_ingreso'] = $datosAutenticados['fecha_ingreso'];

// GET
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $_SESSION['nombreUsuario'] = $datosAutenticados['nombreUsuario'];
    $stmt = $objUser->runQuery("SELECT * FROM empleado WHERE id=:id");
    $stmt->execute(array(":id" => $id));
    $rowUser = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $id = null;
    $rowUser = null;
}

// POST
if (isset($_POST['btn_save'])) {
    $nombre = strip_tags($_POST['nombre']);
    $apellido = strip_tags($_POST['apellido']);
    $salario = strip_tags($_POST['salario']);

    try {
        if ($id != null) {
            if ($objUser->update($nombre, $apellido,$salario, $id)) {
                $objUser->redirect('indexMaster.php?updated');
            } else {
                $objUser->redirect('indexMaster.php?error');
            }
        } else {
            if ($objUser->insert($nombre, $apellido,$salario, $id)) {
                $objUser->redirect('indexMaster.php?inserted');
            } else {
                $objUser->redirect('indexMaster.php?error');
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Head metas, css, and title -->
    <?php require_once 'includes/head.php'; ?>
</head>
<body>
<!-- Header banner -->
<?php require_once 'includes/header.php'; ?>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar menu -->
        <?php require_once 'includes/sidebar.php'; ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

            <div class="form-group">
                         <p><b>Usuario de sesión <?= $usuario ?>.

                        <br/>
                        <b>Nombre <?= $nombre ?></b
                        <br/>
                        <b>Apellido <?= $apellidos ?></b
                        <br/>
                        <b>ULtimo Ingreso <?= $fecha_ultimo_ingreso ?></b
                        <br/>
                        <b>Fecha Ingreso <?= $fecha_ingreso ?></b
            </div>


            <br>
            <h1 style="margin-top: 10px">Empleados</h1>
            <p>Required fields are in (*).</p>
            <form method="post">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" id="id" name="id" readonly
                           value="<?php print($rowUser['id']); ?>">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre *</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                           value="<?php print($rowUser['nombre']); ?>"  required
                           maxlength="100">
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido *</label>
                    <input type="text" class="form-control" id="apellido" name="apellido"
                           value="<?php print($rowUser['apellido']); ?>"  required
                           maxlength="100">
                </div>
                <div class="form-group">
                    <label for="salario">Salario *</label>
                    <input type="text" class="form-control" id="salario" name="salario"
                           value="<?php print($rowUser['salario']); ?>"  required
                           maxlength="100">
                </div>
                <input type="submit" name="btn_save" class="btn btn-primary mb-2" value="Save">
            </form>
        </main>
    </div>
</div>
<!-- Footer scripts, and functions -->
<?php require_once 'includes/footer.php'; ?>
</body>
</html>
