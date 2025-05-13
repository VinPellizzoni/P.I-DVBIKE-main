<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Bicicletas</title>
    <link rel="stylesheet" href="../APP2/estilos/estilo.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: #222831;
            color: #eeeeee;
        }
        th, td {
            border: 1px solid #393e46;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #00adb5;
        }
        tr:nth-child(even) {
            background-color: #393e46;
        }
        a.action-link {
            background-color: #00adb5;
            color: white;
            padding: 6px 12px;
            margin-right: 5px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }
        a.action-link:hover {
            background-color: #028a94;
        }
    </style>
</head>
<body>
<div class="container">
<h1>Bicicletas Cadastradas</h1>
<a href="formBicicleta.php" class="action-link">Nova Bicicleta</a>

<?php
include("../controller/bicicletacontroller.php");
$res = bicicletacontroller::listarBicicletas();

if ($res->rowCount() > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Quadro</th>
            <th>Cor</th>
            <th>Valor</th>
            <th>Ações</th>
          </tr>";

    while ($row = $res->fetch(PDO::FETCH_OBJ)) {
        echo "<tr>
                <td>{$row->idBike}</td>
                <td>{$row->modeloBike}</td>
                <td>{$row->marcaBike}</td>
                <td>{$row->quadroBike}</td>
                <td>{$row->corBike}</td>
                <td>R$ ".number_format($row->valorBike, 2, ',', '.')."</td>
                <td>
                    <a href='formBicicleta.php?op=Alterar&idBike={$row->idBike}' class='action-link'>Editar</a> | 
                    <a href='../controller/processabicicleta.php?op=Excluir&idBike={$row->idBike}' 
                       onclick='return confirm(\"Tem certeza que deseja excluir?\")' class='action-link'>Excluir</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Nenhuma bicicleta cadastrada.</p>";
}
?>
</div>
</body>
</html>
