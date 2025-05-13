<?php
class clientemodel
{
    // Atributos
    protected $idCli;
    protected $nomeCli;
    protected $cpfCli;
    protected $enderecoCli;
    protected $telefoneCli;

    protected $emailCli;
    protected $senhaCli;

    // Construtor
    public function __construct($idCli, $nomeCli, $cpfCli, $enderecoCli, $telefoneCli, $emailCli, $senhaCli)
    {
        $this->idCli = $idCli;
        $this->nomeCli = $nomeCli;
        $this->cpfCli = $cpfCli;
        $this->enderecoCli = $enderecoCli;
        $this->telefoneCli = $telefoneCli;
        $this->emailCli = $emailCli;
        $this->senhaCli = $senhaCli;
    }

    public function getID()
    {
        return $this->idCli;
    }
    public function getSenha()
    {
        return $this->senhaCli;
    }
    public function setSenha($senhaCli)
    {
        $this->senhaCli = $senhaCli;
        return $this;
    }
    public function getNome()
    {
        return $this->nomeCli;
    }
    public function getEmail()
    {
        return $this->emailCli;
    }
    public function setEmail($emailCli)
    {
        $this->emailCli = $emailCli;
        return $this;
    }
    public function setNome($nomeCli)
    {
        $this->nomeCli = $nomeCli;
        return $this;
    }

    public function getCpf()
    {
        return $this->cpfCli;
    }

    public function setCpf($cpfCli)
    {
        $this->cpfCli = $cpfCli;
        return $this;
    }

    public function getEndereco()
    {
        return $this->enderecoCli;
    }

    public function setEndereco($enderecoCli)
    {
        $this->enderecoCli = $enderecoCli;
        return $this;
    }

    public function getTelefone()
    {
        return $this->telefoneCli;
    }

    public function setTelefone($telefoneCli)
    {
        $this->telefoneCli = $telefoneCli;
        return $this;
    }

    public function cadastrarCliente(clientemodel $cliente)
    {
        include_once '../DAO/clientedao.php';
        $cliente = new clientedao();
        $cliente->cadastrarCliente($this);
    }

    public function listarClientes()
    {
        include '../DAO/clientedao.php';
        $dao = new clientedao();
        return $dao->listarClientes();
    }

    public function resgataPorID($idCliente)
    {
        include '../DAO/clientedao.php';
        $model = new clientedao();
        return $model->resgatarID($idCliente);
    }

    public function alterarCliente(clientemodel $cliente)
    {
        include_once '../DAO/clientedao.php';
        $cliente = new clientedao();
        $cliente->alterarCliente($this);
    }

    public function excluirCliente($idCliente)
    {
        include_once '../DAO/clientedao.php';
        $cliente = new clientedao();
        $cliente->excluirCliente($idCliente);
    }
}
