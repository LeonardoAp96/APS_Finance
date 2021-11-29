<?php
include_once("../Models/cartao.php");
include_once("../Models/cartaoDAO.php");
include_once("../Models/conexao.php");

$conexao=new Conexao(); 
$conn=$conexao->conectar();

$cartaoDAO = new CartaoDAO();

if (isset($_POST["salvar"])) {
    $cartaoDAO->inserir($_POST["nome"],$_POST["tipo"], $_POST["saldo"],$conn);
}

if (isset($_POST["bt_listar"])) {
    $cartaoDAO->listar($conn);
}

if (isset($_POST["botao_excluir"])) {
    $cartaoDAO->excluir($_POST["id_excluir"],$conn);
}

?>