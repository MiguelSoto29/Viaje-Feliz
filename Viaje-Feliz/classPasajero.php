<?php
class Pasajero{

    private $nombreNuevo;
    private $apellidoNuevo;
    private $numeroDocumentoNuevo;
    private $numeroTelefonoNuevo;

    public function __construct($nombreExt, $apellidoExt, $numeroDocExt, $numTelefonoExt){
        $this->nombreNuevo = $nombreExt;
        $this->apellidoNuevo = $apellidoExt;
        $this->numeroDocumentoNuevo = $numeroDocExt;
        $this->numeroTelefonoNuevo = $numTelefonoExt;
    }
    public function getNombre(){
        return $this->nombreNuevo;
    }
    public function getApellido(){
        return $this->apellidoNuevo;
    }
    public function getNumeroDocumento(){
        return $this->numeroDocumentoNuevo;
    }
    public function getNumeroTelefono(){
        return $this->numeroTelefonoNuevo;
    }
    public function setNombre($nuevoNombre){
        $this->nombreNuevo = $nuevoNombre;
    }
    public function setApellido($nuevoApellido){
        $this->apellidoNuevo = $nuevoApellido;
    }
    public function setNumeroDocumento($nuevoNumeroDocumento){
        $this->numeroDocumentoNuevo = $nuevoNumeroDocumento;
    }
    public function setNumeroTelefono($nuevoNumeroTelefono){
        $this->numeroTelefonoNuevo = $nuevoNumeroTelefono;
    }
    public function __toString(){
        return " 
        Nombre: {$this->getNombre()}
        Apellido: {$this->getApellido()}
        Número Telefónico: {$this->getNumeroTelefono()}
        Número de DNI: {$this->getNumeroDocumento()}";
    }
}