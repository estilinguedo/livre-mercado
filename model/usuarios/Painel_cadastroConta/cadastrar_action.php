<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=sistema_livre_mercado", "root", "");

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$cpf_cnpj = $_POST['cpf_cnpj'] ?? '';
$tipo_usuario = $_POST['tipo_usuario'] ?? 'usuario';

if (!$nome || !$email || !$senha || !$cpf_cnpj) {
    $_SESSION['msg'] = "Preencha todos os campos obrigatórios!";
    header("Location: cadastrar.html");
    exit;
}

$check = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :email OR cpf_cnpj = :cpf");
$check->execute([':email' => $email, ':cpf' => $cpf_cnpj]);
if ($check->rowCount() > 0) {
    $_SESSION['msg'] = "E-mail ou CPF/CNPJ já cadastrados!";
    header("Location: cadastrar.html");
    exit;
}

$hash = password_hash($senha, PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha_hash, telefone, cpf_cnpj, tipo_usuario) 
                       VALUES (:nome, :email, :senha, :telefone, :cpf, :tipo)");
$stmt->execute([
    ':nome' => $nome,
    ':email' => $email,
    ':senha' => $hash,
    ':telefone' => $telefone,
    ':cpf' => $cpf_cnpj,
    ':tipo' => $tipo_usuario
]);

$_SESSION['msg'] = "Conta criada com sucesso! Faça login.";
header("Location: ../Painel_loginConta/login.html");
exit;