<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
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
        button.action-btn {
            background-color: #00adb5;
            border: none;
            color: white;
            padding: 6px 12px;
            margin-right: 5px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
        }
        button.action-btn:hover {
            background-color: #028a94;
        }
    </style>
</head>
<body>
<div class="container">
<?php
    include("../controller/clientecontroller.php");
    $res = clientecontroller::listarClientes();
    $qtd = $res->rowCount();
    if($qtd>0){
        print "<table>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome</th>";
        print "<th>Senha</th>";
        print "<th>CPF</th>";
        print "<th>Endereço</th>";
        print "<th>Telefone</th>";
        print "<th>Email</th>";
        print "<th>Ações</th>";
        print "</tr>";
        while ($row = $res->fetch(PDO::FETCH_OBJ)) {
            print "<tr>";
            print "<td>".$row->idCli."</td>";
            print "<td>".$row->nomeCli."</td>";
            print "<td>".$row->senhaCli."</td>";
            print "<td>".$row->cpfCli."</td>";
            print "<td>".$row->enderecoCli."</td>";
            print "<td>".$row->telefoneCli."</td>";
            print "<td>".$row->emailCli."</td>";
            print "<td>
                <button class='action-btn' onclick=\"location.href='../view/formCliente.php?op=Alterar&idCli=".$row->idCli."'\">Alterar</button>
                <button class='action-btn' onclick=\"if(confirm('Tem certeza que deseja excluir?')) {
                    location.href='../controller/processacliente.php?op=Excluir&idCli=".$row->idCli."';
                } else { false; }\">Excluir</button>
            </td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        echo "<p>Nenhum registro encontrado!</p>";
    }
?>
</div>
</body>
</html>
