<?php
// Include database connection file
include('header.php');

// Fetch recipe to edit if 'edit' parameter is set
$recipeToEdit = null;
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $sql = "SELECT * FROM recipes WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $recipeToEdit = $result->fetch_assoc();
}

// Handle form submission for add/edit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $title = $_POST['title'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = "uploads/images/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Create directory if it doesn't exist
        }
        $imageName = uniqid() . "_" . basename($_FILES['image']['name']);
        $imagePath = $uploadDir . $imageName;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            echo "Error uploading image.";
            exit;
        }
    }

    if ($id > 0) {
        if ($imagePath) {
            $sql = "UPDATE recipes SET title = ?, description = ?, ingredients = ?, instructions = ?, image = ? WHERE id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sssssi", $title, $description, $ingredients, $instructions, $imagePath, $id);
        } else {
            $sql = "UPDATE recipes SET title = ?, description = ?, ingredients = ?, instructions = ? WHERE id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssssi", $title, $description, $ingredients, $instructions, $id);
        }
    } else {
        $sql = "INSERT INTO recipes (title, description, ingredients, instructions, image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssss", $title, $description, $ingredients, $instructions, $imagePath);
    }

    $stmt->execute();
    header("Location: recipe.php");
    exit;
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $sql = "DELETE FROM recipes WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: recipe.php");
    exit;
}

// Fetch all recipes
$sql = "SELECT * FROM recipes";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Recipes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        header {
            background: #4caf50;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 2rem;
        }
        .container {
            max-width: 1050px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #4caf50;
            margin-top: 0;
            font-size: 2rem;
        }
        form {
            margin-bottom: 20px;
        }
        form input[type="text"],
        form textarea,
        form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        form button {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        form button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4caf50;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Panel - Manage Recipes</h1>
    </header>
    <div class="container">
        <section>
            <h2><?php echo isset($recipeToEdit) ? 'Edit Recipe' : 'Add New Recipe'; ?></h2>
            <form action="recipe.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo isset($recipeToEdit['id']) ? $recipeToEdit['id'] : ''; ?>">
                <label for="title">Title:</label>
                <input type="text" name="title" value="<?php echo isset($recipeToEdit['title']) ? htmlspecialchars($recipeToEdit['title']) : ''; ?>" required>
                <label for="description">Description:</label>
                <textarea name="description" required><?php echo isset($recipeToEdit['description']) ? htmlspecialchars($recipeToEdit['description']) : ''; ?></textarea>
                <label for="ingredients">Ingredients:</label>
                <textarea name="ingredients" required><?php echo isset($recipeToEdit['ingredients']) ? htmlspecialchars($recipeToEdit['ingredients']) : ''; ?></textarea>
                <label for="instructions">Instructions:</label>
                <textarea name="instructions" required><?php echo isset($recipeToEdit['instructions']) ? htmlspecialchars($recipeToEdit['instructions']) : ''; ?></textarea>
                <label for="image">Image:</label>
                <input type="file" name="image">
                <?php if (isset($recipeToEdit['image']) && !empty($recipeToEdit['image'])): ?>
                    <p>Current Image:</p>
                    <img src="<?php echo htmlspecialchars($recipeToEdit['image']); ?>" alt="Current Image" width="100">
                <?php endif; ?>
                <button type="submit"><?php echo isset($recipeToEdit) ? 'Update Recipe' : 'Add Recipe'; ?></button>
            </form>
        </section>

        <section>
            <h2>Recipes List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Ingredients</th>
                        <th>Instructions</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td><?php echo htmlspecialchars($row['ingredients']); ?></td>
                        <td><?php echo htmlspecialchars($row['instructions']); ?></td>
                        <td>
                            <?php if (!empty($row['image'])): ?>
                                <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Image" width="100">
                            <?php else: ?>
                                No image
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="recipe.php?edit=<?php echo $row['id']; ?>">Edit</a> |
                            <a href="recipe.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this recipe?')">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
