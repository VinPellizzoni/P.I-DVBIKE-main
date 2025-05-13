<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Cliente</title>
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
        input[type="text"], input[type="email"], input[type="password"] {
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
$operacao = $_REQUEST["op"];
if ($operacao == "Alterar") {
    include("../controller/clientecontroller.php");
    $res = clientecontroller::resgataPorID($_REQUEST["idCli"]);
    $qtd = $res->rowCount();
    $row = $res->fetch(PDO::FETCH_OBJ);
    $nomeCli = $row->nomeCli;
    $senhaCli = $row->senhaCli;
    $cpfCli = $row->cpfCli;
    $enderecoCli = $row->enderecoCli;
    $telefoneCli = $row->telefoneCli;
    $emailCli = $row->emailCli;
    $idCli = $row->idCli;
    
    $operacao = "Alterar";
}
else {
    $nomeCli = "";
    $senhaCli = "";
    $cpfCli = "";
    $enderecoCli = "";
    $telefoneCli = "";
    $idCli = "";
    $emailCli = "";
    $operacao = "Incluir";
}

print "<form method='post' action='../controller/processacliente.php'>";
print "    <label for='nomeCli'>Nome:</label>";
print "    <input type='text' name='nomeCli' value=\"".$nomeCli."\"><br>";
print "    <label for='senhaCli'>Senha:</label>";
print "    <input type='text' name='senhaCli' value=\"".$senhaCli."\"><br>";
print "    <label for='cpfCli'>CPF:</label>";
print "    <input type='text' name='cpfCli' value=\"".$cpfCli."\"><br>";
print "    <label for='enderecoCli'>Endereço:</label>";
print "    <input type='text' name='enderecoCli' value=\"".$enderecoCli."\"><br>";
print "    <label for='telefoneCli'>Telefone:</label>";
print "    <input type='text' name='telefoneCli' value=\"".$telefoneCli."\"><br>";
print "    <label for='emailCli'>E-mail:</label>";
print "    <input type='text' name='emailCli' value=\"".$emailCli."\"><br>";
print "    <input type='hidden' name='idCli' value=\"".$idCli."\"><br>";
print "    <input type='hidden' name='op' value=\"".$operacao."\"><br>";
print "    <input type='submit' value='".$operacao."'>";
print " </form>";
?>
</div>
</body>
</html>
