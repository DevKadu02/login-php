<?php
require_once '..\includes\functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $email = htmlspecialchars(trim($_POST['email']));

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Erro: Email inválido.";
        exit;
    }

    $existingUser = getUserByUsername($username);
    $existingEmail = getUserByEmail($email);

    if ($existingUser) {
        echo "Erro: Este nome de usuário já está em uso.";
    } else if ($existingEmail) {
        echo "Erro: Este email já está em uso.";
    } else {
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (createUser($username, $email, $hashedPassword)) {
           
            header("Location: login.php");
            exit;
        } else {
            echo "Erro ao registrar o usuário.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" href="styles/register.css">
</head>
<body>
    <div class="square">
    <h1>Registro</h1>
    <form method="post" action="">
        <label for="username">Usuário:</label>
        <input type="text" name="username" id="username" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Registrar</button>
        <p><a href="login.php">Caso já tenha uma conta</a></p>
        </div>
    </form>
</body>
</html>
