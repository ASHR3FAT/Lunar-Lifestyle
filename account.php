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
    <div style="overflow-x: auto;">
        <table>
            <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Items Ordered</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
            <?php
            $res = $conn->query("SELECT * FROM orders WHERE user_id=$user_id ORDER BY created_at DESC");
            while ($row = $res->fetch_assoc()) {
                echo "<tr>
                        <td>#{$row['id']}</td>
                        <td>{$row['created_at']}</td>
                        <td>Pending fetch...</td>
                        <td style='font-weight: bold;'>{$row['total']} TK</td>
                        <td>{$row['status']}</td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
