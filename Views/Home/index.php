<!doctype html>
<html lang="pt-br">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../wwwroot/css/homeCss.css">
  <link rel="stylesheet" type="text/css" href="../../wwwroot/css/selectCss.css">
  <title> Managence Finance</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="../../wwwroot/js/serviceAPI.js"></script>

</head>


<?php 
  session_start();

  $login = "";
  $displayCartao = "";
  $displayCartao1 = "hidden";
  
  if(isset($_SESSION["user"])){
    $login = $_SESSION["user"];
    $displayCartao = "hidden";
    $displayCartao1 = "";
  }
?>

<body>
  
  <nav class="navbar navbar-dark navbar-expand-md">
    <div class="container slideMenuTop">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Managence Finance</a>
      <div class="collapse navbar-collapse" id="Navbar">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item "><a id="slideMenuTopLink" class="nav-link" href="#divInformacoes"> Informações</a></li>
          <li class="nav-item"><a id="slideMenuTopLink" class="nav-link" href="#divSobre"> Sobre</a></li>
          <li class="nav-item"><a id="slideMenuTopLink" class="nav-link" href="#divContato"> Contato</a></li>
          <li class="nav-item" style="padding-left: 5%;" <?php echo $displayCartao ?>><a id="slideMenuTopLink" class="nav-link" href="../Login/login.php"> Entrar</a></li>
          <li class="nav-item" style="padding-left: 5%;" <?php echo $displayCartao1 ?>>
            <form method="post" class="card" action="../../Controllers/login.php">
              <input type="submit" name="sair" value="Sair" style="background-color: #FF6600; border: none; color: #e1e1e1;cursor:pointer;">
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <header id="topo" class="jumbotron jumbotronHeader">
    <div id="carouselExampleIndicators" class="carousel slide divCarrousel" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner carrouselImg">
        <div class="carousel-item active">
          <img class="d-block" src="../../wwwroot/assets/img1.jpg" alt="Primeiro Slide">
        </div>
        <div class="carousel-item">
          <img class="d-block" src="../../wwwroot/assets/img2.jpg" alt="Segundo Slide">
        </div>
        <div class="carousel-item">
          <img class="d-block" src="../../wwwroot/assets/img3.jpg" alt="Terceiro Slide">
        </div>
      </div>
      <a class="carousel-control-prev colorButtonCarrousel" href="#carouselExampleIndicators" role="button"
        data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next colorButtonCarrousel" href="#carouselExampleIndicators" role="button"
        data-slide="next">
        <span class="carousel-control-next-icon " aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
      </a>
    </div>
  </header>   
  
  <nav id="divInformacoes" class="jumbotron jumbotronBemVindo">
    <div class="bemVindo " style="width: 80%;margin:0 auto;">

      <div class="row">
        <div class="col-4 blockMenu ">
          <p><a data-toggle="tab" href="#cartoes">Cartões</a></p>
        </div>

        <div class="col-4 blockMenu">
          <p><a data-toggle="tab" href="#cambio">Câmbios</a></p>
        </div>

        <div class="col-4 blockMenu">
          <p><a data-toggle="tab" href="#simulacoes">Simulações</a></p>
        </div>

      </div>

      <div class="row" style="background-color:rgba(0,0,0,0.2);">

        <div class="tabInformacao tab-content">

          <div id="cartoes" class=" tab-pane">
            
            <div <?php echo $displayCartao ?>>
              <h3>Cartões</h3>
              <p>
                <a class="aCadastro" href="../Login/login.php">Acesse a sua conta</a>
              </p>
            </div>

            <div <?php echo $displayCartao1 ?> > 
             <h2 style="margin:0 auto; width:200px;text-align:center;">Meus Cartões</h2>

              <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#inserir">+ Adicionar Cartões</a>
                    </h4>
                  </div>
                  <div id="inserir" class="panel-collapse collapse">

                    <form method="post" action="../../Controllers/controle_cartao.php" style="display:inline-flex;">

                      <div class="form-group col-4">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                      </div>
                      <div class="form-group col-4">
                        <label for="tipo">Tipo:</label>
                        <!-- <input type="text" class="form-control" id="tipo" name="tipo"> -->
                        <select class="tipoSelect" id="tipo" name="tipo">
                          <option value="Crédito">Crédito</option>
                          <option value="Débito">Débito</option>
                          <option value="Outros">Outros</option>
                        </select>
                      </div> 
                      <div class="form-group col-4">
                        <label for="saldo">Saldo:</label>
                        <input type="number" step=".01" class="form-control" id="tipo" name="saldo" value="0,00" min='0'>
                      </div> 

                      <input type="submit" name="salvar" value="Salvar" class="submit">  
                    </form>

                  </div>
                </div>
              </div> 

              <div>
                <h2>Lista de cartoes</h2>           
                <table class="table">
                  <thead>
                    <tr>
                      <th>N*</th>
                      <th>Nome</th>
                      <th>Tipo</th>
                      <th>Saldo</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  include_once("../../Models/conexao.php");
                  $conexao=new Conexao(); 
                  $conn=$conexao->conectar();
                  
                  $consulta = $conn->query("SELECT * FROM cartao");
                  $registros=$consulta->rowCount();
                  $count = 1;
                  if($registros){
                    while ($cartao = $consulta->fetch(PDO::FETCH_ASSOC)) {
                      echo "
                        <tr><form method='post' action='../../Controllers/controle_cartao.php'>
                          <td >". $count++ . "</td>
                          <td>". $cartao['nome'] ."
                          <input type='hidden' name='nome' value='". $cartao['nome'] ."'/></td>
                          
                          <td>". $cartao['tipo'] ."
                          <input type='hidden' name='tipo' value='". $cartao['tipo'] ."'/></td>
                          
                          <td><input type='number' step='.01' name='saldo' value='". $cartao['saldo'] ."' min='0'/></td>
                          <td> 
                          <input class='btn btn-outline-primary mr-3' type='submit' name='botao_editar' value='Editar'>
                          <input class='btn btn-outline-danger' type='submit' name='botao_excluir' value='Excluir'>
                          <input type='hidden' name='id_cartao' value = '" . $cartao['id_cartao'] . "'/> </td></form>
                        </tr>
                      ";
                    }
                  } else{
                    echo "Não há";
                  }
                ?> 
                  </tbody>
                </table>
              </div>


            </div>
          </div>

          <div id="cambio" class="tab-pane in active" style="margin: 0 auto;">
            <h2 style="margin:0 auto; width:200px;text-align:center;">Câmbio</h2>
            <p>Veja a cotação da sua moeda aqui</p>

            <label>Coloque uma quantia: </label>
            <input id="valorCalculo" class="faleconosco" type="number" placeholder="Ex.: 54">
            <br><br>

            <label for="MoedaEntrada">Moeda de Entrada:</label>
            <select id="selectMoedaSaida" class="custom-select" style="width: auto;">
              <option value="BRL">Real</option>
              <option value="USD">Dólar</option>
              <option value="EUR">Euro</option>
            </select>

            <span> X </span>

            <label for="MoedaSaida">Moeda Saida:</label>
            <select id="selectMoedaEntrada" class="custom-select" style="width: auto;">
              <option value="BRL">Real</option>
              <option value="USD">Dólar</option>
              <option value="EUR">Euro</option>
            </select>

            <span class="aCalcular" onclick="CalcularMoeda()">Calcular</a></span>
            <br><br>
            <div id="moedaResultado" title="OOOOOI"></div>
          </div>

          <div id="simulacoes" class="tab-pane">
            <h2 style="margin:0 auto; width:200px;text-align:center;">Simulações</h2>
            <p>Veja as projeções aqui<?php echo ", ".$login ?></p>

            <canvas width="200" height="100" class="myChart">
            </canvas>
            <span style="color:rgba(0,0,0,0.5);"> Informações do Banco Cenrtal</span>    
          </div>
        </div>
      </div>

    </div>
  </nav>



  <nav id="divSobre" class="jumbotron ">
    <div class="container" id="sobre">
      <div class="row">
        <div class="col-10 col-md-6">
          <h1>Sobre nós</h1>
        </div>

        <div class="row" style="text-align: center;">
          <div class="col-md-3">
            <div class="thumbnail">
              <img src="../../wwwroot/assets/perfil.jpg" alt="Foto: Henrique Takahiro" style="width:100%">
              <div class="caption">
                <p>Henrique Takahiro Ito<br> RA:21290541</p>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="thumbnail">
              <img src="../../wwwroot/assets/perfil.jpg" alt="Foto: Leonardo Aparecido" style="width:100%">
              <div class="caption">
                <p>Leonardo Aparecido Batista dos Santos RA: 20590478</p>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="thumbnail">
              <img src="../../wwwroot/assets/perfil.jpg" alt="Foto: Leticia Santos" style="width:100%">
              <div class="caption">
                <p>Leticia Santos Rosa <br>RA: 21315215</p>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="thumbnail">
              <img src="../../wwwroot/assets/perfil.jpg" alt="Foto: Rodrigo Zanchetta" style="width:100%">
              <div class="caption">
                <p>Rodrigo Zanchetta <br>RA: 21338065</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </nav>

  <nav id="divContato" class="jumbotron">
    <div class="container">
      <div class="row">
        <div class="col-5 col-md-6">
          <form method="post" action="../../Controllers/formulario.php" name="form_contato">
          <h1>Fale Conosco</h1>
            
            <div class="col-4 col-md-6">
              <fieldset>

                <label for="email">Nome: </label>
                <input class="faleConosco" type="text" id="nome" name="contatoNome" placeholder="Ex.: Norberto" required>
                <br><br>

                <label for="email">Email: </label>
                <input class="faleConosco" onblur="validacaoEmail()" type="email" id="contatoEmail" name="contatoEmail"
                  placeholder="Ex.: Norberto@email.com" required>
                <div id="msgemail"></div>
                <br><br>

                <label for="info">
                  <h3>Comentários</h3>
                </label>
                <textarea class="comentario" name="contatoMsg" id="info" rows="2" cols="80"
                  placeholder="Ex.: Norberto@email.com">
                              </textarea>
              </fieldset>
              <br>
              <input type="submit" name="enviar" value="Enviar" style="background-color: #FF6600; border: none; color: #e1e1e1;cursor:pointer;">
              <!-- <span class="aCalcular" >Enviar</a></span> -->
            </div>

          </form>
        </div>
      </div>
    </div>
  </nav>

  <footer class="navbar navbar-dark navbar-expand-md"
    style="background-color:rgb(255, 102, 0);color:white;width: 100%; height: 10%;position: relative;">
    <p style="float: left;">Managence Finance </p>
    <p> - Todos os direitos negociáveis</p>
  </footer>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script src="../../wwwroot/js/inicio.js"> </script>

</body>

</html>
