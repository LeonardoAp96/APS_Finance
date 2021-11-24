<?php
class Conexao
{
    function conectar()
    {
        try {
            /*Um objeto do tipo PDO é criado, passando por 
            parâmetro as informações de acesso ao BD*/
            $conn = new PDO("mysql:host=localhost;dbname=finance","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "<p style='font-size:20px;color:blue;'>Conexão com banco realizada com sucesso!</p>";
            return $conn;
        } catch (PDOException $e) { 
            echo "Error<br>".$e->getMessage();
        } 
    }
}