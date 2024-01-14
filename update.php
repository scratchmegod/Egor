<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data when the form is submitted

    // Validate and sanitize user inputs
    $pharmacy_id = htmlspecialchars($_POST["pharmacy_id"]);
    $name = htmlspecialchars($_POST["name"]);
    $location = htmlspecialchars($_POST["location"]);

    // Update data in the pharmacies table
    try {
        $sql = "UPDATE pharmacies SET name = :name, location = :location WHERE pharmacy_id = :pharmacy_id";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':pharmacy_id', $pharmacy_id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':location', $location);

        $stmt->execute();

        echo "Data updated successfully!";
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
    <title>Оновити дані</title>
</head>
<body>
    <h1>Оновити дані</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <!-- Updated form fields for updating pharmacies -->
        <label for="pharmacy_id">Pharmacy ID:</label>
        <input type="text" name="pharmacy_id" required>

        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="location">Location:</label>
        <input type="text" name="location" required>

        <input type="submit" value="Update Data">
    </form>

    <!-- Button to go back to the main page -->
    <a href="egor.php">До головної сторінки</a>
</body>
</html>
