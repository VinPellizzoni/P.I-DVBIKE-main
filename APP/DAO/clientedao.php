<?php
class clientedao {
    public function cadastrarCliente(clientemodel $cliente){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "INSERT INTO clientes (nomeCli, cpfCli, enderecoCli, telefoneCli, emailCli, senhaCli)
                VALUES (:nome, :cpf, :endereco, :telefone, :email, :senha)";
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':nome', $cliente->getNome());
        $stmt->bindValue(':cpf', $cliente->getCpf());
        $stmt->bindValue(':endereco', $cliente->getEndereco());
        $stmt->bindValue(':telefone', $cliente->getTelefone());
        $stmt->bindValue(':email', $cliente->getEmail());
        $stmt->bindValue(':senha', $cliente->getSenha());
        $res = $stmt->execute();
        
        if($res){
            echo "<script>alert('Cadastro realizado com sucesso');</script>";
        } else {
            echo "<script>alert('Erro: Não foi possível realizar o cadastro');</script>";
        }
        echo "<script>location.href='../controller/processacliente.php?op=listar';</script>";
    }

    public function listarClientes(){
        include_once 'conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "SELECT * FROM clientes ORDER BY idCli";
        return $conex->conn->query($sql);
    }

    public function resgatarID($idCliente){
        include_once 'conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "SELECT * FROM clientes WHERE idCli='$idCliente'";
        return $conex->conn->query($sql);
    }

    public function alterarCliente(clientemodel $cliente){
        include_once 'conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "UPDATE clientes SET nomeCli = :nome, cpfCli = :cpf,
                enderecoCli = :endereco, telefoneCli = :telefone, emailCli = :email, senhaCli = :senha WHERE idCli = :id";
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':id', $cliente->getID());
        $stmt->bindValue(':nome', $cliente->getNome());
        $stmt->bindValue(':cpf', $cliente->getCpf());
        $stmt->bindValue(':endereco', $cliente->getEndereco());
        $stmt->bindValue(':telefone', $cliente->getTelefone());
        $stmt->bindValue(':email', $cliente->getEmail());
        $stmt->bindValue(':senha', $cliente->getSenha());
        $res = $stmt->execute();
        
        if($res){
            echo "<script>alert('Registro alterado com sucesso');</script>";
        } else {
            echo "<script>alert('Erro: Não foi possível alterar o cadastro');</script>";
        }
        echo "<script>location.href='../controller/processacliente.php?op=listar';</script>";
    }

    public function excluirCliente($idCliente){
        include_once 'conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "DELETE FROM clientes WHERE idCli='$idCliente'";
        $res = $conex->conn->query($sql);
        
        if($res){
            echo "<script>alert('Exclusão realizada com sucesso!');</script>";
        } else {
            echo "<script>alert('Não foi possível excluir o usuário!');</script>";
        }
        echo "<script>location.href='../controller/processaCliente.php?op=Listar';</script>";
    }
}
?>
