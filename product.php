<?php
require 'config.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = (int)$_GET['id'];

if (isset($_POST['add_to_cart'])) {
    $size = isset($_POST['size']) ? $_POST['size'] : '';
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $cart_key = $id . '_' . $size;
    
    if (!isset($_SESSION['cart'][$cart_key])) {
        $_SESSION['cart'][$cart_key] = ['id' => $id, 'size' => $size, 'qty' => 1];
    } else {
        $_SESSION['cart'][$cart_key]['qty']++;
    }
    header("Location: checkout.php");
    exit();
}

$cart_count = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cart_count += $item['qty'];
    }
}

$result = $conn->query("SELECT * FROM products WHERE id = $id");
if ($result->num_rows == 0) {
    die("<div style='text-align:center; padding: 50px; font-family: sans-serif;'><h2>Product not found.</h2><a href='index.php'>Go back to store</a></div>");
}
$product = $result->fetch_assoc();

$sale_price = $product['price'] - ($product['price'] * $product['discount_percent'] / 100);
$img = !empty($product['image']) ? $product['image'] : 'https://placehold.co/600x800?text=No+Image';

$sizes_res = $conn->query("SELECT size, quantity FROM product_sizes WHERE product_id = $id AND quantity > 0");
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $product['name']; ?></title>
    <link rel="stylesheet" href="lunar.css">
</head>
<body>
<div class="container">
    <div class="single-product-wrapper">
        <h1><?php echo $product['name']; ?></h1>
        <p><?php echo $product['price']; ?> TK</p>
        <p><?php echo $product['description']; ?></p>
    </div>
</div>
</body>
</html>
