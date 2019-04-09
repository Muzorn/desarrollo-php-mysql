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

        // Recorremos el fichero
        while (!feof($ordersFile)) {
            $order = fgets($ordersFile); // Obtenemos una línea
            echo htmlspecialchars($order) . "<br/>"; //Escribimos la línea anterior
        }
    ?>
</body>
</html>