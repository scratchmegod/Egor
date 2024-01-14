<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="egor.css">
    <title>Перегляд замовлень</title>
</head>
<body>
    <h1>Перегляд замовлень</h1>

    <?php
    try {
        $sql = "SELECT order_id, pharmacy_id, order_date FROM orders";
        $result = $conn->query($sql);

        echo "<h2>Важливі дані з бази даних:</h2>";

        if ($result->rowCount() > 0) {
            echo "<table border='1'><tr><th>Order ID</th><th>Pharmacy ID</th><th>Order Date</th></tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>".$row["order_id"]."</td><td>".$row["pharmacy_id"]."</td><td>".$row["order_date"]."</td></tr>";
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
    <a href="egor.php">До головної сторінки</a>
</body>
</html>
