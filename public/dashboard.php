<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles/dashboard.css">
</head>
<body>
    <h1>Bem vindo <?php echo htmlspecialchars($username); ?></h1>
    <p>Esta é a página do seu dashboard.</p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
