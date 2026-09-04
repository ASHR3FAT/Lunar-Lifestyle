<?php
require 'config.php';
if (!isset($_SESSION['admin'])) { header("Location: admin_login.php"); exit(); }

if (!isset($_GET['id'])) { header("Location: admin_panel.php"); exit(); }
$id = (int)$_GET['id'];

$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
if(!$product) { die("Product not found."); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product - LUNAR LIFESTYLE</title>
    <link rel="stylesheet" href="lunar.css">
</head>
<body>
<div class="container">
    <header>
        <span class="brand">Admin Panel</span>
        <div class="nav-links">
            <a href="admin_panel.php" class="btn" style="background:#555;">Back to Inventory</a>
        </div>
    </header>

    <h2>Edit Product: <?php echo $product['name']; ?></h2>
    <form method="post" enctype="multipart/form-data" style="background:#fff; padding:20px; border:1px solid #eaeaea; max-width: 600px;">
        <label>Product Name</label>
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required>
        
        <label>Description</label>
        <textarea name="description" rows="3"><?php echo $product['description']; ?></textarea>
        
        <div style="display: flex; gap: 10px;">
            <div style="flex: 1;">
                <label>Base Price (TK)</label>
                <input type="number" name="price" value="<?php echo $product['price']; ?>" required>
            </div>
            <div style="flex: 1;">
                <label>Discount %</label>
                <input type="number" name="discount_percent" value="<?php echo $product['discount_percent']; ?>" min="0" max="100" required>
            </div>
        </div>
        
        <button type="submit" name="edit_product" class="btn btn-success" style="margin-top: 10px;">Save Changes</button>
    </form>
</div>
</body>
</html>
