<?php
class bicicletamodel
{
    // Atributos
    protected $idBike;
    protected $modeloBike;
    protected $marcaBike;
    protected $quadroBike;
    protected $corBike;
    protected $valorBike;

    // Construtor
    public function __construct($idBike, $modeloBike, $marcaBike, $quadroBike, $corBike, $valorBike)
    {
        $this->idBike = $idBike;
        $this->modeloBike = $modeloBike;
        $this->marcaBike = $marcaBike;
        $this->quadroBike = $quadroBike;
        $this->corBike = $corBike;
        $this->valorBike = $valorBike;
    }

    // Getters e Setters
    public function getID() { return $this->idBike; }
    
    public function getModelo() { return $this->modeloBike; }
    public function setModelo($modeloBike) { $this->modeloBike = $modeloBike; return $this; }

    public function getMarca() { return $this->marcaBike; }
    public function setMarca($marcaBike) { $this->marcaBike = $marcaBike; return $this; }

    public function getQuadro() { return $this->quadroBike; }
    public function setQuadro($quadroBike) { $this->quadroBike = $quadroBike; return $this; }

    public function getCor() { return $this->corBike; }
    public function setCor($corBike) { $this->corBike = $corBike; return $this; }

    public function getValor() { return $this->valorBike; }
    public function setValor($valorBike) { $this->valorBike = $valorBike; return $this; }

    // Métodos CRUD
    public function cadastrarBicicleta(bicicletamodel $bicicleta) {
        include_once '../DAO/bicicletadao.php';
        $dao = new bicicletadao();
        $dao->cadastrarBicicleta($this);
    }

    public function listarBicicletas() {
        include '../DAO/bicicletadao.php';
        $dao = new bicicletadao();
        return $dao->listarBicicletas();
    }

    public function resgataPorID($idBike) {
        include '../DAO/bicicletadao.php';
        $dao = new bicicletadao();
        return $dao->resgatarID($idBike);
    }

    public function alterarBicicleta(bicicletamodel $bicicleta) {
        include_once '../DAO/bicicletadao.php';
        $dao = new bicicletadao();
        $dao->alterarBicicleta($this);
    }

    public function excluirBicicleta($idBike) {
        include_once '../DAO/bicicletadao.php';
        $dao = new bicicletadao();
        $dao->excluirBicicleta($idBike);
    }
}
?>
