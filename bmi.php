<?php
include('header.php');
// Initialize BMI category and BMI value
$bmiCategory = "";
$bmi = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input for weight and height (in cm)
    $weight = $_POST['weight'];
    $height_cm = $_POST['height']; // Height in cm

    // Validate input values
    if ($weight > 0 && $height_cm > 0) {
        // Convert height from cm to meters
        $height_m = $height_cm / 100;

        // Calculate BMI
        $bmi = $weight / ($height_m * $height_m);

        // Determine BMI category
        if ($bmi < 18.5) {
            $bmiCategory = "Underweight";
        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
            $bmiCategory = "Normal weight";
        } else {
            $bmiCategory = "Overweight";
        }
    } else {
        $bmiCategory = "Invalid input values"; // Handle invalid weight or height
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
</head>
<style>
  body {
    font-family: Arial, sans-serif;
    background: linear-gradient(rgba(0, 128, 0, 0.5), rgba(245, 245, 220, 0.5));
    background-size: cover;
    margin: 0;
    padding: 0;
}

.container {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
    width: 400px;
    height: 532px;
    margin: 78px auto;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
}

h1 {
    text-align: center;
    color: green;
}

label {
    display: block;
    margin-top: 10px;
    color: #006400;
}

input {
    width: calc(100% - 22px);
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    display: block;
    width: 100%;
    padding: 10px;
    margin-top: 15px;
    background-color: green;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #004d00;
}

#result {
    margin-top: 20px;
    text-align: center;
    font-size: 1.2em;
    color: #006400;
}

.bmiimg{ 
   padding-top: 50px;
   border-top-right-radius: 200px;
   border-bottom-right-radius: 200px;
   height: 87vh;
   width: 750px;
   object-fit: cover;
}

.cont{
    height: 650px;
    position: relative;
    display: flex;
    flex-direction: row;
}
</style>
<body>
    <div class="cont">
        <!-- Image Section -->
        <div class="img">
            <img src="https://images.stockcake.com/public/9/5/a/95a98056-beb6-4a5e-8209-48ba5830d7e3_large/meal-prep-time-stockcake.jpg" alt="image" class="bmiimg">
        </div>

        <!-- BMI Form Section -->
        <div class="container">
            <h1>BMI Calculator</h1>

            <!-- BMI Calculation Form -->
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="weight" class="form-label">Weight (kg)</label>
                    <input type="number" class="form-control" id="weight" name="weight" required>
                </div>
                <div class="mb-3">
                    <label for="height" class="form-label">Height (cm)</label>
                    <input type="number" class="form-control" id="height" name="height" required>
                </div>
                <button type="submit" class="btn btn-primary">Calculate BMI</button>
                <!-- Reset Button -->
                <button type="reset" class="btn btn-secondary mt-2">Reset</button>
            </form>

            <?php
            // Display BMI category if BMI is calculated
            if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($bmiCategory)) {
                echo "<div class='alert alert-info mt-3'>Your BMI: " . round($bmi, 2) . "<br>BMI Category: " . $bmiCategory . "</div>";
            }
            ?>

            <!-- If BMI is calculated, provide a button to get diet plans -->
            <?php if (!empty($bmiCategory) && $bmiCategory != "Invalid input values"): ?>
                <form method="GET" action="diet_plans.php">
                    <input type="hidden" name="bmi_category" value="<?php echo $bmiCategory; ?>">
                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">Get Diet Plans</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
        
    </div>
    <br><br>
</body>
</html>
<?php
include('footer.php');
?>
