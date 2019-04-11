<?php
/**
 * Created by PhpStorm.
 * User: Jarlaxxe
 * Date: 10/04/2019
 * Time: 18:07
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
    <h1>Pruebas varias de lectura de ficheros</h1>
    <h2>Lectura troceada con fgetcsv()</h2>
    <?php
        $document_root = $_SERVER['DOCUMENT_ROOT'];

        // Comprobamos previamente si existe el fichero sin necesidad de ir a abrirlo
        if (!file_exists("$document_root\\desarrollo-php-mysql\\Orders\\orders.txt")) {
            echo "<p>There was an error when trying to load the orders. Please try again later</p>";
            exit;
        }

        // Abrimos el fichero de pedidos en modo lectura binaria
        $ordersFile = @fopen("$document_root\\desarrollo-php-mysql\\Orders\\orders.txt", 'rb');
        // Bloqueamos el fichero para lectura
        flock($ordersFile, LOCK_SH);

        while (!feof($ordersFile)) {
            $orderData = fgetcsv($ordersFile,0,"\t");
            echo "<pre>" . var_dump($orderData) . "</pre>";
        }

        // Liberamos el bloqueo
        flock($ordersFile, LOCK_UN);

        // Cerramos el fichero
        fclose($ordersFile);
    ?>

    <h2>Lectura de un archivo completo</h2>
    <h3>readfile(): lo escupe por la salida estándar (navegador)</h3>
    <?php
        $rutaCompleta = "$document_root\\desarrollo-php-mysql\\Orders\\orders.txt";
        $redBytes = readfile($rutaCompleta);
        echo "<p>Bytes leídos: $redBytes";
        echo "<p>Tamaño del archivo (en Bytes): " . filesize($rutaCompleta);

        echo "<p>Lectura sustituyendo los finales de línea (\\n) por saltos de línea HTML</p>";
    ?>

    <h3>fpastrhu(): lo escupe por la salida estándar (navegador)</h3>
    <?php
        // Comprobamos previamente si existe el fichero sin necesidad de ir a abrirlo
        if (!file_exists("$document_root\\desarrollo-php-mysql\\Orders\\orders.txt")) {
            echo "<p>There was an error when trying to load the orders. Please try again later</p>";
            exit;
        }

        $ordersFile = fopen($rutaCompleta, 'rb');
        // Bloqueamos el fichero para lectura
        flock($ordersFile, LOCK_SH);
        fpassthru($ordersFile);
        // Liberamos el bloqueo
        flock($ordersFile, LOCK_UN);
        fclose($ordersFile);
    ?>

    <h3>file(): escupe un array (cada posición del array es una línea del fichero)</h3>
    <?php
        $orderData = file($rutaCompleta);
        echo "<pre>";
            var_dump($orderData);
        echo "</pre>";
    ?>

    <h3>file_get_contents(): escupe todo el contenido del fichero en una cadena</h3>
    <?php
        $orderData = file_get_contents($rutaCompleta);
        echo nl2br($orderData); // Sustituimos los finales de línea por saltos de línea HTML: mejora la lectura
    ?>
</body>
</html>
