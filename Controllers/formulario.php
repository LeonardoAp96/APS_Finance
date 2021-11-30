<?php

  include_once("../Models/conexao.php");

  $conexao=new Conexao(); 
  $conn=$conexao->conectar();

  //Variáveis

  $nome = $_POST['contatoNome'];
  $email = $_POST['contatoEmail'];
  $contatoMsg = $_POST['contatoMsg'];
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

  $arquivo = "
  <style type='text/css'>
    body {
      margin:0px;
      font-family:Verdane;
      font-size:12px;
      color: #666666;
    }
    a{
      color: #666666;
      text-decoration: none;
    }
    a:hover {
      color: #FF0000;
      text-decoration: none;
    }
    .aVoltar{
      position: absolute;
      background-color: #FF6600;
      color: white;
      padding: 14px 25px;
      margin: 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
    }
  </style>
  <html>
      <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
        <tr>
            <td>
                <tr>
                    <td width='500'>Nome:$nome</td>
                </tr>
                <tr>
                    <td width='320'>E-mail:<b>$email</b></td>
                </tr>
                <tr>
                    <td width='320'>Mensagem:$contatoMsg</td>
                </tr>
            </td>
        </tr>
        <tr>
          <td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
        </tr>
      </table>
  </html>
  <br><br><br>
  <a class='aVoltar' href='../Views/Home/index.php'>Voltar</a>
  ";

  $emailenviar = "laps020996@hotmail.com";
  $destino = $emailenviar;
  $assunto = "Contato pelo Site";

  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: $nome <$email>';

  echo $arquivo;

  try {
      $stmt = $conn->prepare("INSERT INTO formulario (nome, email,contatoMsg,data_envio,hora_envio) VALUES(:nome, :email, :contatoMsg, :data_envio, :hora_envio)");
      $stmt->execute(array(
          ":nome" => "$nome", ":email" => "$email", ":contatoMsg" => "$contatoMsg", 
          ":data_envio" => "$data_envio", ":hora_envio" => "$hora_envio"
      ));
      echo "<script>alert('Formulario cadastrado com sucesso!');
      </script>";
  } catch (PDOException $e) {
      echo "Erro ao inserir" . $e->getMessage();
  }
// window.location = '../Views/Home/index.php';
?>