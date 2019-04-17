<?php
/**
 * Created by PhpStorm.
 * User: Jarlaxxe
 * Date: 17/04/2019
 * Time: 12:33
 */
?>

<?php
    // Generamos un array con una serie de nombres de imágenes de nuestro directorio
    $pictures = array('brakes.png', 'headlight.png', 'spark_plug.png', 'steering_wheel.png', 'tire.png', 'wiper_blade.png');
    // Reordenamos el array de forma aleatoria
    shuffle($pictures);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bob's Auto Parts</title>
</head>
<body>
    <h1>Bob's Auto Parts</h1>
    <?php
        // De todas las imágenes, mostraremos sólo 3 de ellas (las 3 primeras)
        for ($i = 0; $i < 3; $i++) {
            echo "<img src='../Resources/img/$pictures[$i]'>";
        }
    ?>
</body>
</html>
