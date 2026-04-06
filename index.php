<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);

    if ($stmt->rowCount() > 0) {
        $_SESSION['user'] = $username;
        header("Location:dashboard.php");
        exit();
    } else {
        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajie Login System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #000000, #ff4da6);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: #ffffff;
            padding: 40px;
            width: 350px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            text-align: center;
        }

        .container h1 {
            margin-bottom: 5px;
            color: #000;
        }

        .container p {
            margin-bottom: 20px;
            color: #ff4da6;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            background: #f9f9f9;
        }

        input:focus {
            border-color: #ff4da6;
            background: #fff;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #ff4da6;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #e60073;
        }

        .footer {
            margin-top: 20px;
            font-size: 13px;
            color: #000;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome</h1>
    <p>Ajie M. Taruc</p>

    <form method="POST">
    <label>User Name:</label><br>
    <input type="text" name="username"><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br>

    <button type="submit">Login</button>
</form>


    <div class="footer">
        © 2026 Ajie M. Taruc
    </div>
</div>

</body>
</html>