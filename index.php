<?php
require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>LUNAR LIFESTYLE</title>
    <link rel="stylesheet" href="lunar.css">
</head>
<body>
<div class="container">
    <header>
        <a href="index.php" class="brand">Lunar Lifestyle</a>
        <div class="nav-links">
            <a href="checkout.php">Cart</a>
        </div>
    </header>

    <div class="product-grid">
        <?php
        $result = $conn->query("SELECT * FROM products");
        while ($row = $result->fetch_assoc()) {
            $img = !empty($row['image']) ? $row['image'] : 'https://placehold.co/400x500?text=No+Image';
            
            echo "<div class='product-card'>";
            echo "<a href='product.php?id={$row['id']}'>";
            echo "<img src='{$img}' alt='{$row['name']}'>";
            echo "<div class='product-title'>{$row['name']}</div>";
            echo "<div class='product-price'>{$row['price']} TK</div>";
            echo "</a>";
            echo "</div>";
        }
        ?>
    </div>
</div>
</body>
</html>
