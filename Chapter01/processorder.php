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
  </body>
</html>
