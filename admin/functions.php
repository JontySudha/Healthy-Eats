<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'dinesh';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getAllUsers() {
    global $conn;
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function deleteUser($id) {
    global $conn;
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}
?>
