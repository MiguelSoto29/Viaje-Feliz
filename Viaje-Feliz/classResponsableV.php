<?php

class ResponsableNuevo
{
    private $numeroEmpleadoNuevo;
    private $numeroLicenciaNuevo;
    private $nombreNuevo;
    private $apellidoNuevo;

    public function __construct($numeroEmpleadoExt, $numeroLicenciaExt, $nombreExt, $apellidoExt){
        $this->numeroEmpleadoNuevo = $numeroEmpleadoExt;
        $this->numeroLicenciaNuevo = $numeroLicenciaExt;
        $this->nombreNuevo = $nombreExt;
        $this->apellidoNuevo = $apellidoExt;
    }
    public function getNumeroEmpleado(){
        return $this->numeroEmpleadoNuevo;
    }
    public function getNumeroLicencia(){
        return $this->numeroLicenciaNuevo;
    }
    public function getNombre(){
        return $this->nombreNuevo;
    }
    public function getApellido(){
        return $this->apellidoNuevo;
    }
    public function setNumeroEmpleado($newNumeroEmpleado){
        $this->numeroEmpleadoNuevo = $newNumeroEmpleado;
    }
    public function setNumeroLicencia($newNumeroLicencia){
        $this->numeroLicenciaNuevo = $newNumeroLicencia;
    }
    public function setNombre($newNombre){
        $this->nombreNuevo = $newNombre;
    }
    public function setApellido($newApellido){
        $this->apellidoNuevo = $newApellido;
    }
    public function __toString(){
        return "
        Datos del resposable: 
        Nombre/s: {$this->getNombre()}
        Apellido/s: {$this->getApellido()} 
        Numero de empleado: {$this->getNumeroEmpleado()}
        Numero de licencia: {$this->getNumeroLicencia()}";
    }
}