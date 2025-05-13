<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeCli = $_POST['nomeCli'];
    $senhaCli = $_POST['senhaCli'];
    $senhaCli_confirm = $_POST['senhaCli_confirm'];

    // Verifica se as senhas coincidem
    if ($senhaCli !== $senhaCli_confirm) {
        $error = 'As senhas não coincidem.';
    } else {
        // Verifica se o nome de usuário já existe
        $stmt = $pdo->prepare("SELECT * FROM cliente  WHERE nomeCli = ?");//users = cliente  username = nomeCli
        $stmt->execute([$nomeCli]);
        if ($stmt->fetch()) {
            $error = 'Nome de usuário já existe.';
        } else {
            // Insere o novo usuário no banco de dados
            $hashed_senhaCli = password_hash($senhaCli, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("INSERT INTO cliente (nomeCli, senhaCli) VALUES (?, ?)");
            if ($stmt->execute([$nomeCli, $hashed_senhaCli])) {
                $success = 'Usuário registrado com sucesso. Você pode fazer login agora.';
            } else {
                $error = 'Erro ao registrar o usuário. Tente novamente.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro de Novo Usuário</title>
</head>
<body>
    <h2>Registro de Novo Usuário</h2>
    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <p style="color:green;"><?php echo $success; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label>Nome de usuário:</label>
        <input type="text" name="nomeCli" required>
        <br>
        <label>Senha:</label>
        <input type="senhaCli" name="senhaCli" required>
        <br>
        <label>Confirme a senha:</label>
        <input type="senhaCli" name="senhaCli_confirm" required>
        <br>
        <button type="submit">Registrar</button>
    </form>
    <br>
    <a href="login.php">Já tem uma conta? Faça login</a>
</body>
</html>
