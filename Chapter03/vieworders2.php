<?php
/**
 * Created by PhpStorm.
 * User: Jarlaxxe
 * Date: 17/04/2019
 * Time: 13:25
 */
?>

<?php
    $document_root = $_SERVER['DOCUMENT_ROOT'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bob's Auto Parts - Order Results</title>

    <style type="text/css">
        table, th, td {
            border-collapse: collapse;
            border: 1px solid black;
            padding: 6px;
        }

        th {
            background: #ccccff;
        }
    </style>
</head>
<body>
    <h1>Bob's Auto Parts</h1>
    <h2>Customer Orders</h2>
    <?php
        // Recuperamos el contenido completo del archivo como un array...
        $orders = file("$document_root\\desarrollo-php-mysql\\Orders\\orders.txt");

        $numOrders = count($orders);

        if ($numOrders == 0) {
            echo "<p>There is no orders pending. Please try again later</p>";
            exit;
        }

        echo "<table>";
        echo "<tr>";
        echo "<th>Order Date</th>";
        echo "<th>Tires</th>";
        echo "<th>Oils</th>";
        echo "<th>Spark Plugs</th>";
        echo "<th>Total</th>";
        echo "<th>Address</th>";
        echo "</tr>";

        for ($i = 0; $i < $numOrders; $i++) {
            // Obtenemos una línea del pedido y la troceamos en partes
            $orderLine = explode("\t", $orders[$i]);

            // Quitamos la parte de texto de cada uno de los componentes del pedido
            $orderLine[1] = intval($orderLine[1]);
            $orderLine[2] = intval($orderLine[2]);
            $orderLine[3] = intval($orderLine[3]);

            echo "<tr>";
            echo "<td>$orderLine[0]</td>";
            echo "<td>$orderLine[1]</td>";
            echo "<td>$orderLine[2]</td>";
            echo "<td>$orderLine[3]</td>";
            echo "<td>$orderLine[4]</td>";
            echo "<td>$orderLine[5]</td>";
            echo "</tr>";
        }

        echo "</table>";

    ?>
</body>
</html>
