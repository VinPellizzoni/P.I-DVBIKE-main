<?php
class Conexao {
    // Atributos
    private $host = '127.0.0.1';
    private $db_name = 'dvbike';
    private $username = 'root';
    private $password = "";
    public $conn;

    public function fazConexao() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", 
                                  $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erro de Conexao: ".$e->getMessage();
        }
        return $this->conn;
    }
}
?>
