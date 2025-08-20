<?php
include('header.php');

if (isset($_GET['bmi_category'])) {
    $bmiCategory = $_GET['bmi_category'];

    // Prepare SQL to fetch diet plans based on BMI category
    $query = $con->prepare("SELECT * FROM diet_plans WHERE bmi_category = ?");
    $query->bind_param("s", $bmiCategory);
    $query->execute();
    $result = $query->get_result();
} else {
    echo '<div class="alert alert-warning">No BMI category selected.</div>';
    exit;  // Exit if no bmi_category is provided
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diet Plans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(rgba(0, 128, 0, 0.5), rgba(245, 245, 220, 0.5));
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: green;
            text-align: center;
            margin-bottom: 30px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table th {
            background-color: #006400;
            color: white;
        }
        .table td {
            background-color: #f8f9fa;
        }
        .table td.meal-description {
            font-style: italic;
            color: #555;
        }
        .table-hover tbody tr:hover {
            background-color: #e0f7e0;
        }
        .meal-type {
            font-weight: bold;
        }
        .day {
            background-color: #d1ecf1;
            color: #0c5460;
            font-weight: bold;
        }
        .back-btn {
            background-color: #006400;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            margin-top: 20px;
            width: 100%;
        }
        .back-btn:hover {
            background-color: #004d00;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Diet Plans for <?php echo ucfirst($bmiCategory); ?></h1>

        <?php
        if ($result && $result->num_rows > 0) {
            // Display diet plans in a table
            echo '<table class="table table-bordered table-hover">';
            echo '<thead>
                    <tr>
                        <th>Day</th>
                        <th>Meal Type</th>
                        <th>Meal Description</th>
                    </tr>
                  </thead>
                  <tbody>';

            // Loop through the results to display meal plans
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            foreach ($days as $day) {
                $mealTypes = ['Breakfast', 'Lunch', 'Dinner']; // Define meal types
                foreach ($mealTypes as $mealType) {
                    $mealDescription = '-'; // Default if no description

                    // Fetch meal description for each day and meal type
                    mysqli_data_seek($result, 0); // Reset pointer for each day
                    while ($row = $result->fetch_assoc()) {
                        if ($row['day'] == $day && $row['meal_type'] == $mealType) {
                            $mealDescription = htmlspecialchars($row['meal_description']);
                            break;
                        }
                    }

                    // Display each day, meal type, and its description
                    echo '<tr>';
                    if ($mealType == 'Breakfast') {
                        echo "<td class='day' rowspan='3'>$day</td>"; // Merge the day row
                    }
                    echo "<td class='meal-type'>$mealType</td>";
                    echo "<td class='meal-description' data-bs-toggle='tooltip' title='$mealDescription'>$mealDescription</td>";
                    echo '</tr>';
                }
            }

            echo '</tbody></table>';
        } else {
            echo '<div class="alert alert-warning">No diet plans available for this BMI category.</div>';
        }
        ?>

        <!-- Back Buttons -->
        <a href="bmi.php" class="back-btn">Back to BMI Calculator</a>
        <a href="index.php" class="back-btn">Back to Home</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Enable Bootstrap tooltips
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
        });
    </script>
</body>
</html>

<?php include('footer.php'); ?>
