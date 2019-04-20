<?php
/**
 * Created by PhpStorm.
 * User: Jarlaxxe
 * Date: 20/04/2019
 * Time: 19:17
 */

$printer = function ($value) { echo "$value <br/>"; };

$products = [ 'Tires' => 100,
    'Oil' => 10,
    'Spark Plugs' => 4 ];

$markup = 0.20;

// Función anónima con uso de variable global dentro de la función
// Paso de value por referencia para que se modifique el valor de cada elemento del array
$apply = function (&$value) use ($markup) { $value = $value * (1 + $markup); };

// Modificamos los elementos del array
array_walk($products, $apply);
// Mostramos por pantalla los elementos del array
array_walk($products, $printer);