<?php
include '../includes/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT cart.*, products.name, products.price FROM cart JOIN products ON cart.product_id = products.id WHERE user_id = $user_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h2>Shopping Cart</h2>
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li>
                <?php echo $row['name']; ?> - $<?php echo $row['price']; ?> x <?php echo $row['quantity']; ?>
                <form method="POST" action="remove_from_cart.php">
                    <input type="hidden" name="cart_id" value="<?php echo $row['id']; ?>">
                    <button type="submit">Remove</button>
                </form>
            </li>
        <?php endwhile; ?>
    </ul>
    <a href="../checkout/index.php">Proceed to Checkout</a>
</body>
</html>
