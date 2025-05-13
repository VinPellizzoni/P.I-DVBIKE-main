<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta ao banco de dados para verificar o usuário
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: itens.php');
        exit();
    } else {
        $error = 'Nome de usuário ou senha inválidos';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label>Nome de usuário:</label>
        <input type="text" name="nomeCli" required>
        <br>
        <label>Senha:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Entrar</button>
    </form>
</body>



</html>


