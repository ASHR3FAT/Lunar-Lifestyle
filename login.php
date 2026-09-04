<?php
require 'config.php';

if(isset($_POST['login'])){
    $login_id = $conn->real_escape_string($_POST['login_id']); 
    $pass = $_POST['password'];
    
    $user_res = $conn->query("SELECT * FROM users WHERE email='$login_id' AND password='$pass'");
    
    if($user_res->num_rows == 1){
        $user = $user_res->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user'] = $user['name'];
        header("Location: index.php");
        exit();
    } 
    
    $error = "Invalid Credentials. Please try again.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - LUNAR LIFESTYLE</title>
</head>
<body>
<div>
    <h2>Lunar Lifestyle Login</h2>
    
    <?php if(isset($error)) echo "<p>$error</p>"; ?>
    
    <form method="post" action="login.php">
        <label for="login_id">Email</label>
        <input type="text" id="login_id" name="login_id" required>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit" name="login">Login</button>
    </form>
</div>
</body>
</html>
