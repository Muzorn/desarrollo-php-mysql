<?php
/**
 * Created by PhpStorm.
 * User: Jarlaxxe
 * Date: 20/04/2019
 * Time: 16:33
 */

?>

<!DOCTYPE html>
<html>
<head>
    <title>Pruebas varias con funciones</title>
</head>
<body>
    <h1>Pruebas varias con funciones</h1>
    <h2>Función definida por el usuario</h2>
    <?php
        function my_function() {
            echo "My function was called.";
        }

        my_function();
    ?>

    <p>Función para la creación dinámica de una tabla en función de unos datos</p>
    <?php
        $data = ['Data 1', 'Data 2', 'Data 3'];

        create_table($data, 'Mi cabecera', 'El caption');

        function create_table(array $data, $header = null, $caption = null) {
            // Apertura de la tabla
            echo "<table>";

            if ($caption) {
                echo "<caption>$caption</caption>";
            }

            if ($header) {
                echo "<tr><th>$header</th></tr>";
            }

            // Restablecemos puntero a elemento actual por si acaso
            reset($data);
            // Obtenemos elemento actual (primer elemento)
            $value = current($data);

            while($value) {
                echo "<tr style='border: solid;'><td style='border: solid;'>$value</td></tr>";
                $value = next($data);
            }

            // Cierre de la tabla
            echo "</table>";
        }
    ?>

    <h2>Funciones variables: número variable de parámetros</h2>
    <?php

        var_args('Argumento 1', 'Argumento 2', 'Argumento 3');

        function var_args() {
            echo "Número de argumentos pasados a la función: " . func_num_args();
            echo "<br/>";

            $args = func_get_args();

            foreach($args as $key => $arg) {
                echo "Argumento $key: $arg";
                echo "<br/>";
            }
        }
    ?>

    <h2>Ámbito</h2>
    <h3>Ámbito local de función</h3>
    <?php
        function fn() {
            $var = "Contenidos";
        }

        fn();
        //echo $var; // Undefined
    ?>
    <?php
        function fn2() {
            echo 'Contenido de $var dentro de la función la primera vez: ' . $var . "<br/>";
            $var = 2;
            echo 'Contenido de $var dentro de la función la segunda vez: ' . $var . "<br/>";
        }

        $var = 1;
        fn2();
        echo 'Contenido de $var fuera de la función: ' . $var . '<br/>';
    ?>
    <h3>Ámbito global dentro de una función</h3>
    <?php
        function fn3() {
            global $var; // Declarada como global, seguirá existiendo fuera de la función
            $var = "Contents";
            echo 'Contenido de la variable $var dentro de la función: ' . $var . "<br/>";
        }

        fn3();
        echo 'Contenido de la variable $var: fuera de la función: ' . $var . "<br/>";
    ?>

    <h2>Paso por valor y paso por referencia</h2>
    <h3>Paso por valor</h3>
    <?php
        function increment($value, $amount = 1){
            $value = $value + $amount;
        }

        $value = 10;
        increment($value);
        echo "Value: $value";
    ?>
    <h3>Paso por referencia</h3>
    <?php
        function incrementRef(&$value, $amount = 1){
            $value = $value + $amount;
        }

        $value = 10;
        incrementRef($value);
        echo "Value: $value";
    ?>

    <h2>Uso de la palabra clave "return"</h2>
    <?php
        function test_return() {
            echo "This will be shown";
            return;
            echo "This will never be shown";
        }

        test_return();
    ?>

    <h2>Implementar la recursión</h2>
    <?php
        function reverse_r($str) {
            // Caso recursivo
            if (strlen($str) > 0) {
                reverse_r(substr($str, 1));
            }

            // Caso final (PUES NO, SE EJECUTA EN CADA LLAMADA...)
            echo substr($str, 0, 1);
            return;
        }

        reverse_r("Hola");
    ?>

    <h2>Implementar funciones anónimas (o clausuras)</h2>
    <?php
        $array = ['Data 1', 'Data 2', 'Data 3'];

        array_walk($array, function ($value) { echo "$value"; });

        // Puede almacenarse en una variable
        $print = function ($value) { echo "$value"; };
    ?>
</body>
</html>
