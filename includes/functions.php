<?php
require_once '../config/db.php';

function createUser($username, $email, $password) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    return $stmt->execute(['username' => $username, 'password' => $password, 'email' => $email]);
}

function getUserByUsername($username) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:username");
    $stmt->execute(['username' => $username]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUserByEmail($email) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email");
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function verifyPassword($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}
?>
