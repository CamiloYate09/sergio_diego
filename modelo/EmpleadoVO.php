<?php
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/
	class EmpleadoVO
	{
		//*******************************************************
		//*******************************************************
		//*******************************************************
		//Atributos de VO 
		private $id;
		private $nombre;
		private $apellido;
		private $salario;
		//*******************************************************
		//*******************************************************
		//*******************************************************
		//*******************************************************
		//*******************************************************
		//*******************************************************
		public function getId()
		{
			return ($this->id);
		}

		public function setId($id)
		{
			$this->id = $id;
		}
		//*******************************************************
		//*******************************************************
		//*******************************************************
		public function getNombre()
		{
			return ($this->nombre);
		}

		public function setNombre($nombre)
		{
			$this->nombre = $nombre;
		}
		//*******************************************************
		//*******************************************************
		//*******************************************************
		public function getApellido()
		{
			return ($this->apellido);
		}

		public function setApellido($apellido)
		{
			$this->apellido = $apellido;
		}
		//*******************************************************
		//*******************************************************
		//*******************************************************
		public function getSalario()
		{
			return ($this->salario);
		}

		public function setSalario($salario)
		{
			$this->salario = $salario;
		}
		//*******************************************************
		//*******************************************************
		//*******************************************************
		//*******************************************************
		//*******************************************************
		//*******************************************************
	}
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/
?>