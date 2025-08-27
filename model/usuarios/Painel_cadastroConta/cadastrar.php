<?php
session_start();
$msg = $_SESSION['msg'] ?? '';
unset($_SESSION['msg']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Criar Conta</title>
</head>
<body>
<h2>Criar Conta</h2>

<?php if($msg): ?>
<p style="color:red;"><?= htmlspecialchars($msg) ?></p>
<?php endif; ?>

<form action="cadastrar_action.php" method="post">
    <label>Nome:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Senha:</label><br>
    <input type="password" name="senha" required><br><br>

    <label>Telefone:</label><br>
    <input type="text" name="telefone"><br><br>

    <label>CPF/CNPJ:</label><br>
    <input type="text" name="cpf_cnpj" required><br><br>

    <label>Tipo de Conta:</label><br>
    <select name="tipo_usuario">
        <option value="usuario">Usuário</option>
        <option value="admin">Administrador</option>
    </select><br><br>

    <button type="submit">Cadastrar</button>
</form>

<br>
<a href="../Painel_loginConta/login.php">Voltar ao Login</a>
</body>
</html>
