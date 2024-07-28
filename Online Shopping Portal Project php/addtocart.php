<?php
include '../includes/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES ($user_id, $product_id, $quantity)";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
