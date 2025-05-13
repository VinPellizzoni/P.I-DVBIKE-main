<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Verifica se as senhas coincidem
    if ($password !== $password_confirm) {
        $error = 'As senhas não coincidem.';
    } else {
        // Verifica se o nome de usuário já existe
        $stmt = $pdo->prepare("SELECT * FROM users  WHERE username = ?");//users = users  username = username
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            $error = 'Nome de usuário já existe.';
        } else {
            // Insere o novo usuário no banco de dados
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            if ($stmt->execute([$username, $hashed_password])) {
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
        <input type="text" name="username" required>
        <br>
        <label>Senha:</label>
        <input type="password" name="password" required>
        <br>
        <label>Confirme a senha:</label>
        <input type="password" name="password_confirm" required>
        <br>
        <button type="submit">Registrar</button>
    </form>
    <br>
    <a href="login.php">Já tem uma conta? Faça login</a>
</body>
</html>
