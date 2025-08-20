<?php
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <link rel="stylesheet" href="css/bmi.css">
</head>
<body>
   

    <!-- <div class="container text-center">
  <div class="row">
    <div class="col m-1 p-1">
      <div class="bmimg">
        <img src="https://images.pexels.com/photos/6707694/pexels-photo-6707694.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="image" class="bmiimg">
      </div>
    </div>
    <div class="col">
    <div class="bmicontainer">
        <h1>BMI Calculator</h1>
        <form id="bmi-form">
            <label for="height">Height (cm):</label>
            <input type="number" id="height" name="height" required>

            <label for="weight">Weight (kg):</label>
            <input type="number" id="weight" name="weight" required>

            <button type="button" onclick="calculateBMI()">Calculate BMI</button>
        </form>
        <div id="result"></div>
    </div>

    </div>
    </div>
    </div> -->


  <div class="cont">
  <div class="img">
  <img src="https://images.stockcake.com/public/9/5/a/95a98056-beb6-4a5e-8209-48ba5830d7e3_large/meal-prep-time-stockcake.jpg" alt="image" class="bmiimg">
  </div>
  <div class="box">
  <div class="bmicontainer">
        <h1>BMI Calculator</h1>
        <form id="bmi-form">
            <label for="height">Height (cm):</label>
            <input type="number" id="height" name="height" required>

            <label for="weight">Weight (kg):</label>
            <input type="number" id="weight" name="weight" required>
<br><br>
            <button type="button" onclick="calculateBMI()">Calculate BMI</button>
        </form>
        <div id="result"></div>
    </div>

    </div>

  </div>





    <script src="js/bmi.js"></script>
</body>
</html>
<?php
include('footer.php');
?>