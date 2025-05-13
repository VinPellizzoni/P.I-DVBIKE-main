<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Bicicleta</title>
    <link rel="stylesheet" href="../APP2/estilos/estilo.css">
    <style>
        form {
            max-width: 500px;
            margin: 20px auto;
            background-color: #171C20;
            padding: 20px;
            border-radius: 8px;
            color: #FFFFFF;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #393e46;
            border-radius: 4px;
            background-color: #222831;
            color: #eeeeee;
        }
        input[type="submit"] {
            margin-top: 20px;
            background-color: #00adb5;
            border: none;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #028a94;
        }
    </style>
</head>
<body>
<div class="container">
<?php
$operacao = $_REQUEST["op"] ?? "Incluir";

if ($operacao == "Alterar") {
    include("../controller/bicicletacontroller.php");
    $res = bicicletacontroller::resgataPorID($_REQUEST["idBike"]);
    $row = $res->fetch(PDO::FETCH_OBJ);
    $modeloBike = $row->modeloBike;
    $marcaBike = $row->marcaBike;
    $quadroBike = $row->quadroBike;
    $corBike = $row->corBike;
    $valorBike = $row->valorBike;
    $idBike = $row->idBike;
} else {
    $modeloBike = "";
    $marcaBike = "";
    $quadroBike = "";
    $corBike = "";
    $valorBike = "";
    $idBike = "";
}
?>

<form method="post" action="../controller/processabicicleta.php">
    <input type="hidden" name="op" value="<?= $operacao ?>">
    <input type="hidden" name="idBike" value="<?= $idBike ?>">
    
    <label>Modelo:</label>
    <input type="text" name="modeloBike" value="<?= $modeloBike ?>" required><br>
    
    <label>Marca:</label>
    <input type="text" name="marcaBike" value="<?= $marcaBike ?>" required><br>
    
    <label>Quadro:</label>
    <input type="text" name="quadroBike" value="<?= $quadroBike ?>" required><br>
    
    <label>Cor:</label>
    <input type="text" name="corBike" value="<?= $corBike ?>" required><br>
    
    <label>Valor:</label>
    <input type="number" step="0.01" name="valorBike" value="<?= $valorBike ?>" required><br>
    
    <input type="submit" value="<?= $operacao ?>">
</form>
</div>
</body>
</html>
