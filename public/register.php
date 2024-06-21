<?php

require_once '../includes/functions.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];   
}

$existingUser = getUserByUsername($username);
$existingEmail = getUserByEmail($email);

if ($existingUser) {
    echo"Erro: Este nome de usuário já está em uso.";
} else if ($existingEmail) {
    echo "Erro: Este email já está em uso.";
}  else {
    
    if (createUser($username, $email, $password)) {
        echo "Usuário registrado com sucesso!";

        header("Location: login.php");
        exit;
    } else {
        echo "Erro ao registrar o usuário.";
    }
}

?>

<!DOCTYPE html >
<html>
<head >
        <title>Registro</title>

</head>
<body>
    <h1>Registro</h1>
    <form method="post" action="">
        <label for="username">Usuário:</label>
        <input type="text" name="username" id="username" required>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required>

        <label for="password">Senha:</label>
        <input type="text" name="password" id="password" required>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>