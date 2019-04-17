<?php
/**
 * Created by PhpStorm.
 * User: Jarlaxxe
 * Date: 11/04/2019
 * Time: 19:27
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
    <h1>Pruebas varias con matrices (arrays)</h1>
    <h2>Creaciones básicas de matrices indexadas numéricamente de distintos tipos</h2>
        <?php
            // Matrices de productos
            $products1 = array('Tires', 'Oils', 'Spark Plugs');
            $products2 = ['Tires', 'Oils', 'Spark Plugs']; // A partir de PHP 5.4

            // Array autogenerados con rangos
            $numbers = range(1,10);
            $evenNumbers = range(2, 10, 2);
            $letters = range('a', 'z');

            // Impresión por pantalla de datos de productos
            echo "Products: $products1[0] $products1[1] $products1[2] <br/>";

            // Impresión mediante bucles
            for ($i = 0; $i < 3; $i++) {
                echo "Product $i: $products1[$i] <br/>";
            }

            foreach ($products1 as $product) {
                echo "Product: $product <br/>";
            }

            // Impresión por pantalla de estructuras de datos
            echo "<p>Productos 1: </p>";
            echo "<pre>" . var_dump($products1) . "</pre>";
            echo "<p>Productos 2: </p>";
            echo "<pre>" . var_dump($products2) . "</pre>";
            echo "<p>Numbers: </p>";
            echo "<pre>" . var_dump($numbers) . "</pre>";
            echo "<p>Even numbers: </p>";
            echo "<pre>" . var_dump($evenNumbers) . "</pre>";
            echo "<p>Letters: </p>";
            echo "<pre>" . var_dump($letters) . "</pre>";
        ?>
    <h2>Matrices con diferentes índices (numéricas y asociativas)</h2>
    <?php
        // Array de productos con sus precios donde la clave es el producto y el valor el precio
        $productsPrices = array('Tires' => 100, 'Oils' => 50, 'Spark Plugs' => 10);

        echo "<p>foreach</p>";
        // Impresión mediante bucles: no podemos usar for ya que las claves son de tipo asociativo
        foreach ($productsPrices as $product => $price) {
            echo "Product/Price: $product/\$$price <br/>";
        }

        echo "<p>while + each (deprecated)</p>";
        // While + each: 0, 1
        while ($product = each($productsPrices)) {
            echo "Product: $product[0], price: $product[1] <br/>";
        }

        // Para poder volver a recorrer el array con each, tenemos que restablecer la posición
        reset($productsPrices);

        echo "<p>while + each previo reset de elemento actual de each</p>";
        // While + each: key, value
        while ($product = each($productsPrices)) {
            echo "Product: " . $product['key'] . ", price: " . $product['value'] . "<br/>";
        }

        // Para poder volver a recorrer el array con each, tenemos que restablecer la posición
        reset($productsPrices);

        echo "<p>while + list + each previo reset de elemento actual de each</p>";
        // Impresión mediante while, each y list
        while (list($product, $price) = each($productsPrices)) {
            echo "Product: $product, price:  $price <br/>";
        }
    ?>
    <h2>Matrices con diferentes índices (numéricas y asociativas) multidimensionales</h2>
    <?php
        $products = array(
            array('TIR', 'Tires', 100),
            array('OIL', 'Oils', 50),
            array('SPK', 'Spark Plugs', 10)
        );

        // Impresión con bucle: los dos están indexados numéricamente
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                echo "Product: " . $products[$i][$j] . "<br/>";
            }
        }

        echo "<p>Array bidimensional asociativo:</p>";

        $betterProducts = array(
            array('Code' => 'TIR', 'Description' => 'Tires', 'Price' => 100),
            array('Code' => 'OIL', 'Description' => 'Oils', 'Price' => 50),
            array('Code' => 'SPK', 'Description' => 'Spark Plugs', 'Price' => 10)
        );

        echo "<p>Recorrido con for + while + list + each</p>";

        // Recorrido con for + while + list + each
        for ($i = 0; $i < 3; $i++) {
            while (list($key, $value) = each($betterProducts[$i])) {
                echo '|' . $value;
            }
            echo "<br/>";
        }

        echo "<p>Recorrido con doble foreach (creo que es lo equivalente al while + each + list)</p>";

        // Como ahora tenemos un array asociativo para cada elemento del array numérico, no nos vale con doble for
        foreach ($betterProducts as $betterProduct) {
            echo "Product: <br/>";
            foreach ($betterProduct as $key => $value) {
                echo "$key: $value <br/>";
            }
        }
    ?>
</body>
</html>