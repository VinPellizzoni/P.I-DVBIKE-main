<?php
switch($_REQUEST["op"]) {
    case "Incluir":
        incluir(); break;
    case "Alterar":
        alterar(); break;
    case "Excluir":
        excluir(); break;
    case "Listar":
        listar(); break;
    default:
        /*echo "Operação concluída!";*/
        listar();
}

function incluir() {
    $modeloBike = $_POST["modeloBike"];
    $marcaBike = $_POST["marcaBike"];
    $quadroBike = $_POST["quadroBike"];
    $corBike = $_POST["corBike"];
    $valorBike = $_POST["valorBike"];
    
    include 'bicicletacontroller.php';
    bicicletacontroller::cadastrarBicicleta($modeloBike, $marcaBike, $quadroBike, $corBike, $valorBike);
}

function alterar() {
    $idBike = $_POST["idBike"];
    $modeloBike = $_POST["modeloBike"];
    $marcaBike = $_POST["marcaBike"];
    $quadroBike = $_POST["quadroBike"];
    $corBike = $_POST["corBike"];
    $valorBike = $_POST["valorBike"];
    
    include 'bicicletacontroller.php';
    bicicletacontroller::alterarBicicleta($idBike, $modeloBike, $marcaBike, $quadroBike, $corBike, $valorBike);
}

function excluir() {
    $idBike = $_REQUEST["idBike"];
    include 'bicicletacontroller.php';
    bicicletacontroller::excluirBicicleta($idBike);
}

function listar() {
    include '../view/formListarBicicleta.php';
}
?>
