<?php
class clientecontroller{
    public static function cadastrarCliente($nomeCli, $cpfCli, $enderecoCli, $telefoneCli, $emailCli, $senhaCli)
    {
        include '../model/clientemodel.php';
        $cliente = new clientemodel(null, $nomeCli, $cpfCli, $enderecoCli, $telefoneCli, $emailCli, $senhaCli);
        $cliente->cadastrarCliente($cliente);
    }

    public static function listarClientes()
    {
        include '../model/clientemodel.php';
        $model = new clientemodel(null, null, null, null, null, null, null);
        return $model->listarClientes();
    }

    public static function resgataPorID($idCliente){
        include '../model/clientemodel.php';
        $model = new clientemodel(null, null, null, null, null, null, null);
        return $model->resgataPorID($idCliente);
    }

    public static function alterarCliente($idCli, $nomeCli, $cpfCli, $enderecoCli, $telefoneCli, $emailCli, $senhaCli)
    {
        include '../model/clientemodel.php';
        $cliente = new clientemodel($idCli, $nomeCli, $cpfCli, $enderecoCli, $telefoneCli, $emailCli, $senhaCli);
        $cliente->alterarCliente($cliente);
    }

    public static function excluirCliente($idCli)
    {
        include '../model/clientemodel.php';
        $cliente = new clientemodel(null, null, null, null, null, null, null);
        $cliente->excluirCliente($idCli);
    }
}
?>
