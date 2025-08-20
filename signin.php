<?php
include('connection.php'); // Include your database connection script
session_start();

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to find the user by username
    $check_sql = "SELECT * FROM users WHERE username='$username'";
    $result = $con->query($check_sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the hashed password
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            echo '<script>
            window.location.href="index.php";
            </script>';
        } else {
            echo '<script>
            alert("Incorrect Password. Please try again.");
            window.location.href="signin.php";
            </script>';
        }
    } else {
        echo '<script>
        alert("No user found with this username. Please Signup.");
        window.location.href="signup.php";
        </script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Signin</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: beige;
    }
    .container {
      width: 500px;
      margin: 40px auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
      margin-top: 0;
    }
    label {
      display: block;
      margin-bottom: 10px;
    }
    input[type="text"], input[type="password"] {
      width: 80%;
      margin-bottom: 20px;
      padding: 10px;
      border: 1px solid #ccc;
    }
    .btn {
      width: 100%;
      height: 40px;
      background-color: #4CAF50;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .btn:hover {
      background-color: #3e8e41;
    }
    a {
      color: #4CAF50;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Signin</h1>
    <form method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required><br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br><br>
      <button type="submit" class="btn">Signin</button>
    </form>
    <p>Don't have an account? <a href="signup.php">Signup</a></p>
  </div>
</body>
</html>
