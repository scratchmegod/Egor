<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="egor.css">
    <title>Головна сторінка</title>
</head>
<body>
    <h1>Головна сторінка</h1>
    <br>
    <a href="add.php">Додати дані</a>
    <a href="delete.php">Видалити дані</a>
    <a href="update.php">Оновити дані</a>
    <br>
    <a href="products.php">Переглянути продукти</a>
    <a href="orders.php">Переглянути замовлення</a>
    <a href="pharmacies.php">Переглянути аптеки</a>
    <a href="clients.php">Переглянути клієнтів</a>

    <?php
    try {
        $sql = "SELECT pharmacy_id, name, location FROM pharmacies";
        $result = $conn->query($sql);

        echo "<h2>Важливі дані з бази даних:</h2>";

        if ($result->rowCount() > 0) {
            echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Location</th></tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>".$row["pharmacy_id"]."</td><td>".$row["name"]."</td><td>".$row["location"]."</td></tr>";
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

</body>
</html>
