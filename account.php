<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Account - LUNAR LIFESTYLE</title>
    <link rel="stylesheet" href="lunar.css">
</head>
<body>
<div class="container">
    <header>
        <a href="index.php" class="brand">Lunar Lifestyle</a>
        <div class="nav-links"><a href="logout.php">Logout</a></div>
    </header>

    <h2>My Orders</h2>
</div>
</body>
</html>
