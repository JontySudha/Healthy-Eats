<?php
include('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        if (isset($_POST['bmi_category'], $_POST['meal_description'], $_POST['diet_type'], $_POST['meal_type'], $_POST['day'])) {
            $bmi_category = $_POST['bmi_category'];
            $meal_description = $_POST['meal_description'];
            $diet_type = $_POST['diet_type'];
            $meal_type = $_POST['meal_type'];
            $day = $_POST['day'];

            $query = $con->prepare("INSERT INTO plans (bmi_category, meal_description, diet_type, meal_type, day) VALUES (?, ?, ?, ?, ?)");
            $query->bind_param("sssss", $bmi_category, $meal_description, $diet_type, $meal_type, $day);
            $query->execute();
        }
    }

    if (isset($_POST['edit'])) {
        if (isset($_POST['id'], $_POST['bmi_category'], $_POST['meal_description'], $_POST['diet_type'], $_POST['meal_type'], $_POST['day'])) {
            $id = $_POST['id'];
            $bmi_category = $_POST['bmi_category'];
            $meal_description = $_POST['meal_description'];
            $diet_type = $_POST['diet_type'];
            $meal_type = $_POST['meal_type'];
            $day = $_POST['day'];

            $query = $con->prepare("UPDATE diet_plans SET bmi_category = ?, meal_description = ?, diet_type = ?, meal_type = ?, day = ? WHERE id = ?");
            $query->bind_param("sssssi", $bmi_category, $meal_description, $diet_type, $meal_type, $day, $id);
            $query->execute();
        }
    }

    if (isset($_POST['delete'])) {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            $query = $con->prepare("DELETE FROM plans WHERE id = ?");
            $query->bind_param("i", $id);
            $query->execute();
        }
    }
}

$result = $con->query("SELECT * FROM diet_plans");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Diet Plans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: beige;
        }
        .container {
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Manage Diet Plans</h2>
        <form method="post">
            <div class="mb-3">
                <label for="bmi_category" class="form-label">BMI Category</label>
                <select class="form-select" id="bmi_category" name="bmi_category" required>
                    <option value="underweight">Underweight</option>
                    <option value="normal">Normal</option>
                    <option value="overweight">Overweight</option>
                    <option value="obese">Obese</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="meal_description" class="form-label">Meal Description</label>
                <input type="text" class="form-control" id="meal_description" name="meal_description" required>
            </div>
            <div class="mb-3">
                <label for="diet_type" class="form-label">Diet Type</label>
                <select class="form-select" id="diet_type" name="diet_type" required>
                    <option value="muscle_gain">Muscle Gain</option>
                    <option value="fat_loss">Fat Loss</option>
                    <option value="maintain">Maintain</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="meal_type" class="form-label">Meal Type</label>
                <select class="form-select" id="meal_type" name="meal_type" required>
                    <option value="veg">Vegetarian</option>
                    <option value="non_veg">Non-Vegetarian</option>
                    <option value="vegan">Vegan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="day" class="form-label">Day</label>
                <select class="form-select" id="day" name="day" required>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>
            </div>
            <button type="submit" name="add" class="btn btn-primary">Add Plan</button>
        </form>

        <h3 class="mt-4">Existing Plans</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>BMI Category</th>
                    <th>Meal Description</th>
                   
                    <th>Meal Type</th>
                    <th>Day</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['bmi_category']; ?></td>
                        <td><?php echo $row['meal_description']; ?></td>
                       
                        <td><?php echo $row['meal_type']; ?></td>
                        <td><?php echo $row['day']; ?></td>
                        <td>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                            </form>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id']; ?>">
                                Edit
                            </button>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel<?php echo $row['id']; ?>">Edit Plan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <div class="mb-3">
                                                    <label for="bmi_category" class="form-label">BMI Category</label>
                                                    <input type="text" class="form-control" name="bmi_category" value="<?php echo $row['bmi_category']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="meal_description" class="form-label">Meal Description</label>
                                                    <input type="text" class="form-control" name="meal_description" value="<?php echo $row['meal_description']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="diet_type" class="form-label">Diet Type</label>
                                                    <input type="text" class="form-control" name="diet_type" value="<?php echo $row['diet_type']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="meal_type" class="form-label">Meal Type</label>
                                                    <input type="text" class="form-control" name="meal_type" value="<?php echo $row['meal_type']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="day" class="form-label">Day</label>
                                                    <input type="text" class="form-control" name="day" value="<?php echo $row['day']; ?>" required>
                                                </div>
                                                <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
