<?php
include '../includes/db.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>
    <h2>Products</h2>
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li>
                <a href="product_detail.php?id=<?php echo $row['id']; ?>">
                    <?php echo $row['name']; ?>
                </a>
                - $<?php echo $row['price']; ?>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
