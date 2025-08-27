<!DOCTYPE html>
<html>
<head>
    <title>Recuperar Senha</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Recuperar Senha</h1>

    <?php if (!empty($erro)): ?>
        <p style="color:red"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <form method="POST" action="../../../model/usuarios/recuperar_senha.php">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <button type="submit">Enviar link de recuperação</button>
    </form>
</body>
</html>