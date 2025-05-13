<?php
class bicicletacontroller {
    public static function cadastrarBicicleta($modeloBike, $marcaBike, $quadroBike, $corBike, $valorBike) {
        include '../model/bicicletamodel.php';
        $bicicleta = new bicicletamodel(null, $modeloBike, $marcaBike, $quadroBike, $corBike, $valorBike);
        $bicicleta->cadastrarBicicleta($bicicleta);
    }

    public static function listarBicicletas() {
        include '../model/bicicletamodel.php';
        $model = new bicicletamodel(null, null, null, null, null, null);
        return $model->listarBicicletas();
    }

    public static function resgataPorID($idBike) {
        include '../model/bicicletamodel.php';
        $model = new bicicletamodel(null, null, null, null, null, null);
        return $model->resgataPorID($idBike);
    }

    public static function alterarBicicleta($idBike, $modeloBike, $marcaBike, $quadroBike, $corBike, $valorBike) {
        include '../model/bicicletamodel.php';
        $bicicleta = new bicicletamodel($idBike, $modeloBike, $marcaBike, $quadroBike, $corBike, $valorBike);
        $bicicleta->alterarBicicleta($bicicleta);
    }

    public static function excluirBicicleta($idBike) {
        include '../model/bicicletamodel.php';
        $bicicleta = new bicicletamodel(null, null, null, null, null, null);
        $bicicleta->excluirBicicleta($idBike);
    }
}
?>
