<!DOCTYPE html>
<html>
<head>
    <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
    <h1>Bob's Auto Parts</h1>
    <h2>Customer Orders</h2>
    <?php
        $document_root = $_SERVER['DOCUMENT_ROOT'];

        // Abrimos el fichero de pedidos en modo lectura binaria
        $ordersFile = @fopen("$document_root\\desarrollo-php-mysql\\Orders\\orders.txt", 'rb');

        if (!$ordersFile) {
            echo "<p>There was an error when trying to load the orders. Please try again later</p>";
            exit;
        }

        // Bloqueamos el fichero para lectura
        flock($ordersFile, LOCK_SH);

        echo "<p>Initial position of the file pointer (before writting the order): " . ftell($ordersFile) . "<br/><br/>";

        // Recorremos el fichero
        while (!feof($ordersFile)) {
            $order = fgets($ordersFile); // Obtenemos una línea
            echo htmlspecialchars($order) . "<br/>"; //Escribimos la línea anterior
        }

        // Pruebas: posiciones de los punteros
        echo "<p>Final position of the file pointer (after writting the order): " . ftell($ordersFile);
        rewind($ordersFile);
        echo "<p>Position of the file pointer after rewind() call: " . ftell($ordersFile);

        // Liberamos bloqueo y cerramos el fichero
        flock($ordersFile, LOCK_UN);
        fclose($ordersFile);
    ?>
</body>
</html>