<?php
class bicicletadao {
    public function cadastrarBicicleta(bicicletamodel $bicicleta){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "INSERT INTO bicicleta (modeloBike, marcaBike, quadroBike, corBike, valorBike)
                VALUES (:modelo, :marca, :quadro, :cor, :valor)";
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':modelo', $bicicleta->getModelo());
        $stmt->bindValue(':marca', $bicicleta->getMarca());
        $stmt->bindValue(':quadro', $bicicleta->getQuadro());
        $stmt->bindValue(':cor', $bicicleta->getCor());
        $stmt->bindValue(':valor', $bicicleta->getValor());
        $res = $stmt->execute();
        
        if($res){
            echo "<script>alert('Cadastro realizado com sucesso');</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar bicicleta');</script>";
        }
        echo "<script>location.href='../controller/processabicicleta.php?op=listar';</script>";
    }

    public function listarBicicletas(){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "SELECT * FROM bicicleta ORDER BY idBike";
        return $conex->conn->query($sql);
    }

    public function resgatarID($idBike){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "SELECT * FROM bicicleta WHERE idBike='$idBike'";
        return $conex->conn->query($sql);
    }

    public function alterarBicicleta(bicicletamodel $bicicleta){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "UPDATE bicicleta SET modeloBike=:modelo, marcaBike=:marca, 
                quadroBike=:quadro, corBike=:cor, valorBike=:valor WHERE idBike=:id";
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':id', $bicicleta->getID());
        $stmt->bindValue(':modelo', $bicicleta->getModelo());
        $stmt->bindValue(':marca', $bicicleta->getMarca());
        $stmt->bindValue(':quadro', $bicicleta->getQuadro());
        $stmt->bindValue(':cor', $bicicleta->getCor());
        $stmt->bindValue(':valor', $bicicleta->getValor());
        $res = $stmt->execute();
        
        if($res){
            echo "<script>alert('Alteração realizada com sucesso');</script>";
        } else {
            echo "<script>alert('Erro ao alterar bicicleta');</script>";
        }
        echo "<script>location.href='../controller/processabicicleta.php?op=listar';</script>";
    }

    public function excluirBicicleta($idBike){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "DELETE FROM bicicleta WHERE idBike='$idBike'";
        $res = $conex->conn->query($sql);
        
        if($res){
            echo "<script>alert('Exclusão realizada com sucesso');</script>";
        } else {
            echo "<script>alert('Erro ao excluir bicicleta');</script>";
        }
        echo "<script>location.href='../controller/processabicicleta.php?op=listar';</script>";
    }
}
?>
