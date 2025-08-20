<?php
include('header.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    $sql = "INSERT INTO recipes (title, description, image, ingredients, instructions) VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('sssss', $title, $description, $image, $ingredients, $instructions);

    if ($stmt->execute()) {
        header('Location: admin.php');
        exit;
    } else {
        echo "Error: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe</title>
</head>
<body>
    <h1>Add Recipe</h1>
    <form method="POST" action="">
        <input type="text" name="title" placeholder="Title" required><br>
        <textarea name="description" placeholder="Description" required></textarea><br>
        <input type="text" name="image" placeholder="Image URL" required><br>
        <textarea name="ingredients" placeholder="Ingredients" required></textarea><br>
        <textarea name="instructions" placeholder="Instructions" required></textarea><br>
        <button type="submit">Add Recipe</button>
    </form>
</body>
</html>
