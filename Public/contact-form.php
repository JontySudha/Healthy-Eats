<?php
include('connection.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $check_sql = "SELECT * FROM users WHERE email='$email' OR phone='$phone'";
    $result = $con->query($check_sql);

    if($result->num_rows > 0)
    {
      echo '<script>
      alert("User Already Exists")
      </script>';
    }

    else{

    
    $sql = "INSERT INTO contactrequests (name, email, subject, message)  VALUES ('$name','$email','$subject','$message')";

    if ($con->query($sql) === TRUE) {
        echo '<script>
        window.location.href = "index.php";
        </script>';
}
else {

    echo "Error: " . $sql . "<br>" . $con->error;
}
}
}
?>