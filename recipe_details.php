<?php
// Include database connection file
include('header.php');

// Get recipe ID from the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the recipe details from the database
$sql = "SELECT * FROM recipes WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Check if recipe exists
if ($result->num_rows == 0) {
    echo "Recipe not found!";
    exit;
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['title']); ?></title>
    <link rel="stylesheet" href="css/recipes.css">
</head>
<body>
    <div class="recipe-details">
        <h2><?php echo htmlspecialchars($row['title']); ?></h2>
        <img src="admin/uploads/images/<?php echo basename($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
        
        <h3>Description:</h3>
        <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p> <!-- Show full description -->

        <h3>Ingredients:</h3>
        <p><?php echo nl2br(htmlspecialchars($row['ingredients'])); ?></p>

        <h3>Instructions:</h3>
        <p><?php echo nl2br(htmlspecialchars($row['instructions'])); ?></p>

        <a href="recipe.php">Back to Recipes</a>
    </div>
</body>
</html>
