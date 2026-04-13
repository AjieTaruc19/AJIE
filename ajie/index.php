<?php
session_start();
require 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);

    if($stmt->rowCount() > 0){
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit();
    }else{
        $error = "Invalid username or password.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">  
        <h1>Welcome</h1>
        <h2>Ajie M. Taruc</h2>

        <!-- ADD onsubmit -->
        <form method="POST">
            <label>User Name:</label><br>
            <input type="text" name="username"><br>
            <label>Password:</label><br>
            <input type="password" name="password"><br>

            <button type="">Login</button>
        </form>
    </div>
</body>
</html>