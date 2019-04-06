<?php
/**
 * Created by PhpStorm.
 * User: Jarlaxxe
 * Date: 06/04/2019
 * Time: 16:49
 */
?>
<!DOCTYPE html>
<html>
  <head>
   <title>Bob's Auto Parts - Freight Costs</title>
  </head>
  <body>
    <table style="border: 0px; padding: 3px">
        <tr>
            <td style="background: #cccccc; text-align: center;">Distance</td>
            <td style="background: #cccccc; text-align: center;">Cost</td>
        </tr>
        <?php
            $distance = 50;

            while ($distance <= 250) {
                echo "<tr>";
                echo "<td>$distance</td>";
                echo "<td>" . ($distance/10) . "</td>";
                echo "<tr>";

                $distance += 50;
            }
        ?>
    </table>
  </body>
</html>