<?php
switch($_REQUEST["op"])
{
    case "Incluir":
        incluir();break;
    case "Alterar":
        alterar();break;
    case "Excluir":
        excluir();break;
    case "Listar":
        listar();break;
    default:
        echo "nao encontrou chave";
}

function incluir(){
    $nomeCli = $_POST["nomeCli"];
    $cpfCli = $_POST["cpfCli"];
    $enderecoCli = $_POST["enderecoCli"];
    $telefoneCli = $_POST["telefoneCli"];
    $emailCli = $_POST["emailCli"];
    $senhaCli = $_POST["senhaCli"];
    include 'clientecontroller.php';
    $contr = new clientecontroller();
    $contr->cadastrarCliente($nomeCli, $cpfCli, $enderecoCli, $telefoneCli, $emailCli, $senhaCli);
}

function alterar(){
    $nomeCli = $_POST["nomeCli"];
    $cpfCli = $_POST["cpfCli"];
    $enderecoCli = $_POST["enderecoCli"];
    $telefoneCli = $_POST["telefoneCli"];
    $emailCli = $_POST["emailCli"];
    $senhaCli = $_POST["senhaCli"];
    $idCli = $_POST["idCli"];
    include 'clientecontroller.php';
    $contr = new clientecontroller();
    $contr->alterarCliente($idCli, $nomeCli, $cpfCli, $enderecoCli, $telefoneCli, $emailCli, $senhaCli);
}

function excluir(){
    $idCli = $_REQUEST["idCli"];
    include 'clientecontroller.php';
    $contr = new clientecontroller();
    $contr->excluirCliente($idCli);
}

function listar()
{
    include '../view/formListarCliente.php';
}
?>
