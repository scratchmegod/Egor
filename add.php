<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data when the form is submitted

    // Validate and sanitize user inputs
    $name = htmlspecialchars($_POST["name"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $address = htmlspecialchars($_POST["address"]);
    $openingTime = htmlspecialchars($_POST["opening_time"]);
    $closingTime = htmlspecialchars($_POST["closing_time"]);
    $email = htmlspecialchars($_POST["email"]);

    // Insert data into the pharmacies table
    try {
        $sql = "INSERT INTO pharmacies (name, location) 
                VALUES (:name, :address)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);

        $stmt->execute();

        echo "Data added successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="egor.css">
    <title>Add Data</title>
</head>
<body>
    <h1>Add Data</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <!-- Updated form fields for the pharmacies table -->
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="address">Location:</label>
        <input type="text" name="address" required>

        <input type="submit" value="Add Data">
    </form>

    <!-- Button to go back to the main page -->
    <a href="egor.php">До головної сторінки</a>
</body>
</html>


