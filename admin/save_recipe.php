<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    // Handle the image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Insert into the database
    $sql = "INSERT INTO recipes (title, description, image_path, ingredients, instructions)
            VALUES ('$title', '$description', '$target_file', '$ingredients', '$instructions')";
    if (mysqli_query($conn, $sql)) {
        echo "Recipe added successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
