<?php
session_start();
require 'config.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Consulta ao banco de dados para obter os itens
$stmt = $pdo->query("SELECT * FROM itens");
$items = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Itens</title>
</head>
<body>
    <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nomeCli']); ?>!</h2>
    <a href="logout.php">Sair</a>
    <h2>Itens</h2>
    <ul>
        <?php foreach ($items as $item): ?>
            <li><?php echo htmlspecialchars($item['name']) . ": " . htmlspecialchars($item['description']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
