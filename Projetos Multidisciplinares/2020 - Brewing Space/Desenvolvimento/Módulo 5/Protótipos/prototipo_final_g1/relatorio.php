<!--
    Sthéfany bv1720066
-->
<?php 
require_once('conexao/request.class.php');
$arrayRelatorio = null;

if (isset($_POST['mes']) && !empty($_POST['mes'])) {

    $conect = new Ferramentas();
    $arrayRelatorio = $conect->exDadosR($_POST['mes']);


    }
//}

 ?>
 <html>
    <head>
        <title>Brewing Space</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="css/css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <div class="container-fluid">

                    <a href="#" class="navbar-brand">
                        <img class="logo" src="img/Logo-2-Transparente.png" alt="logotipo">
                    </a>

                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="nav-principal">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Feed de notícias</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link ml-3">Receitas</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link ml-3 ">Gerenciamento</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link ml-3">Ferramentas de apoio</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link ml-3 active">Relatório</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            
                            <li class="nav-item">
                                <a href="#" class="btn text-light fas fa-sign-out-alt fa-2x"></a>
                            </li>
                        </ul>
                    </div>

                </div>               
            </nav>            
        </header>

        <section class="mt-5">
            <div class="container">
                <div clas="row">
                    <div class="col-12 mb-4">
                        <h3>
                            Relatório
                        </h3>                        
                    </div>
                </div>
                <div class="row">

                <form method="POST" action="relatorio.php">
                   <table>
                        <td>
                            <select id="mes" name="mes" class="form-control">
                                <option value="01">Janeiro</option>
                                <option value="02">Fevereiro</option>
                                <option value="03">Março</option>
                                <option value="04">Abril</option>
                                <option value="05">Maio</option>
                                <option value="06">Junho</option>
                                <option value="07">Julho</option>
                                <option value="08">Agosto</option>
                                <option value="09">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>
                            </select>
                        </td>  
                        
                        <td>
                            <button type="submit" class="btn btn-primary btn-block mb-2">Enviar</button> 
                        </td>
                        <!--<tr>
                            <td>
                                <input type="" name="personName" value="Nome Pessoa">
                            </td>
                            <td>
                                <input type="" name="planeType" value="Tipo Plano">
                            </td>
                            <td>
                                <input type="" name="planeValue" value="Valor do Plano">
                                <button type="submit" class="btn btn-primary mb-2">Adicionar</button>
                            </td>
                        </tr> -->
                        <!-- <button type="submit" class="btn btn-primary mb-2">Enviar</button> -->
                        
                    </table> 
                    
                    <script>
                        document.getElementById("mes").onchange = function(){
                        var campo_select = document.getElementById("mes");
                        var indice_selecionado = campo_select.options.selectedIndex;
                        var valor_selecionado = campo_select.options[indice_selecionado].innerHTML;
                        
                    };
                    </script>  
                </form>

                </div>
                <div class="row">
                    <table class="table table-hover text-center table-borderless">                      
                            <?php
                            if ($arrayRelatorio) {
                            ?>
                            <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">DATA</th>
                                        <th scope="col">NOME USUÁRIO</th>
                                        <th scope="col">TIPO DE PLANO</th>
                                    </tr>
                            </thead>
                        <tbody>
                            <?php
                                foreach ($arrayRelatorio as $key => $value) {

                                echo '
                                    <tr>
                                        <td>'.$value->ASU_ID.'</td>
                                        <td>'.$value->ASU_DATA_ASSINATURA.'</td>
                                        <td>'.$value->USU_NOME.'</td>
                                        <td>'.$value->PLA_NOME.'</td>
                                    </tr>
                                ';
                                }
                            }else{
                                echo "<h2>Sem dados </h2>";
                            }
                            
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
    <footer class="mt-5 ">
        <div class="container-fluid bg-dark">
            <div class="row">
                <div class="col">
                    <p class="lead text-center text-white">
                        © Copyright 4° ano de infomática do ano de 2020. Todos os Direitos Reservados.
                    </p>
                </div>
            </div>
        </div>
    </footer> 
</html>





