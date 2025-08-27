<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=sistema_livre_mercado", "root", "");

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$tipo  = $_POST['tipo_usuario'] ?? '';

$sql = "SELECT * FROM usuarios WHERE email = :email AND tipo_usuario = :tipo LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([':email' => $email, ':tipo' => $tipo]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($senha, $user['senha_hash'])) {
    $_SESSION['usuario_id'] = $user['id_usuario'];
    $_SESSION['nome'] = $user['nome'];
    $_SESSION['tipo'] = $user['tipo_usuario'];
    header("Location: area_restrita.php");
    exit;
} else {
    $_SESSION['msg'] = "Login inválido!";
    header("Location: login.html");
    exit;
}
