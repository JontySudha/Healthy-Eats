<?php
include('header.php');


$id = $_GET['id'];

$sql = "DELETE FROM recipes WHERE id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    header('Location: admin.php');
    exit;
} else {
    echo "Error: " . $con->error;
}
?>
