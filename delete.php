<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data when the form is submitted

    // Validate and sanitize user input
    $pharmacyId = isset($_POST["pharmacy_id"]) ? intval($_POST["pharmacy_id"]) : 0;

    // Delete data from the pharmacies table
    try {
        $sql = "DELETE FROM pharmacies WHERE pharmacy_id = :pharmacyId";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':pharmacyId', $pharmacyId);

        $stmt->execute();

        echo "Data deleted successfully!";
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
    <title>Delete Data</title>
</head>
<body>
    <h1>Delete Data</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <!-- Form field for entering the pharmacy ID to delete -->
        <label for="pharmacy_id">Pharmacy ID to Delete:</label>
        <input type="text" name="pharmacy_id" required>

        <input type="submit" value="Delete Data">
    </form>

    <!-- Button to go back to the main page -->
    <a href="egor.php">До головної сторінки</a>
</body>
</html>
