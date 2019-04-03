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
   <title>Bob's Auto Parts - Order Form</title>
  </head>
  <body>
        <h1>Bob's Auto Parts</h1>
        <h2>Order Results</h2>
        <?php
            echo "<p>Order processed at ";
            echo date('H:i, jS F Y');
            echo "</p>"
        ?>
        <?php
        /**
         * Versión en una línea:
         * echo "<p>Order processed at " . date('H:i, jS F Y') . "</p>";
         */
        ?>
        <?php
            // Crear nombres de variables cortos
            $tireqty = $_POST['tireqty'];
            $oilqty = $_POST['oilqty'];
            $sparkqty = $_POST['sparkqty'];
            // No hemos comprobado contenido ni nada: no hay validación
        ?>
        <p>Your order is as follows: </p>
        <?php
            echo htmlspecialchars($tireqty) . " tires" . "<br/>";
            echo htmlspecialchars($oilqty) . " bottles of oil" . "<br/>";
            echo htmlspecialchars($sparkqty) . " spark plugs" . "<br/>";
        ?>

        <p>Ejemplo de interpolación de variables: </p>
        <?php
            $nombre = "Muzorn";
            echo "Mi nombre es $nombre <br/>";
        ?>
        <p>Ejemplo de no interpolación de variables: </p>
        <?php
            $nombre = "Muzorn";
            echo 'Mi nombre es $nombre <br/>';
        ?>
        <p>Ejemplo de cadena heredoc: </p>
        <?php
            echo <<<theEnd
                Línea 1
                Línea 2
                Línea 3
theEnd;
        ?>
  </body>
</html>
