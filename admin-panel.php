<?php
require 'config.php';
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit(); }

if (!file_exists('uploads')) { mkdir('uploads', 0777, true); }

if (isset($_POST['add_product'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $desc = $conn->real_escape_string($_POST['description']);
    $price = $_POST['price'];
    $discount = (int)$_POST['discount_percent'];
    
    $imagePath = "";
    if (!empty($_FILES["image"]["name"])) {
        $target = "uploads/" . time() . "_" . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
            $imagePath = $target;
        }
    }

    $conn->query("INSERT INTO products (name, description, price, discount_percent, image) 
                  VALUES ('$name', '$desc', '$price', '$discount', '$imagePath')");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - LUNAR LIFESTYLE</title>
    <link rel="stylesheet" href="lunar.css">
</head>
<body>
<div class="container" style="max-width: 1400px;">
    <header>
        <div class="brand">Admin Dashboard</div>
        <div class="nav-links">
            <a href="index.php" target="_blank">View Store</a>
            <a href="logout.php">Logout</a>
        </div>
    </header>

    <h2>Add New Product</h2>
    <form method="post" style="background:#fff; padding:20px; border:1px solid #eaeaea;">
        <input type="text" name="name" placeholder="Product Name" required>
        <textarea name="description" placeholder="Description" rows="3"></textarea>
        <input type="number" name="price" placeholder="Base Price (TK)" required>
        <button type="submit" name="add_product" class="btn">Upload Product</button>
    </form>
</div>
</body>
</html>
