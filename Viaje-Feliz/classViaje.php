<?php
class NuevoViaje
{
    private $objResponsableNuevo;
    private $codigoNuevoViaje;
    private $destinoNuevo;
    private $cantidadMaximaPasajerosNuevo;
    private $coleccionPasajerosNuevo;

    public function __construct($objResponsableExt, $codigoViajeExt, $destinoExt, $cantidadMaximaPasajerosExt, $pasajerosExt){
        $this->objResponsableNuevo = $objResponsableExt;
        $this->codigoNuevoViaje = $codigoViajeExt;
        $this->destinoNuevo = $destinoExt;
        $this->cantidadMaximaPasajerosNuevo = $cantidadMaximaPasajerosExt;
        $this->coleccionPasajerosNuevo = $pasajerosExt;
    }

    public function getResponsable(){
        return $this->objResponsableNuevo;
    }
    public function getCodigoViaje(){
        return $this->codigoNuevoViaje;
    }
    public function getDestino(){
        return $this->destinoNuevo;
    }
    public function getCantidadMaximaPasajeros(){
        return $this->cantidadMaximaPasajerosNuevo;
    }
    public function getPasajeros(){
        return $this->coleccionPasajerosNuevo;
    }
    public function setResponsable($nuevoObjResponsable){
        $this->objResponsableNuevo = $nuevoObjResponsable;
    }
    public function setCodigoViaje($nuevoCodigoViaje){
        $this->codigoNuevoViaje = $nuevoCodigoViaje;
    }
    public function setDestino($nuevoDestino){
        $this->destinoNuevo = $nuevoDestino;
    }
    public function setCantidadMaximaPasajeros($nuevaCantidadMaxima){
        $this->cantidadMaximaPasajerosNuevo = $nuevaCantidadMaxima;
    }
    public function setPasajeros($nuevaColeccion){
        $this->coleccionPasajerosNuevo = $nuevaColeccion;
    }
    public function cantidadActualPasajeros(){
        return count($this->getPasajeros());
    }

    public function encontrarLugarPasajero($dniParaRastrear){
        $existePasajero = -1;
        $seEncontro = false;
        for ($i = 0; $i < $this->cantidadActualPasajeros() && $seEncontro != true; $i++){
            if ($this->getPasajeros()[$i]->getNumeroDocumento() == $dniParaRastrear){
                $existePasajero = $i;
                $seEncontro = true;
            }
        }
        return $existePasajero;
    }

    public function modificarPasajero($numeroDniPasajero, $newNombre, $newApellido, $newNuevoTelefono){
        $pasajero = 'no hay pasajero con ese dni';
        if ($this->encontrarLugarPasajero($numeroDniPasajero) != -1) {
            $this->getPasajeros()[$this->encontrarLugarPasajero($numeroDniPasajero)]->setNombre($newNombre);
            $this->getPasajeros()[$this->encontrarLugarPasajero($numeroDniPasajero)]->setApellido($newApellido);
            $this->getPasajeros()[$this->encontrarLugarPasajero($numeroDniPasajero)]->setNumeroTelefono($newNuevoTelefono);

            $pasajero = $this->getPasajeros()[$this->encontrarLugarPasajero($numeroDniPasajero)];
        }
        return $pasajero;
    }

    public function cambiarResponsable($numeroLicencia, $numEmpleado, $nombre, $apellido){
        $responsable = 'no hay responsable con ese numero de licencia';
        if ($this->getResponsable()->getNumeroLicencia() == $numeroLicencia) {
            $this->getResponsable()->setNombre($nombre);
            $this->getResponsable()->setApellido($apellido);
            $this->getResponsable()->setNumeroEmpleado($numEmpleado);
            $responsable = $this->getResponsable();
        }
        return $responsable;
    }

    public function mostrarPasajeros(){
        $texto = "";
        $i=1;
        foreach ($this->getPasajeros() as $pasajeroIndividual) {
            $texto .= "pasajero ". $i .": ". $pasajeroIndividual . "\n";
            $i++;
        }
        return $texto;
    }

    public function __toString(){
        return "
        {$this->getResponsable()}

        Datos del viaje:
        Codigo de Viaje: {$this->getCodigoViaje()}
        Destino: {$this->getDestino()}
        Cantidad Máxima de pasajeros: {$this->getCantidadMaximaPasajeros()}

        {$this->mostrarPasajeros()}";
    }
}