<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Welcome to my page, <?php echo $_SESSION['user']; ?></h2>
    <a href="main.php">click me!</a>
</body>
</html>