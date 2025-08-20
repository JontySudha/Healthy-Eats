<?php
include('header.php');
include('db.php');

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    $sql = "UPDATE recipes SET title=?, description=?, image=?, ingredients=?, instructions=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssi', $title, $description, $image, $ingredients, $instructions, $id);

    if ($stmt->execute()) {
        header('Location: admin.php');
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM recipes WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $recipe = $stmt->get_result()->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipe</title>
</head>
<body>
    <h1>Edit Recipe</h1>
    <form method="POST" action="">
        <input type="text" name="title" value="<?php echo htmlspecialchars($recipe['title']); ?>" required><br>
        <textarea name="description" required><?php echo htmlspecialchars($recipe['description']); ?></textarea><br>
        <input type="text" name="image" value="<?php echo htmlspecialchars($recipe['image']); ?>" required><br>
        <textarea name="ingredients" required><?php echo htmlspecialchars($recipe['ingredients']); ?></textarea><br>
        <textarea name="instructions" required><?php echo htmlspecialchars($recipe['instructions']); ?></textarea><br>
        <button type="submit">Update Recipe</button>
    </form>
</body>
</html>
