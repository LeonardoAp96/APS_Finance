<?php
class CartaoDAO{

    function inserir($nome, $tipo, $saldo, $conn)
    {
        try {
            $stmt = $conn->prepare("INSERT INTO cartao (nome, tipo,saldo) VALUES(:nome, :tipo, :saldo)");
            $stmt->execute(array(
                ":nome" => "$nome", ":tipo" => "$tipo", ":saldo" => "$saldo"
            ));
            echo "<script>alert('Cadastrado com sucesso!');
            window.location = '../Views/Home/index.php';
            </script>";
        } catch (PDOException $e) {
            echo "Erro ao inserir" . $e->getMessage();
        }
    }

    function listar($conn)
    {
        $consulta = $conn->query("SELECT * FROM cartao");
        echo " <!doctype html>";
        echo "<html lang='pt-br'>";
        echo "<head>";
        echo " <meta charset='utf-8'>";
        echo " <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>";
        echo "<title>Cartoes</title>";
        echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css'>";
        echo "</head>";
        echo "<body class='container'>";
        $registros=$consulta->rowCount();
        if($registros){
         echo "<h2>Lista de Cartoes</h2>";
         echo "<table class='table table-striped mt-3'>";
         echo "<tr>
          <th>Id</th>
          <th>Nome</th>
          <th>Tipo</th>
          <th>Saldo</th>
          <th>Ações</th>
          </tr>";
         while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $linha["id"] . "</td>";
            echo "<td>" . $linha["nome"] . "</td>";
            echo "<td>" . $linha["tipo"] . "</td>";
            echo "<td>" . $linha["saldo"] . "</td>";
            echo "<td> <form method='post' action='../controle/controle_cartao.php'> "
                . "<input class='btn btn-outline-primary mr-3' type='submit' name='botao_editar' value='Editar'>"
                . "<input class='btn btn-outline-danger' type='submit' name='botao_excluir' value='Excluir'>"
                . " <input type='hidden' name='id_excluir' value = '" . $linha["id"] . "'/></form> </td>";
            echo "</tr>";
         }
         echo " </table>";
         echo "<form action='../controle/controle_cartao.php' method='POST'>";
         echo "<div class='form-group form-check-inline'>";
         echo "<div class='col'>";
         echo "<a href='../Home/index.php' class='btn btn-success mr-3' role='button' aria-pressed='true'>Novo cartao</a>";
         echo "</div></div></form>";
         echo "</body></html>";
      }else{
          echo "<p style='font-size:28px; color:red'>Não há registros!<p>";
          echo "<a href='../Home/consulta.php' class='btn btn-danger'>Voltar</a>";
      }
    }

    function excluir($id,$conn)
    {
       try { 
        $delete =  $conn->prepare("DELETE FROM cartao WHERE id_cartao = $id");
        $delete->execute();
        echo "<script>alert('" .$delete->rowCount() .
             " Usuário deletado com sucesso!');" .
             " window.location = '../Views/Home/index.php';</script>";
          } catch (PDOException $e) {
              echo "Erro ao remover registro. <br>" . $e->getMessage();
          }
      }
}
?>