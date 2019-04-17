<?php
/**
 * Created by PhpStorm.
 * User: Jarlaxxe
 * Date: 17/04/2019
 * Time: 13:12
 */
?>

<?php
    $document_root = $_SERVER['DOCUMENT_ROOT'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
    <h1>Bob's Auto Parts</h1>
    <h2>Customer Orders</h2>
    <?php
        // Recuperamos el contenido del archivo como un array...
        $orders = file("$document_root\\desarrollo-php-mysql\\Orders\\orders.txt");

        $numOrders = count($orders);

        if ($numOrders == 0) {
            echo "<p>There is no orders pending. Please try again later</p>";
            exit;
        }

        for ($i = 0; $i < $numOrders; $i++) {
            echo "Order $i: $orders[$i] <br/>";
        }
    ?>
</body>
</html>
