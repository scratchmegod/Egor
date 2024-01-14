<?php
include 'db.php';

// Створення таблиці "Клієнти", якщо вона ще не існує
try {
    $sql = "CREATE TABLE IF NOT EXISTS clients (
        client_id INT AUTO_INCREMENT PRIMARY KEY,
        client_name VARCHAR(255) NOT NULL,
        client_email VARCHAR(255) NOT NULL
    )";
    $conn->exec($sql);
} catch (PDOException $e) {
    echo "Error creating clients table: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="egor.css">
    <title>Перегляд клієнтів</title>
</head>
<body>
    <h1>Перегляд клієнтів</h1>

    <?php
    try {
        $sql = "SELECT client_id, client_name, client_email FROM clients";
        $result = $conn->query($sql);

        echo "<h2>Важливі дані з бази даних:</h2>";

        if ($result->rowCount() > 0) {
            echo "<table border='1'><tr><th>Client ID</th><th>Name</th><th>Email</th></tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>".$row["client_id"]."</td><td>".$row["client_name"]."</td><td>".$row["client_email"]."</td></tr>";
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
