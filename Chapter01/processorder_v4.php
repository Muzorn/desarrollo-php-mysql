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
            echo $date = date('H:i, jS F Y');
            echo "</p>"
        ?>
        <?php
        /**
         * Versión en una línea:
         * echo "<p>Order processed at " . date('H:i, jS F Y') . "</p>";
         */
        ?>
        <?php
            $document_root = $_SERVER['DOCUMENT_ROOT'];

            // Crear nombres de variables cortos
            $tireqty = $_POST['tireqty'];
            $oilqty = $_POST['oilqty'];
            $sparkqty = $_POST['sparkqty'];
            $address = $_POST['address'];

            echo "Dirección enviada por el usuario: $address <br/>";

            // No hemos comprobado contenido ni nada: no hay validación

            $totalqty = 0;
            $totalqty = $tireqty + $oilqty + $sparkqty;

            if ($totalqty == 0) {
                echo "You did not order anything..." . "<br/>";
            } else {
                echo "<p>Your order is as follows: </p>";
                if ($tireqty > 0)
                    echo htmlspecialchars($tireqty) . " tires" . "<br/>";
                if ($oilqty > 0)
                    echo htmlspecialchars($oilqty) . " bottles of oil" . "<br/>";
                if ($sparkqty > 0)
                    echo htmlspecialchars($sparkqty) . " spark plugs" . "<br/>";

                $find = $_POST['find'];

                switch ($find) {
                    case ("a"):
                        echo "<p>Regular customer.</p>";
                        break;
                    case ("b"):
                        echo "<p>Customer referred by TV advert.</p>";
                        break;
                    case ("c"):
                        echo "<p>Customer referred by phone directory.</p>";
                        break;
                    case ("d"):
                        echo "<p>Customer referred by word of mouth.</p>";
                        break;
                    default:
                        echo "<p>We don't know how this customer found us.</p>";
                        break;
                }

                // Definimos constantes para los precios de cada tipo de material
                define('TIREPRICE', 100);
                define('OILPRICE', 10);
                define('SPARKPRICE', 4);

                $totalamount = 0.00;
                // Calculamos la cantidad total
                $totalamount = $tireqty * TIREPRICE
                    + $oilqty * OILPRICE
                    + $sparkqty * SPARKPRICE;

                $taxrate = 0.10; // el impuesto de ventas local es un 10%
                //$totalamounttax = $totalamount * $taxrate;
                //$total = $totalamount + $totalamounttax;
                // Equivalente a:
                $totalamounttax = $totalamount * (1 + $taxrate);

                echo "<p>Items ordered: $totalqty</p>";
                echo "<p>Subtotal: $" . number_format($totalamount, 2) . "</p>";
                echo "<p>Total including tax: $" . number_format($totalamounttax, 2) . "</p>";

                // Abrimos el fichero y usamos el operador de supresión de errores para controlar nosotros posibles errores después
                $ordersFile = @fopen("$document_root\\desarrollo-php-mysql\\Orders\\orders.txt", 'a');

                if (!$ordersFile) {
                    echo "<p>Your order could not be processed at this time. Please try again later</p>";
                    exit;
                }

                $outputOrder = $date . "\t" . $tireqty . "tires \t" . $oilqty . "oil \t"
                    .$sparkqty . "spark plugs\t\$" . $totalamount
                    . "\t" . $address . "\n";

                // Escribimos el pedido en el fichero
                fwrite($ordersFile, $outputOrder);

                // Cerramos el fichero
                fclose($ordersFile);
            }
        ?>
  </body>
</html>
