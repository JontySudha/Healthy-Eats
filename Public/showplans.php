<?php
include('header.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $diet_type = $_POST['diet_type'];
    $meal_type = $_POST['meal_type'];

    $query = $con->prepare("SELECT * FROM plans WHERE diet_type = ? AND meal_type = ?");
    $query->bind_param("ss", $diet_type, $meal_type);
    $query->execute();
    $result = $query->get_result();
} else {
    // Redirect to the selection form if accessed directly
    header("Location: dietplan.php");
    exit;
}

// Define the getMeal function before using it
function getMeal($result, $day, $meal) {
    mysqli_data_seek($result, 0);
    while ($row = $result->fetch_assoc()) {
        if ($row['day'] == $day && $row['meal'] == $meal) {
            return htmlspecialchars($row['meal_description']);
        }
    }
    return '-';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Diet Plans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: beige;
            
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .diet-plan {
            margin-top: 20px;
        }
        .diet-plan h3 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Diet Plan</h1>
        
        <?php if (isset($result) && $result->num_rows > 0): ?>
            <div class="diet-plan">
                <h3>Meal Plan for <?php echo ucfirst($diet_type); ?> - <?php echo ucfirst($meal_type); ?></h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Breakfast</th>
                            <th>Lunch</th>
                            <th>Dinner</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                        foreach ($days as $day) {
                            echo '<tr>';
                            echo '<td>' . $day . '</td>';
                            
                            // Fetch meals for each day using the getMeal function
                            $breakfast = getMeal($result, $day, 'Breakfast');
                            $lunch = getMeal($result, $day, 'Lunch');
                            $dinner = getMeal($result, $day, 'Dinner');

                            echo '<td>' . $breakfast . '</td>';
                            echo '<td>' . $lunch . '</td>';
                            echo '<td>' . $dinner . '</td>';
                            
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-warning mt-3">No plans found for the selected options.</div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
include('footer.php');
?>