<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Account - LUNAR LIFESTYLE</title>
</head>
<body>
<div class="container">
    <h2>My Orders</h2>
</div>
</body>
</html>
