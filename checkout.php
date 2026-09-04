<?php
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['remove'])) {
    unset($_SESSION['cart'][$_GET['remove']]);
    header("Location: checkout.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Checkout - LUNAR LIFESTYLE</title><link rel="stylesheet" href="lunar.css"></head>
<body>
<div class="container">
    <header>
        <a href="index.php" class="brand">Lunar Lifestyle</a>
    </header>

    <h2>Your Cart</h2>
    <?php if (!empty($_SESSION['cart'])): ?>
    <table>
        <tr><th>Product</th><th>Size</th><th>Qty</th><th>Price</th><th>Action</th></tr>
        <?php
        foreach ($_SESSION['cart'] as $key => $item) {
            $p = $conn->query("SELECT name, price FROM products WHERE id={$item['id']}")->fetch_assoc();
            $item_total = $p['price'] * $item['qty'];
            
            echo "<tr>
                    <td>{$p['name']}</td>
                    <td><b>{$item['size']}</b></td>
                    <td>{$item['qty']}</td>
                    <td>{$item_total} TK</td>
                    <td><a href='?remove=$key' class='btn btn-danger'>Remove</a></td>
                  </tr>";
        }
        ?>
    </table>
    <?php else: ?>
        <p>Your cart is empty. <a href="index.php">Go shopping</a></p>
    <?php endif; ?>
</div>
</body>
</html>
