<?php

function formatearFecha($fecha)
{
    /*2022-06-18 22:15:10*/
    $dia=substr($fecha,8,2);
    $mes=substr($fecha,5,2);
    $anio=substr($fecha,0,4);

    $hora=substr($fecha,11,5);
    $fechaformateada=$dia."/".$mes."/".$anio." ".$hora;
    return $fechaformateada;

}

function estado($edad)
{
    if ($edad>=18)
    {
        $estado="Mayor de edad";
    }
    else {
        $estado="Menor de edad";
    }
    return $estado;
}

function mensaje($msg)
{
    switch($msg){
        case '1':
        $mensaje="Gracias por usar el sistema";
        break;
        case '2':
        $mensaje="Usuario no identificado";
        break;	
        case '3':
        $mensaje="Acceso denegado - Favor inicie sesion";
        break;
        default:
        $mensaje="";
    }
    return $mensaje;
}

?>