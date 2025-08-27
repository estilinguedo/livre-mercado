<?php
session_start();
$msg = $_SESSION['msg'] ?? '';
unset($_SESSION['msg']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>
<h2>Login</h2>

<?php if($msg): ?>
<p style="color:red;"><?= htmlspecialchars($msg) ?></p>
<?php endif; ?>

<form action="login_action.php" method="post">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Senha:</label><br>
    <input type="password" name="senha" required><br><br>

    <label>Tipo de Conta:</label><br>
    <select name="tipo_usuario">
        <option value="usuario">Usuário</option>
        <option value="admin">Administrador</option>
    </select><br><br>

    <button type="submit">Entrar</button>
</form>

<br>
<a href="../Painel_cadastroConta/cadastrar.php">Criar Conta</a>
</body>
</html>
