<?php
include('header.php');
include('connection.php');


// Check if the title is provided
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $username = $_SESSION['username'];

    // Delete the job from the database
    $sql = "DELETE FROM users WHERE email='$email'";

    if ($con->query($sql) === TRUE) {
        echo '<script>alert("Recipe deleted successfully.");
              window.location.href = "users.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
    header("Location:users.php");
    exit();
}

// Close connection
$con->close();
?>