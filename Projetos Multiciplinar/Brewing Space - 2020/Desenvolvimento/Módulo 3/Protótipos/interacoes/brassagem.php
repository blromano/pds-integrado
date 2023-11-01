<?php
session_start();
require_once('conexao/request.class.php');

$ID_USUARIO = $_SESSION['USU_ID'];
$usuario = new usuarios();
$id_cerveja = $_GET['id'];
brassagem($brassagemVolumeInicial,$brassagemTempo,$brassagemVoulmeLavagem,$brassagemTemperaturaLavagem,$brassagemTemperaturaBrassagem,$brassagemTemperaturaInicial,$brassagemObservacoes,$brassagemIodo1,$brassagemIodo2,$brassagemIodo3,$brassagemIodo4,$brassagemIodo5)
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Brewing Space</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="includes/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="includes/css/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <div class="container-fluid">
                    
                    <a href="#" class="navbar-brand">
                        <img class="logo" src="includes/img/Logo-2-Transparente.png">
                    </a>
                    
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="nav-principal">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="processoCriado.html" class="nav-link active">Gerenciamento da receita</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">BRASSAGEM</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>               
            </nav>            
        </header>
 
        <section class="my-5">
            <table class="table table-bordered align-self-center">
                <thead>
                    <tr>
                    <th scope="col">Processo de Brassagem:</th>
                  </tr>
                  </thead>
                <tbody>
                  <tr>
                    <td>Volume H2O inicial (Litros)</td>
                    <td>Tempo da Brassagem (Minutos)</td>
                    <td>Volume de H2O para Lavagem (Litros)</td>
                    <td>Temperatura Inicial(°C)</td>
                    <td>Temperatura da brassagem (°C)</td>
                    <td>Temp. H2O para lavagem (°C)</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td><input type="number"  id="volumeInicial" name="volumeInicial"></td>
                    <td><input type="number"  id="tempoBrassagem" name="tempoBrassagem"></td>
                    <td><input type="number"  id="volumeLavagem" name="volumeLavagem"></td>
                    <td><input type="number"  id="temperaturaInicial" name="temperaturaInicial"></td>
                    <td><input type="number"  id="temperaturaBrassagem" name="temperaturaBrassagem"></td>
                    <td><input type="number"  id="temperaturaLavagem" name="temperaturaLavagem"></td>
                  </tr>
                </tbody>
              </table>
            <table class="table table-bordered align-self-center">
                <thead>
                    <tr>
                    <th scope="col">Teste do Iodo (0 a 5*):</th>
                  </tr>
                  </thead>
                <tbody>
                  <tr>
                    <td>10 minutos:</td>
                    <td><input type="number"></td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>30 minutos</td>
                    <td><input type="number"></td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>45 minutos</td>
                    <td><input type="number"></td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>60 minutos</td>
                    <td><input type="number"></td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>90 minutos</td>
                    <td><input type="number"></td>
                  </tr>
                </tbody>
              </table>
            <table class="table table-bordered align-self-center">
                <thead>
                    <tr>
                    <th scope="col">Dicas e Observações:</th>
                  </tr>
                  </thead>
                <tbody>
                  <tr>
                    <td><textarea></textarea></td>
                  </tr>
                </tbody>
                <tbody>
                </tbody>
              </table>
              <button type="submit" class="btn btn-secondary">Entrar</button>
        </section>        
        <figre></figre>
        <footer class="mt-5">
            <div class="container-fluid bg-dark">
                <div class="row">
                    <div class="col">
                        <p class="lead text-center text-white">
                            © Copyright 4° ano de infomática do ano de 2020. Todos os Direitos Reservados.
                            <img src="includes/img/cerveja.png" height="512" width="512"/></p>
                    </div>
                </div>
            </div>
        </footer>        
    </body>
</html>
