<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="egor.css">
    <title>Перегляд продуктів</title>
</head>
<body>
    <h1>Перегляд продуктів</h1>
    <br>

    <?php
    try {
        $sql = "SELECT product_id, name, description, price FROM products";
        $result = $conn->query($sql);

        echo "<h2>Дані з таблиці 'products':</h2>";

        if ($result->rowCount() > 0) {
            echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th></tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>".$row["product_id"]."</td><td>".$row["name"]."</td><td>".$row["description"]."</td><td>".$row["price"]."</td></tr>";
            }

            echo "</table>";
        } else {
            echo "0 results";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
    ?>

    <!-- Button to go back to the main page -->
    <br>
    <a href="egor.php">До головної сторінки</a>
</body>
</html>
