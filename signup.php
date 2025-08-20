<?php
include('connection.php'); // Include your database connection script
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Check if the username or email already exists
    $check_sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = $con->query($check_sql);

    if ($result->num_rows > 0) {
        echo '<script>
        alert("Username or Email already exists. Please try a different one.");
        window.location.href="signup.php";
        </script>';
    } else {
        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (name, username, email, phone, password) VALUES ('$name', '$username', '$email', '$phone', '$hashed_password')";

        if ($con->query($sql) === TRUE) {
            echo '<script>
            alert("Signup successful! Please login.");
            window.location.href="signin.php";
            </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
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
    input[type="text"], input[type="email"], input[type="tel"], input[type="password"] {
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
    <h1>Signup</h1>
    <form method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required><br>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required><br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br>
      <label for="phone">Phone:</label>
      <input type="tel" id="phone" name="phone" required><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br>
      <button type="submit" class="btn">Signup</button>
    </form>
    <p>Already have an account? <a href="signin.php">Signin</a></p>
  </div>
</body>
</html>
