<?php
class CartaoDAO{

    function inserir($nome, $tipo, $saldo, $conn)
    {
        try {
            $stmt = $conn->prepare("INSERT INTO cartao (nome, tipo,saldo) VALUES(:nome, :tipo, :saldo)");
            $stmt->execute(array(
                ":nome" => "$nome", ":tipo" => "$tipo", ":saldo" => "$saldo"
            ));
            echo "<script>alert('Cartão cadastrado com sucesso!');
            window.location = '../Views/Home/index.php';
            </script>";
        } catch (PDOException $e) {
            echo "Erro ao inserir" . $e->getMessage();
        }
    }

    function excluir($id,$conn)
    {
       try { 
        $delete =  $conn->prepare("DELETE FROM cartao WHERE id_cartao = $id");
        $delete->execute();
        echo "<script>alert('" .$delete->rowCount() .
             " Cartão deletado com sucesso!');" .
             " window.location = '../Views/Home/index.php';</script>";
          } catch (PDOException $e) {
              echo "Erro ao remover registro. <br>" . $e->getMessage();
          }
    }

    function Editar($id, $nome, $tipo, $saldo, $conn)
    {
        try {
            $editar = $conn->query("UPDATE cartao SET nome ='$nome', tipo='$tipo',saldo ='$saldo' WHERE id_cartao = $id");
            $editar->execute();
            echo "<script>alert('Alterado com sucesso!');".
            " window.location = '../Views/Home/index.php';</script>";
        } catch (PDOException $e) {
            echo "Erro ao atualizar: " . $e->getMessage();
        }
    }
}
?>