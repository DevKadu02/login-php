<?php
session_start();
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = getUserByUsername($username);

    if ($user && verifyPassword($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Usuário ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="login.php">
        <label for="username">Usuário:</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Logar</button>
    </form>
</body>
</html>
