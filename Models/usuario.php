<?php
class Usuario{

    private $usuario;
    private $senha;

    public function getUsuario(){
        return $this->$usuario;
    }

    public function setUsuario($user){
        $this->$usuario = $user;
    }

    public function getSenha(){
        return $this->$usuario;
    }

    public function setSenha($senha){
        $this->$senha = $senha;
    }

    public function Entrar($user, $senha){
          $usuario_ = "Linux";
          $senha_ = "123";
          echo '<script>alert("Deu cErto")</script>';
          session_start();
  
          $_SESSION["user"] = $user;
          $_SESSION["senha"] = $senha;

          echo '<script>console.log'. $user . '</script>';
      
              // Verifica se a sessão do usuário está vazia
              if (empty($_SESSION["user"]) && empty($_SESSION["senha"])) {
                  exit("Usuário e/ou senha vazios");
              } elseif (($_SESSION["user"] != $usuario_) || ($_SESSION["senha"] != $senha_)) {
                  exit("Usuário ou senha não encontrado.");
              } else {
                  header("location:../Views/Home/index.php");
              }        

    }

    function Sair()
    {
        session_start();
        session_destroy();
        unset($_SESSION);
        header("location:../Views/Login/login.php");
    }

}
?>