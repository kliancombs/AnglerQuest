<?php
// Create a new SQLite3 object
$db = new SQLite3('fishing_spots.db');

// Get form data (assuming POST method is used)
$name = $_POST['name'];
$location = $_POST['location'];
$is_public = $_POST['privateorpublic'];
$species = $_POST['species'];
$description = $_POST['description'];

// Prepare the SQL statement with placeholders
$stmt = $db->prepare('INSERT INTO spots (name, location, is_public, species, description) VALUES (:name, :location, :is_public, :species, :description)');

// Bind parameters to placeholders
$stmt->bindParam(':name', $name);
$stmt->bindParam(':location', $location);
$stmt->bindParam(':is_public', $is_public);
$stmt->bindParam(':species', $species);
$stmt->bindParam(':description', $description);

// Execute the prepared statement
$stmt->execute();

// Close the database connection
$db->close();

// Redirect back to the form page after submission
header('Location: info_page.html');
exit();
?>

