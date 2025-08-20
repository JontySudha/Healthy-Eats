<?php
include('connection.php');
include('header.php');

if (!$con){
    die("Connection failed: ".mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  
  
  $password = $_POST['password'];

  $username = $_POST['username'];

  $check_sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  $result = $con->query($check_sql);

  if($result->num_rows > 0)
  {
    $_SESSION['username'] = $username;
    echo '<script>
    window.location.href="index.php";
    </script>';
  }

  else{
    echo '<script>
    alert("Incorrect Credentials Login Again or Return To Home")
    window.location.href="index.php";
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
      background-color:beige;
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
      height: 40px;
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
  </style>
</head>
<body>
  <div class="container">
    <h1>Signin As Admin</h1>
    <form method="post">

      <label for="username">Username:</label>
      <input type="text" id="username" name="username"><br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password"><br><br>
      <button type="submit" class="btn">signin</button>
    </form>
    <p>GO Back to Home Page <a href="../index.php">Home</a></p>
  </div>
</body>
</html>

<?php
include('footer.php');
?>
