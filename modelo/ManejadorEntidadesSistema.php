<?php
/************************************************************************/
/************************************************************************/
/************************************************************************/
/************************************************************************/
/************************************************************************/
/************************************************************************/
//Definir operaciones para armar las consultas dinámicas que serán
//empleadas por el controlador de cada página PHP que implementa
//el CRUD de la aplicación (INSERT y SELECT).  No update ni delete
class ManejadorEntidadesSistema
{
    //****************************************************************
    //****************************************************************
    //****************************************************************
    //****************************************************************
    //****************************************************************
    //****************************************************************
    private $consultaInsercion;
    private $consultaRegistros;
    //Permitir la descarga de los cursores de las consultas hechas por el DAO
    private $registros;
    //****************************************************************
    //****************************************************************
    //***********************************t*****************************
    //Método constructor de la clase
    public function __construct()
    {
    }
    //***********************************t*****************************
    //***********************************t*****************************
    //***********************************t*****************************
    //Método para armar la consulta dinámica SQL para el ADO de la aplicación
    //sobre la tabla de empleados
    public function armarConsultaEmpleado($objetoEmpleado)
    {
        $this->consultaInsercion = "INSERT INTO `lb4fsa3fghhg55ce`.`empleado`(`nombre`,`apellido`,`salario`) VALUES ('" . $objetoEmpleado->getNombre() . "','" . $objetoEmpleado->getApellido() . "'," . $objetoEmpleado->getSalario() . ")";

        return ($this->consultaInsercion);
    }
    //****************************************************************
    //****************************************************************
    //****************************************************************
    //Método para armar la consulta dinámica SQL para el ADO de la aplicación
    //sobre la tabla de Productos
    public function armarConsultaProducto($objetoProducto)
    {
        $this->consultaInsercion = "INSERT INTO `lb4fsa3fghhg55ce`.`producto` (`nombre`,`precio`,`referencia`) VALUES ('" . $objetoProducto->getNombre() . "'," . $objetoProducto->getPrecio() . ",'" . $objetoProducto->getReferencia() . "')";

        return ($this->consultaInsercion);
    }
    //****************************************************************
    //****************************************************************
    //****************************************************************
    //Método para procesar los datos de salida para el controlador
    //con el listado de empleados
    public function armarSalidaTablaEmpleados($cursorEmpleados)
    {
        $i = 0;

        if ($cursorEmpleados != null) {

            while ($empleado = mysqli_fetch_array($cursorEmpleados)) {
                $this->registros[$i]['id'] = $empleado['id'];
                $this->registros[$i + 1]['nombre'] = $empleado['nombre'];
                $this->registros[$i + 2]['apellido'] = $empleado['apellido'];
                $this->registros[$i + 3]['salario'] = $empleado['salario'];
                $i += 4;
            }//Fin del while
        }

        return ($this->registros);
    }
    //****************************************************************
    //****************************************************************
    //****************************************************************
    //Método para procesar los datos de salida para el controlador
    //con el listado de productos
    public function armarSalidaTablaProductos($cursorProductos)
    {
        $i = 0;

        if ($cursorProductos != null) {

            while ($producto = mysqli_fetch_array($cursorProductos)) {
                $this->registros[$i]['id'] = $producto['id'];
                $this->registros[$i + 1]['nombre'] = $producto['nombre'];
                $this->registros[$i + 2]['referencia'] = $producto['referencia'];
                $this->registros[$i + 3]['precio'] = $producto['precio'];
                $this->registros[$i + 4]['iva'] = $producto['precio'] * 0.16;
                $i += 5;
            }//Fin del while
        }

        return ($this->registros);
    }
    //****************************************************************
    //****************************************************************
    //****************************************************************
    public function armarConsultaListado($nombreTabla)
    {
        $this->consultaRegistros = "SELECT * FROM " . $nombreTabla;
        return ($this->consultaRegistros);
    }
    //****************************************************************
    //****************************************************************
    //****************************************************************
    public function generarSumatoriaValores($registros, $campo)
    {
        $total = 0;

        //var_dump($registros);

        for ($i = 0; $i < count($registros); $i += 4) {
            //echo floatval($registros[$i+3][$campo]) . "<br/>";
            $total += $registros[$i + 3][$campo];
        }

        return ($total);
    }

    public function generarSumatoriaValoresParametro($registros, $campo, $tipo)
    {
        $total = 0;
        $i = 0;
        //var_dump($registros);

        if ($tipo == "iva") {
            for ($i = 0; $i < count($registros); $i += 5) {
                //echo floatval($registros[$i+3][$campo]) . "<br/>";
                $total += $registros[$i + 4][$campo];
            }
        } else {
            for ($i = 0; $i < count($registros); $i += 5) {
                //echo floatval($registros[$i+3][$campo]) . "<br/>";
                $total += $registros[$i + 3][$campo];
            }
        }

        return ($total);
    }
    //****************************************************************
    //****************************************************************
    //****************************************************************
    public function armarConsultaAutenticacion($user, $password)
    {
        $query = "SELECT nombres, apellidos nombreUsuario, fecha_ultimo_ingreso, fecha_ingreso  FROM Usuario WHERE nombreUsuario='$user' and contrasena='$password'";
        //echo $query;
        return ($query);
    }
    //****************************************************************
    //****************************************************************
    //****************************************************************
    public function verificarUsuarioAutenticado($cursorAutenticado)
    {
        //var_dump ($cursorAutenticado);
        $i = 0;
        $count = 0;

//        $ObjetoUsuario = new Usuario();
//        $datosAutenticados = $ObjetoUsuario->setIdUsuario(0);

        $datosAutenticados['idUsuario'] = 0;
        $datosAutenticados['autentico'] = "false";
        $datosAutenticados['nombreUsuario'] = "sinusuario";
//        $datosAutenticados['contrasena'] = "";
        $datosAutenticados['nombres'] = "";
        $datosAutenticados['apellidos'] = "";
        $datosAutenticados['fecha_ultimo_ingreso'] = "";
        $datosAutenticados['fecha_ingreso'] = "";


        if ($cursorAutenticado != null) {

            while ($datosAutenticacion = mysqli_fetch_array($cursorAutenticado)) {
                $count++;
                $datosAutenticados['idUsuario'] = $datosAutenticacion['idUsuario'];
                $datosAutenticados['nombreUsuario'] = $datosAutenticacion['nombreUsuario'];
                $datosAutenticados['nombres'] = $datosAutenticacion['nombres'];
                $datosAutenticados['apellidos'] = $datosAutenticacion['apellidos'];
                $datosAutenticados['fecha_ultimo_ingreso'] = $datosAutenticacion['fecha_ultimo_ingreso'];
                $datosAutenticados['fecha_ingreso'] = $datosAutenticacion['fecha_ingreso'];
//              $datosAutenticados['contrasena'] = $datosAutenticacion['contrasena'];
            }//Fin del while

            if ($count == 1) {
                $datosAutenticados['autentico'] = "true";
            }

        }

        //var_dump($datosAutenticados);

        return ($datosAutenticados);
    }
    //****************************************************************
    //****************************************************************
    //****************************************************************
    //****************************************************************
    //****************************************************************
    //****************************************************************
}//Fin de la clase
/************************************************************************/
/************************************************************************/
/************************************************************************/
/************************************************************************/
/************************************************************************/
/************************************************************************/
?>