<?php
include '../includes/db.php';

$product_id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $product['name']; ?></title>
</head>
<body>
    <h2><?php echo $product['name']; ?></h2>
    <p><?php echo $product['description']; ?></p>
    <p>Price: $<?php echo $product['price']; ?></p>
    <img src="../assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
    <form method="POST" action="../cart/add_to_cart.php">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
        <label>Quantity:</label>
        <input type="number" name="quantity" value="1" min="1">
        <button type="submit">Add to Cart</button>
    </form>
</body>
</html>
