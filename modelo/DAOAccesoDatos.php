<?php
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/
    //Clase PHP para implementar el controlador de acceso a datos (DAO)
    //de la Solución Web (Capa de persistencia)
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/
    class DAOAccesoDatos
    {
    	//***********************************************************
    	//***********************************************************
    	//***********************************************************
    	//***********************************************************
    	//Atributos de la clase
    	private $errorDB;
    	private $conexion;
    	private $datosConsulta;
    	//***********************************************************
    	//***********************************************************
    	//***********************************************************
    	//Método constructor de la clase
    	public function __construct() 
    	{
		}
    	//***********************************************************
    	//***********************************************************
    	//***********************************************************
    	//Método para obtener la conexión a la BD si fuera en Java o C#
		public function conectarBaseDatos ($servidor,$nombreBD,$usuario,$clave)
		{
			$this->conexion = null;

			try
			{
				$this->conexion = new mysqli($servidor,$usuario,$clave,$nombreBD);
				//var_dump ($this->conexion);
				//var_dump ($this->conexion->connect_errno);
				//**************************************************
				//**************************************************
				if($this->conexion->connect_errno == 1044) 
				{
        			throw new Exception('Error en la conexión a la BD');
    			}
				//**************************************************
				//**************************************************
			}

			catch (Exception $e)
			{
				$this->errorDB = 1;
				echo ("Error de conexión: " . $this->errorDB);
				echo ("Error procesando la conexión a la BD: " . $e->getMessage());
				return ($this->errorDB);  //Retornando un código de error de tipo numérico
				//para informar al controlador que no pudimos conectarnos a la base
			}

			return ($this->conexion);  //Se retorna un objeto dinámico complejo de conexion
			//al motor mySQL
		}
    	//***********************************************************
    	//***********************************************************
    	//***********************************************************
    	//Método para realizar la consulta a la BD en procesos DML de actualización
    	//insert, update o delete
    	//Método retorna el número de filas afectadas por la consulta DML ejecutada en él
    	public function realizarConsultaActualizacion ($conexion,$consultaSQL)
    	{
    		$resultadoQueryUpdate = 0;

			try
			{
				//INSERT, UPDATE o DELETE
				//Tratamiento adicional de datos y variables requerido
				//***********************************************************
				//***********************************************************
				//Variable con el contenido del cursor de mysql
				$resultadoQueryUpdate = mysqli_query($conexion,$consultaSQL);
				//Número de filas actualizadas o tratadas por la query (insert, update o delete)
				//***********************************************************
				//***********************************************************
			}

			catch (Exception $e)
			{
				$this->errorDB = 2;
				echo ("Error de conexión en la consulta de actualización: " . $this->errorDB);
				echo ("Error procesando la conexión a la BD: " . $e->getMessage());
				//En caso de error retornamos un código numérico
				return ($this->errorDB);
			}

			finally
			{
				try
				{
					//Liberar el recurso de la conexión a la BD
					if ($conexion != null)
					{
						mysqli_close($conexion);
					}
				}

				catch (Exception $eBD)
				{
					echo ("Error de acceso a la BD en la consulta: " . $eBD->getMessage());
				}
			}

			//Retornar el cursor completo
			return ($resultadoQueryUpdate);
    	}
    	//***********************************************************
    	//***********************************************************
    	//***********************************************************
    	//Método para descargar la consulta de la base de datos (Recuperar cursores de mysql o el motor para luego poder usarlos en PHP)
    	public function realizarConsultaDatos ($conexion,$consultaSQL)
    	{
    		//Variable para descargar el contenido del cursor resultante
    		//de la query SELECT XXXXXX.... FROM JOIN GROUP BY ORDER BY ......
    		$cursorDatosConsulta = null;

			try
			{
				//Intentamos (try) ejecutar la consulta
				//***********************************************************
				$cursorDatosConsulta = mysqli_query ($conexion,$consultaSQL);
				//var_dump ($consultaSQL);
				//var_dump($cursorDatosConsulta);
				//***********************************************************
			}//Fin del try

			catch (Exception $e)
			{
				//Administramos el error en caso de no poder ejecutar la consulta
				$this->errorDB = 2;
				echo ("Error de conexión en la consulta de actualización: " . $this->errorDB);
				echo ("Error procesando la conexión a la BD: " . $e->getMessage());
				return ($this->errorDB);
			}

			finally
			{
				//Liberamos los recursos de la conexión a la BD de mysql
				try
				{
					if ($conexion != null)
					{
						mysqli_close($conexion);
					}
				}

				catch (Exception $eBD)
				{
					echo ("Error de acceso a la BD en la consulta: " . $eBD->getMessage());
				}
			}

			return ($cursorDatosConsulta);
    	}
    	//***********************************************************
    	//***********************************************************
    	//***********************************************************
    	public function generarMensajeConfirmacion ($mensaje,$resultadoEjecucion,$entidad)
    	{
    		$resultadoOperacion = "";

		    if ($resultadoEjecucion > 0)
		    {
		      $resultadoOperacion = $mensaje . strtoupper($entidad)." SE HA GUARDADO CORRECTAMENTE";
		    }
		    else
		    {
		      $resultadoOperacion = $mensaje . strtoupper($entidad)." NO SE HA PODIDO ALMACENAR";
		    }

		    return ($resultadoOperacion);
    	}
    	//***********************************************************
    	//***********************************************************
    	//***********************************************************
    	//***********************************************************
    	//***********************************************************
    	//***********************************************************
    }//Fin de la clase
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/
?>