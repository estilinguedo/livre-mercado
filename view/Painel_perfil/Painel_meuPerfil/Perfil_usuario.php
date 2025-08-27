<?php include 'menuL.php';
try {
    $dsn = 'mysql:host=localhost;dbname=sistema_livre_mercado;charset=utf8';
    $usuario = 'root';
    $senha = '';       
    $conexao = new PDO($dsn, $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro na conexão: ' . $e->getMessage();
    exit;
}

$sql = "SELECT nome, email, tipo_usuario FROM usuarios WHERE id_usuario = 1";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>
</head>
<body>
    <h1>Perfil do Usuário</h1>

    <?php if ($usuario): ?>
        <p><strong>Nome:</strong> <?= htmlspecialchars($usuario['nome']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($usuario['email']) ?></p>
        <p><strong>Tipo de Usuário:</strong> <?= htmlspecialchars($usuario['tipo_usuario']) ?></p>
    <?php else: ?>
        <p>Usuário não encontrado.</p>
    <?php endif; ?>
</body>
</html>
