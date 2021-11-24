<?php
//importa a classe Login
include_once("../Models/usuario.php");
//cria um objeto do tipo Login
$login = new Usuario();

if (isset($_POST["entrar"])) {
    //executa o método FazerLogin() passando os valores do formulário
    $login->Entrar($_POST["user"], $_POST["senha"]);
}
if (isset($_POST["sair"])) {
    //executa o método fazerLogout()
    $login->Sair();
}
?>