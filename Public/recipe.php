<?php
// Include database connection file
include('header.php');

// Fetch all recipes from the database for display
$sql = "SELECT * FROM recipes";
$result = $con->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Recipes</title>
    <link rel="stylesheet" href="css/recipes.css">
</head>
<body>
    <div class="cont">
    <h1>Our Delicious Recipes</h1>

    <!-- Recipe Cards -->
    <div class="recipe-container">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="recipe-card">
                <img src="admin/uploads/images/<?php echo basename($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                <p><?php echo substr($row['description'], 0, 150); ?>...</p> <!-- Show short description -->
                <a href="recipe_details.php?id=<?php echo $row['id']; ?>">View Details</a>
            </div>
        <?php endwhile; ?>
    </div>
    </div>
    <br><br><br>
</body>
</html>
<?php
include('footer.php');
?>
