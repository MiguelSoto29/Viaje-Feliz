<?php

include_once 'classViaje.php';
include_once 'classPasajero.php';
include_once 'classResponsableV.php';

$objPersona1 = new Pasajero('Miguel', 'Soto', '284632', 4562109);
$objPersona2 = new Pasajero('Miles', 'Morales', '83627153', 1610);
$objPersona3 = new Pasajero('Lourdes', 'Pérez', '42253615', 77672513);
$objPersona4 = new Pasajero('Gwen', 'Staicy', '10345327', 678312);
$objPersona5 = new Pasajero('Juana', 'Gonzalez', '623981', 372649);

$coleccionPasajeros = [
    $objPersona1,
    $objPersona2,
    $objPersona3,
    $objPersona4,
    $objPersona5,
];

$objResponsableCreado = new ResponsableNuevo('2099', '523', 'Minato', 'Namikaze');
$viajeModificar = new NuevoViaje($objResponsableCreado, '562', 'Buenos Aires', 80, $coleccionPasajeros);
$elViajePersonalizadoEstaCreado = false;


 do {
    echo "\nMenú Principal:\n";
    echo "\n1) Modificar datos de un pasajero\n";
    echo "2) Agregar un pasajero nuevo\n";
    echo "3) Crear un viaje\n";
    echo "4) Ver los datos actuales del viaje\n";
    echo "5) Salir\n";
    $opcionElegida = trim(fgets(STDIN));

        switch ($opcionElegida) {
            case 1:
                echo "\nIngrese el número de documento del pasajero para identificarlo: ";
                $dni = trim(fgets(STDIN));
                if ($viajeModificar->encontrarLugarPasajero($dni) != -1) {
                    echo "\nNuevo nombre del pasajero: ";
                    $nombre = trim(fgets(STDIN));
                    echo "\nNuevo apellido del pasajero: ";
                    $apellido = trim(fgets(STDIN));
                    echo "\nNuevo número de telefono del pasajero: ";
                    $numTelefono = trim(fgets(STDIN));
                    echo "\n\nSe encontró el pasajero con el DNI ingresado, sus nuevos datos son :" . $viajeModificar->modificarPasajero($dni, $nombre, $apellido, $numTelefono);
                } else {
                    echo "\nNo existe un pasajero con ese DNI, por favor inténtalo de nuevo.\n";
                        }
                break;

            case 2:
                echo "Ingrese los datos del pasajero para agregarlo al viaje";
                echo "\nNombre: ";
                $nombre = trim(fgets(STDIN));
                echo "\nApellido: ";
                $apellido = trim(fgets(STDIN));
                echo "\nNúmero de telefono: ";
                $numTelefono = trim(fgets(STDIN));
                echo "\nNúmero de DNI: ";
                $dni = trim(fgets(STDIN));
                if ($viajeModificar->cantidadActualPasajeros() + 1 < $viajeModificar->getCantidadMaximaPasajeros()) {
                    if ($viajeModificar->encontrarLugarPasajero($dni) == -1) {
                        $nuevoPasajero = new Pasajero($nombre, $apellido, $dni, $numTelefono);
                        array_push($coleccionPasajeros, $nuevoPasajero);
                        $viajeModificar->setPasajeros($coleccionPasajeros);
                        echo "Se agregó al pasajero correctamente\n";
                    } else {
                                echo "Ya existe un pasajero con ese DNI\n/";
                    }
                } else {
                    echo "No hay espacio disponible para agregar al pasajero\n/";
                }
                break;
            case 3:
                        
                echo "\nVamos a crear un viaje desde cero. Ingrese el máximo de pasajeros para este vuelo:\n";
                $coleccionPasajeros = [];
                $cantidadMaximaPersonas = trim(fgets(STDIN));
                echo "Ahora cuántos pasajeros quiere crear:\n";
                $cantidadPasajeros = trim(fgets(STDIN));
                 
                do {
                    echo "Ingrese los datos del pasajero que agregar al vuelo\n";
                    echo "Nombre: ";
                    $nombre = trim(fgets(STDIN));
                    echo "Apellido: ";
                    $apellido = trim(fgets(STDIN));
                    echo "Número de teléfono: ";
                    $numTelefono = trim(fgets(STDIN));
                    echo "Número de DNI: ";
                    $dni = trim(fgets(STDIN));
                 
                    if (count($coleccionPasajeros) == 0 || $objViajeCrear->encontrarLugarPasajero($dni) == -1) {
                        $nuevoPasajero = new NuevoPasajero($nombre, $apellido, $dni, $numTelefono);
                        array_push($coleccionPasajeros, $nuevoPasajero);
                        $objViajeCrear = new NuevoViaje(0, 0, 0, 0, $coleccionPasajeros);
                        echo "Se agregó al pasajero exitosamente :)\n";
                    } else {
                        echo "\nYa existe un pasajero con ese DNI\n/";
                    }
                } while (count($coleccionPasajeros) != $cantidadPasajeros);
                 
                echo "\nIngrese los datos del responsable del viaje:\n";
                echo "\nNúmero de licencia: ";
                $numeroLicencia = trim(fgets(STDIN));
                echo "Nombre: ";
                $nombre = trim(fgets(STDIN));
                echo "Apellido: ";
                $apellido = trim(fgets(STDIN));
                echo "Número de empleado: ";
                $numeroEmpleado = trim(fgets(STDIN));
                $objResponsableCreado = new NuevoResponsable($numeroEmpleado, $numeroLicencia, $nombre, $apellido);
                 
                echo "\nVamos a definir el viaje:\n";
                echo "\nIngrese el código del vuelo: ";
                $codigoViaje = trim(fgets(STDIN));
                echo "\nIngrese el destino del viaje: ";
                $destino = trim(fgets(STDIN));
                $objViajeCrear = new NuevoViaje($objResponsableCreado, $codigoViaje, $destino, $cantidadMaximaPersonas, $coleccionPasajeros);
                echo "\nSu viaje fue creado exitosamente\n";
                $elViajePersonalizadoEstaCreado = true;
                break;
            case 4:
                $viajeMostrar = $elViajePersonalizadoEstaCreado ? $objViajeCrear : $viajeModificar;
                    if ($viajeMostrar->cantidadActualPasajeros() != 0) {
                        echo $viajeMostrar;
                    } else {
                        echo $viajeModificar;
                    }
                break;
            case 5:
                echo "\n¡Nos vemos!\n";
                break;

            default:
                echo "Opción Inválida. Por favor, intente nuevamente.\n";
                break;
            }
            } while ($opcionElegida != 5);
?>