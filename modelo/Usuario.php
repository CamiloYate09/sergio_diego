<?php


class Usuario
{

    //Atributos de Usuario
    private $idUsuario;
    private $nombres;
    private $apellidos;
    private $nombreUsuario;
    private $fecha_ingreso;
    private $fecha_ultimo_ingreso;
    private $fecha_contrasena;
    private $fecha_rol;

    /**
     * Usuario constructor.
     * @param $idUsuario
     * @param $nombres
     * @param $apellidos
     * @param $nombreUsuario
     * @param $fecha_ingreso
     * @param $fecha_ultimo_ingreso
     * @param $fecha_contrasena
     * @param $fecha_rol
     */
    public function __construct($idUsuario, $nombres, $apellidos, $nombreUsuario, $fecha_ingreso, $fecha_ultimo_ingreso, $fecha_contrasena, $fecha_rol)
    {
        $this->idUsuario = $idUsuario;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->nombreUsuario = $nombreUsuario;
        $this->fecha_ingreso = $fecha_ingreso;
        $this->fecha_ultimo_ingreso = $fecha_ultimo_ingreso;
        $this->fecha_contrasena = $fecha_contrasena;
        $this->fecha_rol = $fecha_rol;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return mixed
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * @param mixed $nombres
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * @param mixed $nombreUsuario
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }

    /**
     * @return mixed
     */
    public function getFechaIngreso()
    {
        return $this->fecha_ingreso;
    }

    /**
     * @param mixed $fecha_ingreso
     */
    public function setFechaIngreso($fecha_ingreso)
    {
        $this->fecha_ingreso = $fecha_ingreso;
    }

    /**
     * @return mixed
     */
    public function getFechaUltimoIngreso()
    {
        return $this->fecha_ultimo_ingreso;
    }

    /**
     * @param mixed $fecha_ultimo_ingreso
     */
    public function setFechaUltimoIngreso($fecha_ultimo_ingreso)
    {
        $this->fecha_ultimo_ingreso = $fecha_ultimo_ingreso;
    }

    /**
     * @return mixed
     */
    public function getFechaContrasena()
    {
        return $this->fecha_contrasena;
    }

    /**
     * @param mixed $fecha_contrasena
     */
    public function setFechaContrasena($fecha_contrasena)
    {
        $this->fecha_contrasena = $fecha_contrasena;
    }

    /**
     * @return mixed
     */
    public function getFechaRol()
    {
        return $this->fecha_rol;
    }

    /**
     * @param mixed $fecha_rol
     */
    public function setFechaRol($fecha_rol)
    {
        $this->fecha_rol = $fecha_rol;
    }




}