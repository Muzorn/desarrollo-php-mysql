<?php
/**
 * Created by PhpStorm.
 * User: Jarlaxxe
 * Date: 03/04/2019
 * Time: 13:31
 */
?>

<!DOCTYPE html>
<html>
  <head>
   <title>Pruebas varias</title>
  </head>
  <body>
        <h1>Pruebas varias</h1>
        <h2>Operador de asignación como operador de comparación (error)</h2>
        <?php
        // Prueba de operador de asignación como condición
            if ($a = 0) // $a = 5; Devuelve true
                echo "<p>Valor final distinto de cero = true</p>";
            else
                echo "<p>Valor final igual a cero = false</p>";

            $a = 0;
            $b = 5;
            if ($a = $b) // Como es asignación, al final se evalúa la izquierda. Es 5
                echo "<p>Valor final distinto de cero = true</p>";
            else
                echo "<p>Valor final igual a cero = false</p>";
        ?>

        <h2>Prueba asignación entre variables (copia) y operador de referencia</h2>
        <h3>Copia de variables</h3>
        <?php
            $a = 5;
            $b = $a;

            echo "a: $a y b: $b <br/>";
            $a = 10; // Cambiamos $a para comprobar que $b no cambia si cambiamos $a
            echo "a: $a y b: $b";
        ?>

        <h3>Referencia de variables</h3>
        <?php
            $a = 5;
            $b = &$a; // Establecemos $b como una referencia al valor de $a

            echo "a: $a y b: $b <br/>";
            $a = 10; // Cambiamos $a para comprobar que $b cambia si cambiamos $a
            echo "a: $a y b: $b";

            unset($a); // $a deja de existir, pasa a undefined. Se libera de memoria
            // $b deja de ser una referencia al contenido de $a, pero no pierde su valor (10)
            $a = 111;

            echo "a: $a y b: $b";
        ?>

        <h2>Prueba de comparación de igualdad y de identidad</h2>
        <?php
            echo 0 == 0; // true
            echo 0 == '0'; // true
            echo 0 === 0; // true
            echo 0 === '0'; // false
        ?>

        <h2>Prueba de operador de supresión de errores</h2>
        <?php
            $a = 57/0; // Warning: Division by zero
            echo $a;
            $b = @(57/0); // Suprime el error/warning
            echo $b;
        ?>

        <h2>Prueba de operador de ejecución</h2>
        <?php
            $out = `dir c:`; // Listar el directorio actual en C:
            echo "<pre>" . $out . "</pre>";
        ?>
  </body>
</html>
