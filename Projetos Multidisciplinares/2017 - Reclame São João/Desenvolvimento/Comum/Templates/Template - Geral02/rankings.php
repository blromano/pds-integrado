<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reclame São João</title>
  <!-- Custom styling plus plugins -->
  <!--sidebar-->
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <!--sidebar-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/testes.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <!--link do slidshow testemunho-->
  <!-- <link rel="stylesheet" href="css/w3.css"> -->
  <!--fim do link do slidshow testemunho-->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
  <link rel="shortcut icon" href="images/favicon.ico">

  <!-- TESTE DE CSS -->
  <link  rel="stylesheet" href="css/mod04/sidebar.css">
  <link  rel="stylesheet" href="css/mod04/chartSize.css">
  <link href="css/mod04/tabelas.css" rel="stylesheet">

  <script src="/js/jquery.min.js"></script>

  <!-- <script src="/js/mod04/highcharts.js"></script> -->
  <link rel="stylesheet" href="/css/highcharts.css" />
  <script src="/js/mod04/highstock.js"></script>
  <!-- <script src="/js/mod04/exporting.js"></script> -->
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>


</head>
<!--/head-->

<body class="nav-md">
  <?php 
  //include_once '/MVC/controle/Conexao.php';
  //include_once '/MVC/controle/EstabelecimentosDAO.php';
  //include_once '/MVC/modelo/Estabelecimentos.php';
  //$conexao = new Conexao();
  //$estDAO = new EstabelecimentosDAO();
  //$est = new Estabelecimentos();


  ?>

  <!--.preloader-->
  <!-- <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div> -->
  <!--/.preloader-->

  <header id="home">

    <!--/#home-slider-->
    <div class="main-nav navbar-fixed-top" style="z-index: 10">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="index.html">
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
          </a> </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="scroll active"><a href="#contact">Contato</a></li>
              <li class="scroll"><a href="index.html">Home</a></li>
              <li class="scroll"><a href="sobrenos.html">Sobre Nós</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!--/#main-nav-->
    </header>
    <!--/#home-->

    <!-- CONTEUDO PRINCIPAL DA PAGINA -->


    <!--nav sidebar -->
    <aside>
      <nav class="navbar navbar-inverse sidebar navbar-fixed-top" role="navigation">

        <div class="nav-side-menu">
          <div class="brand">Rankings e Relatórios</div>
          <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

          <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">


              <li data-toggle="collapse" data-target="#service" class="collapsed">
                <a href="#"><i class="fa fa-caret-down fa-lg"></i> Rankings <i class="fa fa-bar-chart-o fa-lg btn pull-right" style="margin-top:5px; margin-right:4px;"></i></a>
              </li>
              <ul class="sub-menu collapse" id="service">
                <li id="r1">Ranking completo dos estabelecimentos</li>
                <li id="r2">Problemas solucionados</li>
                <li id="r3">Número de reclamações nos últimos tempos</li>
                <li id="r4">Estabelecimentos tendenciosos</li>
              </ul>



              <li data-toggle="collapse" data-target="#new" class="collapsed">
                <a href="#"><i class="fa fa-caret-down fa-lg"></i> Relatórios <i class="fa fa-file-text fa-lg btn pull-right" style="margin-top:5px; margin-right:2px;"></i></a>
              </li>
              <ul class="sub-menu collapse" id="new">
                <li id="t1">Feedback das reuniões</li>
                <li id="t2">Relatório tabular das avaliações</li>
                <li id="t3">Reclamação das últimas semanas</li>
              </ul>
              <li  data-target="#new" class="collapsed">
                <a href="#" id="c1"><i class="fa fa-caret-right fa-lg"></i> Comparção entre duas empresas <i class="fa fa-line-chart fa-lg btn pull-right" style="margin-top:5px; margin-right:2px;"></i></a>
              </li>
              <li  data-target="#new" id="empresaLogada" style="display:none">
                <a href="#" class="hideAll" id="f1"><i class="fa fa-caret-right fa-lg"></i> Registrar feedback<i class="fa fa-comment fa-lg btn pull-right" style="margin-top:5px; margin-right:2px;"></i></a>
              </li>
              <li  data-target="#new" class="collapsed">
                <a href="#" class="hideAll" id="l1"><i class="fa fa-caret-right fa-lg"></i> Logar como empresa <i class="fa fa-user fa-lg btn pull-right" style="margin-top:5px; margin-right:2px;"></i></a>
              </li>

                    <!-- <li>
                  <a href="#">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>

                 <li>
                  <a href="#">
                  <i class="fa fa-users fa-lg"></i> Users
                  </a>
                </li> -->
              </ul>
            </div>
          </div>
        </nav>

      </aside>


      <!-- INSERIR CONTEUDO AQUI -->
      <!-- INSERIR CONTEUDO AQUI -->
      <!-- INSERIR CONTEUDO AQUI -->
      <!-- INSERIR CONTEUDO AQUI -->
      <!-- INSERIR CONTEUDO AQUI -->
      <!-- INSERIR CONTEUDO AQUI -->
      <!-- INSERIR CONTEUDO AQUI -->
      <section class="Rankings">

       <div class='container'>

        <div class='row '>



          <div id="graficoResponsivo">

            <div id="formulario" style="display:none">
              <h2>Registrar Feedback</h2>
              <form id="main-contact-form" name="contact-form" method="post" action="#" style="border: 1px solid white; padding: 30px; 30px 0px;">
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6" style="padding-left: 20px; width: 99%">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="Estabelecimento" required="required">
                    </div>
                  </div>

                </div>
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6" style="padding-left: 20px; width: 99%;">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="Feedback" required="required">
                    </div>
                  </div>
                </div>
                <div class="form-group" style="margin-bottom: 0px; margin-left: -2%; margin-right: -2%;">
                  <button style="margin-top: 0px; "type="submit" class="btn-submit2">Enviar</button>
                </div>
              </form>
            </div>

            <!-- <button class="hideAll">hideAll</button> -->


            <!-- PROBLEMAS SOLUCIONADOS -->
            <!-- <canvas id="ranking2" width = 400 height = 400></canvas> -->
            <!-- <div class="row"> -->
            <style type="text/css">
              #respGraph {


              }

            </style>


            <!-- Falha no carregamento do <script> com a fonte “https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js”.  rankings.php:7561 -->
            <!-- Falha no carregamento do <script> com a fonte “https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js”.  rankings.php:7565 -->
            <!-- Falha no carregamento do <script> com a fonte “https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js”.  rankings.php:7566 -->
            <!-- Falha no carregamento do <script> com a fonte “https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js”. -->
            <div id="campo">

              <h3 style="text-align: center">Pesquisa por estabelecimento:</h3>

              <div class="form-group col-md-6 col-md-offset-3">
                <input type="text" class="form-control" id="busca" placeholder="Insira o nome do estabelecimento">
              </br>

            </div>
 
          </div>
          <!-- </div> -->


          <div id="ranking2" style="min-width: 230px; max-width: 800px"></div>

          <!-- FIM PROBLEMAS SOLUCIONADOS-->


          <!-- NÚMERO DE RECLAMAÇÕES NOS ÚLTIMOS TEMPOS -->


          <div id="ranking3" style="min-width: 230px; max-width: 800px"></div>

          <!-- FIM RECLAMAÇÕES ULTIMOS TEMPOS -->

          <!-- RANKING COMPLETO DOS ESTABELECIMENTOS -->
          <div id="ranking1">
            <?php 
            include_once "MVC/controle/Conexao.php";
            $con = new Conexao(); 
            include_once "MVC/controle/ReclamacoesDAO.php";
            include_once "MVC/controle/EstabelecimentosDAO.php";
            include_once "MVC/modelo/Estabelecimentos.php";
            include_once "MVC/modelo/Reclamacoes.php";
            include_once "MVC/modelo/Tipo_Estabelecimentos.php";
            include_once "MVC/controle/Tipo_EstabelecimentosDAO.php";
            $est = new Estabelecimentos();
            $estDAO = new EstabelecimentosDAO();
            $tesDAO = new Tipo_EstabelecimentosDAO();
            $tes = new Tipo_Estabelecimentos();
            $varEst = $estDAO->listarTodos();
            $tamanhoEst = count($varEst);

            ?>
            <h2>Ranking completo dos estabelecimentos</h2>
            <table class="table relatorioTabular table-striped table-hover responsive" style="width: 100%">
              <thead> 
                <tr>
                  <th> ID </th>
                  <th> Estabelecimentos </th>
                  <th> Categoria </th>
                  <th> Pontuação</th>           
                </tr>
              </thead>
              <tbody>
                <?php $numero=1; ?>
                <?php foreach($varEst as $linha) { ?>
                <tr>
                  <?php $tes=$tesDAO->pesquisarPorId($numero);?>
                  <td><?php echo $linha['EST_ID'];?></td>                     
                  <td><?php echo $linha['EST_NOME_FANTASIA'];?></td>                     
                  <td><?php foreach($tes as $lia) {
                    echo $lia['TES_CATEGORIA'];
                  } ?></td>   
                  <td><?php echo $linha['EST_MEDIA_RECLAMACAO'];?></td>                
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- FIM RANKING ESTABELECIMENTOS -->

          <!-- ESTABELECIMENTOS TENDENCIOSOS -->
          <div id="ranking4">
            <h2>Estabelecimentos Tendenciosos</h2>
            <table class="table relatorioTabular table-striped table-hover responsive" style="width: 100%">
              <thead>
                <tr>
                  <th></th>
                  <th>Estabelecimento</th>
                  <th>Categoria</th>
                  <th>Pontuação</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Tuca Semi Joias</td>
                  <td>Acessórios</td>
                  <td>97.8</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Chiquinho Sorvetes</td>
                  <td>Sorveteria</td>
                  <td>90.3</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Espaço Girl</td>
                  <td>Vestuário</td>
                  <td>89.9</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Açaí Mania</td>
                  <td>Sorveteria</td>
                  <td>89.3</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Actual</td>
                  <td>Vestuário</td>
                  <td>89.4</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Cacau Brasil</td>
                  <td>Chocolateria</td>
                  <td>87.1</td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Óticas Carol</td>
                  <td>Acessórios</td>
                  <td>86.2</td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Pernambucanas</td>
                  <td>Vestuário</td>
                  <td>80.9</td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Açougue Sinhá</td>
                  <td>Alimentos</td>
                  <td>77.8</td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Sandrini</td>
                  <td>Vestuário</td>
                  <td>75.3</td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>Lojão Pague 10</td>
                  <td>Vestuário</td>
                  <td>7.8</td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>Malu Presentes</td>
                  <td>Acessórios</td>
                  <td>9.3</td>
                </tr>
                <tr>
                  <td>13</td>
                  <td>Big Jhonny</td>
                  <td>Restaurante</td>
                  <td>10.1</td>
                </tr>
                <tr>
                  <td>14</td>
                  <td>Mamuska</td>
                  <td>Vestuário</td>
                  <td>12.9</td>
                </tr>
                <tr>
                  <td>15</td>
                  <td>Toque Final</td>
                  <td>Vestuário</td>
                  <td>15.7</td>
                </tr>
                <tr>
                  <td>16</td>
                  <td>Casas Bahia</td>
                  <td>Loja</td>
                  <td>17.3</td>
                </tr>
                <tr>
                  <td>17</td>
                  <td>BVCI</td>
                  <td>Internet</td>
                  <td>21.6</td>
                </tr>
                <tr>
                  <td>18</td>
                  <td>CVC</td>
                  <td>Viagens</td>
                  <td>23.9</td>
                </tr>
                <tr>
                  <td>19</td>
                  <td>Cacau Show</td>
                  <td>Chocolateria</td>
                  <td>27.8</td>
                </tr>
                <tr>
                  <td>20</td>
                  <td>Droga Raia</td>
                  <td>Drogaria</td>
                  <td>30.3</td>
                </tr>
                <tr>
                  <td>21</td>
                  <td>Tuca Semi Joias</td>
                  <td>Acessórios</td>
                  <td>97.8</td>
                </tr>
                <tr>
                  <td>22</td>
                  <td>Chiquinho Sorvetes</td>
                  <td>Sorveteria</td>
                  <td>90.3</td>
                </tr>
                <tr>
                  <td>23</td>
                  <td>Espaço Girl</td>
                  <td>Vestuário</td>
                  <td>89.9</td>
                </tr>
                <tr>
                  <td>24</td>
                  <td>Açaí Mania</td>
                  <td>Sorveteria</td>
                  <td>89.3</td>
                </tr>
                <tr>
                  <td>25</td>
                  <td>Actual</td>
                  <td>Vestuário</td>
                  <td>89.4</td>
                </tr>
                <tr>
                  <td>26</td>
                  <td>Tuca Semi Joias</td>
                  <td>Acessórios</td>
                  <td>97.8</td>
                </tr>
                <tr>
                  <td>27</td>
                  <td>Chiquinho Sorvetes</td>
                  <td>Sorveteria</td>
                  <td>90.3</td>
                </tr>
                <tr>
                  <td>28</td>
                  <td>Espaço Girl</td>
                  <td>Vestuário</td>
                  <td>89.9</td>
                </tr>
                <tr>
                  <td>29</td>
                  <td>Açaí Mania</td>
                  <td>Sorveteria</td>
                  <td>89.3</td>
                </tr>
                <tr>
                  <td>30</td>
                  <td>Actual</td>
                  <td>Vestuário</td>
                  <td>89.4</td>
                </tr>
                <tr>
                  <td>31</td>
                  <td>Cacau Brasil</td>
                  <td>Chocolateria</td>
                  <td>87.1</td>
                </tr>
                <tr>
                  <td>32</td>
                  <td>Óticas Carol</td>
                  <td>Acessórios</td>
                  <td>86.2</td>
                </tr>
                <tr>
                  <td>33</td>
                  <td>Pernambucanas</td>
                  <td>Vestuário</td>
                  <td>80.9</td>
                </tr>
                <tr>
                  <td>34</td>
                  <td>Açougue Sinhá</td>
                  <td>Alimentos</td>
                  <td>77.8</td>
                </tr>
                <tr>
                  <td>35</td>
                  <td>Sandrini</td>
                  <td>Vestuário</td>
                  <td>75.3</td>
                </tr>
                <tr>
                  <td>36</td>
                  <td>Lojão Pague 10</td>
                  <td>Vestuário</td>
                  <td>7.8</td>
                </tr>
                <tr>
                  <td>37</td>
                  <td>Malu Presentes</td>
                  <td>Acessórios</td>
                  <td>9.3</td>
                </tr>
                <tr>
                  <td>38</td>
                  <td>Big Jhonny</td>
                  <td>Restaurante</td>
                  <td>10.1</td>
                </tr>
                <tr>
                  <td>39</td>
                  <td>Mamuska</td>
                  <td>Vestuário</td>
                  <td>12.9</td>
                </tr>
                <tr>
                  <td>40</td>
                  <td>Toque Final</td>
                  <td>Vestuário</td>
                  <td>15.7</td>
                </tr>
                <tr>
                  <td>41</td>
                  <td>Casas Bahia</td>
                  <td>Loja</td>
                  <td>17.3</td>
                </tr>
                <tr>
                  <td>42</td>
                  <td>BVCI</td>
                  <td>Internet</td>
                  <td>21.6</td>
                </tr>
                <tr>
                  <td>43</td>
                  <td>CVC</td>
                  <td>Viagens</td>
                  <td>23.9</td>
                </tr>
                <tr>
                  <td>44</td>
                  <td>Cacau Show</td>
                  <td>Chocolateria</td>
                  <td>27.8</td>
                </tr>
                <tr>
                  <td>45</td>
                  <td>Droga Raia</td>
                  <td>Drogaria</td>
                  <td>30.3</td>
                </tr>
                <tr>
                  <td>46</td>
                  <td>Tuca Semi Joias</td>
                  <td>Acessórios</td>
                  <td>97.8</td>
                </tr>
                <tr>
                  <td>47</td>
                  <td>Chiquinho Sorvetes</td>
                  <td>Sorveteria</td>
                  <td>90.3</td>
                </tr>
                <tr>
                  <td>48</td>
                  <td>Espaço Girl</td>
                  <td>Vestuário</td>
                  <td>89.9</td>
                </tr>
                <tr>
                  <td>49</td>
                  <td>Açaí Mania</td>
                  <td>Sorveteria</td>
                  <td>89.3</td>
                </tr>
                <tr>
                  <td>50</td>
                  <td>Actual</td>
                  <td>Vestuário</td>
                  <td>89.4</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- FIM ESTABELECIMENTOS TENDENCIOSOS -->


          <!-- FEEDBACK DAS REUNIÕES -->
          <div id="tabela1">
            <h2>Feedback das Reuniões</h2>
            <table class="table relatorioTabular table-striped table-hover responsive" style="width: 100%">
              <thead>
                <tr>
                  <th></th>
                  <th>Estabelecimento</th>
                  <th>Categoria</th>
                  <th>Pontuação</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Tuca Semi Joias</td>
                  <td>Acessórios</td>
                  <td>97.8</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Chiquinho Sorvetes</td>
                  <td>Sorveteria</td>
                  <td>90.3</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Espaço Girl</td>
                  <td>Vestuário</td>
                  <td>89.9</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Açaí Mania</td>
                  <td>Sorveteria</td>
                  <td>89.3</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Actual</td>
                  <td>Vestuário</td>
                  <td>89.4</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Cacau Brasil</td>
                  <td>Chocolateria</td>
                  <td>87.1</td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Óticas Carol</td>
                  <td>Acessórios</td>
                  <td>86.2</td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Pernambucanas</td>
                  <td>Vestuário</td>
                  <td>80.9</td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Açougue Sinhá</td>
                  <td>Alimentos</td>
                  <td>77.8</td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Sandrini</td>
                  <td>Vestuário</td>
                  <td>75.3</td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>Lojão Pague 10</td>
                  <td>Vestuário</td>
                  <td>7.8</td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>Malu Presentes</td>
                  <td>Acessórios</td>
                  <td>9.3</td>
                </tr>
                <tr>
                  <td>13</td>
                  <td>Big Jhonny</td>
                  <td>Restaurante</td>
                  <td>10.1</td>
                </tr>
                <tr>
                  <td>14</td>
                  <td>Mamuska</td>
                  <td>Vestuário</td>
                  <td>12.9</td>
                </tr>
                <tr>
                  <td>15</td>
                  <td>Toque Final</td>
                  <td>Vestuário</td>
                  <td>15.7</td>
                </tr>
                <tr>
                  <td>16</td>
                  <td>Casas Bahia</td>
                  <td>Loja</td>
                  <td>17.3</td>
                </tr>
                <tr>
                  <td>17</td>
                  <td>BVCI</td>
                  <td>Internet</td>
                  <td>21.6</td>
                </tr>
                <tr>
                  <td>18</td>
                  <td>CVC</td>
                  <td>Viagens</td>
                  <td>23.9</td>
                </tr>
                <tr>
                  <td>19</td>
                  <td>Cacau Show</td>
                  <td>Chocolateria</td>
                  <td>27.8</td>
                </tr>
                <tr>
                  <td>20</td>
                  <td>Droga Raia</td>
                  <td>Drogaria</td>
                  <td>30.3</td>
                </tr>
                <tr>
                  <td>21</td>
                  <td>Tuca Semi Joias</td>
                  <td>Acessórios</td>
                  <td>97.8</td>
                </tr>
                <tr>
                  <td>22</td>
                  <td>Chiquinho Sorvetes</td>
                  <td>Sorveteria</td>
                  <td>90.3</td>
                </tr>
                <tr>
                  <td>23</td>
                  <td>Espaço Girl</td>
                  <td>Vestuário</td>
                  <td>89.9</td>
                </tr>
                <tr>
                  <td>24</td>
                  <td>Açaí Mania</td>
                  <td>Sorveteria</td>
                  <td>89.3</td>
                </tr>
                <tr>
                  <td>25</td>
                  <td>Actual</td>
                  <td>Vestuário</td>
                  <td>89.4</td>
                </tr>
                <tr>
                  <td>26</td>
                  <td>Tuca Semi Joias</td>
                  <td>Acessórios</td>
                  <td>97.8</td>
                </tr>
                <tr>
                  <td>27</td>
                  <td>Chiquinho Sorvetes</td>
                  <td>Sorveteria</td>
                  <td>90.3</td>
                </tr>
                <tr>
                  <td>28</td>
                  <td>Espaço Girl</td>
                  <td>Vestuário</td>
                  <td>89.9</td>
                </tr>
                <tr>
                  <td>29</td>
                  <td>Açaí Mania</td>
                  <td>Sorveteria</td>
                  <td>89.3</td>
                </tr>
                <tr>
                  <td>30</td>
                  <td>Actual</td>
                  <td>Vestuário</td>
                  <td>89.4</td>
                </tr>
                <tr>
                  <td>31</td>
                  <td>Cacau Brasil</td>
                  <td>Chocolateria</td>
                  <td>87.1</td>
                </tr>
                <tr>
                  <td>32</td>
                  <td>Óticas Carol</td>
                  <td>Acessórios</td>
                  <td>86.2</td>
                </tr>
                <tr>
                  <td>33</td>
                  <td>Pernambucanas</td>
                  <td>Vestuário</td>
                  <td>80.9</td>
                </tr>
                <tr>
                  <td>34</td>
                  <td>Açougue Sinhá</td>
                  <td>Alimentos</td>
                  <td>77.8</td>
                </tr>
                <tr>
                  <td>35</td>
                  <td>Sandrini</td>
                  <td>Vestuário</td>
                  <td>75.3</td>
                </tr>
                <tr>
                  <td>36</td>
                  <td>Lojão Pague 10</td>
                  <td>Vestuário</td>
                  <td>7.8</td>
                </tr>
                <tr>
                  <td>37</td>
                  <td>Malu Presentes</td>
                  <td>Acessórios</td>
                  <td>9.3</td>
                </tr>
                <tr>
                  <td>38</td>
                  <td>Big Jhonny</td>
                  <td>Restaurante</td>
                  <td>10.1</td>
                </tr>
                <tr>
                  <td>39</td>
                  <td>Mamuska</td>
                  <td>Vestuário</td>
                  <td>12.9</td>
                </tr>
                <tr>
                  <td>40</td>
                  <td>Toque Final</td>
                  <td>Vestuário</td>
                  <td>15.7</td>
                </tr>
                <tr>
                  <td>41</td>
                  <td>Casas Bahia</td>
                  <td>Loja</td>
                  <td>17.3</td>
                </tr>
                <tr>
                  <td>42</td>
                  <td>BVCI</td>
                  <td>Internet</td>
                  <td>21.6</td>
                </tr>
                <tr>
                  <td>43</td>
                  <td>CVC</td>
                  <td>Viagens</td>
                  <td>23.9</td>
                </tr>
                <tr>
                  <td>44</td>
                  <td>Cacau Show</td>
                  <td>Chocolateria</td>
                  <td>27.8</td>
                </tr>
                <tr>
                  <td>45</td>
                  <td>Droga Raia</td>
                  <td>Drogaria</td>
                  <td>30.3</td>
                </tr>
                <tr>
                  <td>46</td>
                  <td>Tuca Semi Joias</td>
                  <td>Acessórios</td>
                  <td>97.8</td>
                </tr>
                <tr>
                  <td>47</td>
                  <td>Chiquinho Sorvetes</td>
                  <td>Sorveteria</td>
                  <td>90.3</td>
                </tr>
                <tr>
                  <td>48</td>
                  <td>Espaço Girl</td>
                  <td>Vestuário</td>
                  <td>89.9</td>
                </tr>
                <tr>
                  <td>49</td>
                  <td>Açaí Mania</td>
                  <td>Sorveteria</td>
                  <td>89.3</td>
                </tr>
                <tr>
                  <td>50</td>
                  <td>Actual</td>
                  <td>Vestuário</td>
                  <td>89.4</td>
                </tr>
              </tbody>
            </table>
          </div>




          <!-- FIM FEEDBACK -->


          <!-- AVALIAÇÕES -->
          <div id="tabela2">
            <h2>Relatório Tabular das Avaliações</h2>
            <table class="table relatorioTabular table-striped table-hover responsive" style="width: 100%">
              <thead>
                <tr>
                  <th></th>
                  <th>Estabelecimento</th>
                  <th>Categoria</th>
                  <th>Pontuação</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Tuca Semi Joias</td>
                  <td>Acessórios</td>
                  <td>97.8</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Chiquinho Sorvetes</td>
                  <td>Sorveteria</td>
                  <td>90.3</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Espaço Girl</td>
                  <td>Vestuário</td>
                  <td>89.9</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Açaí Mania</td>
                  <td>Sorveteria</td>
                  <td>89.3</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Actual</td>
                  <td>Vestuário</td>
                  <td>89.4</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Cacau Brasil</td>
                  <td>Chocolateria</td>
                  <td>87.1</td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Óticas Carol</td>
                  <td>Acessórios</td>
                  <td>86.2</td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Pernambucanas</td>
                  <td>Vestuário</td>
                  <td>80.9</td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Açougue Sinhá</td>
                  <td>Alimentos</td>
                  <td>77.8</td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Sandrini</td>
                  <td>Vestuário</td>
                  <td>75.3</td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>Lojão Pague 10</td>
                  <td>Vestuário</td>
                  <td>7.8</td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>Malu Presentes</td>
                  <td>Acessórios</td>
                  <td>9.3</td>
                </tr>
                <tr>
                  <td>13</td>
                  <td>Big Jhonny</td>
                  <td>Restaurante</td>
                  <td>10.1</td>
                </tr>
                <tr>
                  <td>14</td>
                  <td>Mamuska</td>
                  <td>Vestuário</td>
                  <td>12.9</td>
                </tr>
                <tr>
                  <td>15</td>
                  <td>Toque Final</td>
                  <td>Vestuário</td>
                  <td>15.7</td>
                </tr>
                <tr>
                  <td>16</td>
                  <td>Casas Bahia</td>
                  <td>Loja</td>
                  <td>17.3</td>
                </tr>
                <tr>
                  <td>17</td>
                  <td>BVCI</td>
                  <td>Internet</td>
                  <td>21.6</td>
                </tr>
                <tr>
                  <td>18</td>
                  <td>CVC</td>
                  <td>Viagens</td>
                  <td>23.9</td>
                </tr>
                <tr>
                  <td>19</td>
                  <td>Cacau Show</td>
                  <td>Chocolateria</td>
                  <td>27.8</td>
                </tr>
                <tr>
                  <td>20</td>
                  <td>Droga Raia</td>
                  <td>Drogaria</td>
                  <td>30.3</td>
                </tr>
                <tr>
                  <td>21</td>
                  <td>Tuca Semi Joias</td>
                  <td>Acessórios</td>
                  <td>97.8</td>
                </tr>
                <tr>
                  <td>22</td>
                  <td>Chiquinho Sorvetes</td>
                  <td>Sorveteria</td>
                  <td>90.3</td>
                </tr>
                <tr>
                  <td>23</td>
                  <td>Espaço Girl</td>
                  <td>Vestuário</td>
                  <td>89.9</td>
                </tr>
                <tr>
                  <td>24</td>
                  <td>Açaí Mania</td>
                  <td>Sorveteria</td>
                  <td>89.3</td>
                </tr>
                <tr>
                  <td>25</td>
                  <td>Actual</td>
                  <td>Vestuário</td>
                  <td>89.4</td>
                </tr>
                <tr>
                  <td>26</td>
                  <td>Tuca Semi Joias</td>
                  <td>Acessórios</td>
                  <td>97.8</td>
                </tr>
                <tr>
                  <td>27</td>
                  <td>Chiquinho Sorvetes</td>
                  <td>Sorveteria</td>
                  <td>90.3</td>
                </tr>
                <tr>
                  <td>28</td>
                  <td>Espaço Girl</td>
                  <td>Vestuário</td>
                  <td>89.9</td>
                </tr>
                <tr>
                  <td>29</td>
                  <td>Açaí Mania</td>
                  <td>Sorveteria</td>
                  <td>89.3</td>
                </tr>
                <tr>
                  <td>30</td>
                  <td>Actual</td>
                  <td>Vestuário</td>
                  <td>89.4</td>
                </tr>
                <tr>
                  <td>31</td>
                  <td>Cacau Brasil</td>
                  <td>Chocolateria</td>
                  <td>87.1</td>
                </tr>
                <tr>
                  <td>32</td>
                  <td>Óticas Carol</td>
                  <td>Acessórios</td>
                  <td>86.2</td>
                </tr>
                <tr>
                  <td>33</td>
                  <td>Pernambucanas</td>
                  <td>Vestuário</td>
                  <td>80.9</td>
                </tr>
                <tr>
                  <td>34</td>
                  <td>Açougue Sinhá</td>
                  <td>Alimentos</td>
                  <td>77.8</td>
                </tr>
                <tr>
                  <td>35</td>
                  <td>Sandrini</td>
                  <td>Vestuário</td>
                  <td>75.3</td>
                </tr>
                <tr>
                  <td>36</td>
                  <td>Lojão Pague 10</td>
                  <td>Vestuário</td>
                  <td>7.8</td>
                </tr>
                <tr>
                  <td>37</td>
                  <td>Malu Presentes</td>
                  <td>Acessórios</td>
                  <td>9.3</td>
                </tr>
                <tr>
                  <td>38</td>
                  <td>Big Jhonny</td>
                  <td>Restaurante</td>
                  <td>10.1</td>
                </tr>
                <tr>
                  <td>39</td>
                  <td>Mamuska</td>
                  <td>Vestuário</td>
                  <td>12.9</td>
                </tr>
                <tr>
                  <td>40</td>
                  <td>Toque Final</td>
                  <td>Vestuário</td>
                  <td>15.7</td>
                </tr>
                <tr>
                  <td>41</td>
                  <td>Casas Bahia</td>
                  <td>Loja</td>
                  <td>17.3</td>
                </tr>
                <tr>
                  <td>42</td>
                  <td>BVCI</td>
                  <td>Internet</td>
                  <td>21.6</td>
                </tr>
                <tr>
                  <td>43</td>
                  <td>CVC</td>
                  <td>Viagens</td>
                  <td>23.9</td>
                </tr>
                <tr>
                  <td>44</td>
                  <td>Cacau Show</td>
                  <td>Chocolateria</td>
                  <td>27.8</td>
                </tr>
                <tr>
                  <td>45</td>
                  <td>Droga Raia</td>
                  <td>Drogaria</td>
                  <td>30.3</td>
                </tr>
                <tr>
                  <td>46</td>
                  <td>Tuca Semi Joias</td>
                  <td>Acessórios</td>
                  <td>97.8</td>
                </tr>
                <tr>
                  <td>47</td>
                  <td>Chiquinho Sorvetes</td>
                  <td>Sorveteria</td>
                  <td>90.3</td>
                </tr>
                <tr>
                  <td>48</td>
                  <td>Espaço Girl</td>
                  <td>Vestuário</td>
                  <td>89.9</td>
                </tr>
                <tr>
                  <td>49</td>
                  <td>Açaí Mania</td>
                  <td>Sorveteria</td>
                  <td>89.3</td>
                </tr>
                <tr>
                  <td>50</td>
                  <td>Actual</td>
                  <td>Vestuário</td>
                  <td>89.4</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- FIM AVALIAÇÕES -->

          <!-- RECLAMAÇÕES ULTIMAS SEMANAS -->
          <div id="tabela3">
            <h2>Reclamações das Últimas Semanas</h2>
            <table class="table relatorioTabular table-striped table-hover responsive" style="width: 100%">
              <thead>
                <tr>
                  <th></th>
                  <th>Estabelecimento</th>
                  <th>Categoria</th>
                  <th>Pontuação</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Tuca Semi Joias</td>
                  <td>Acessórios</td>
                  <td>97.8</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Chiquinho Sorvetes</td>
                  <td>Sorveteria</td>
                  <td>90.3</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Espaço Girl</td>
                  <td>Vestuário</td>
                  <td>89.9</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Açaí Mania</td>
                  <td>Sorveteria</td>
                  <td>89.3</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Actual</td>
                  <td>Vestuário</td>
                  <td>89.4</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Cacau Brasil</td>
                  <td>Chocolateria</td>
                  <td>87.1</td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Óticas Carol</td>
                  <td>Acessórios</td>
                  <td>86.2</td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Pernambucanas</td>
                  <td>Vestuário</td>
                  <td>80.9</td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Açougue Sinhá</td>
                  <td>Alimentos</td>
                  <td>77.8</td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Sandrini</td>
                  <td>Vestuário</td>
                  <td>75.3</td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>Lojão Pague 10</td>
                  <td>Vestuário</td>
                  <td>7.8</td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>Malu Presentes</td>
                  <td>Acessórios</td>
                  <td>9.3</td>
                </tr>
                <tr>
                  <td>13</td>
                  <td>Big Jhonny</td>
                  <td>Restaurante</td>
                  <td>10.1</td>
                </tr>
                <tr>
                  <td>14</td>
                  <td>Mamuska</td>
                  <td>Vestuário</td>
                  <td>12.9</td>
                </tr>
                <tr>
                  <td>15</td>
                  <td>Toque Final</td>
                  <td>Vestuário</td>
                  <td>15.7</td>
                </tr>
                <tr>
                  <td>16</td>
                  <td>Casas Bahia</td>
                  <td>Loja</td>
                  <td>17.3</td>
                </tr>
                <tr>
                  <td>17</td>
                  <td>BVCI</td>
                  <td>Internet</td>
                  <td>21.6</td>
                </tr>
                <tr>
                  <td>18</td>
                  <td>CVC</td>
                  <td>Viagens</td>
                  <td>23.9</td>
                </tr>
                <tr>
                  <td>19</td>
                  <td>Cacau Show</td>
                  <td>Chocolateria</td>
                  <td>27.8</td>
                </tr>
                <tr>
                  <td>20</td>
                  <td>Droga Raia</td>
                  <td>Drogaria</td>
                  <td>30.3</td>
                </tr>
                <tr>
                  <td>21</td>
                  <td>Tuca Semi Joias</td>
                  <td>Acessórios</td>
                  <td>97.8</td>
                </tr>
                <tr>
                  <td>22</td>
                  <td>Chiquinho Sorvetes</td>
                  <td>Sorveteria</td>
                  <td>90.3</td>
                </tr>
                <tr>
                  <td>23</td>
                  <td>Espaço Girl</td>
                  <td>Vestuário</td>
                  <td>89.9</td>
                </tr>
                <tr>
                  <td>24</td>
                  <td>Açaí Mania</td>
                  <td>Sorveteria</td>
                  <td>89.3</td>
                </tr>
                <tr>
                  <td>25</td>
                  <td>Actual</td>
                  <td>Vestuário</td>
                  <td>89.4</td>
                </tr>
                <tr>
                  <td>26</td>
                  <td>Tuca Semi Joias</td>
                  <td>Acessórios</td>
                  <td>97.8</td>
                </tr>
                <tr>
                  <td>27</td>
                  <td>Chiquinho Sorvetes</td>
                  <td>Sorveteria</td>
                  <td>90.3</td>
                </tr>
                <tr>
                  <td>28</td>
                  <td>Espaço Girl</td>
                  <td>Vestuário</td>
                  <td>89.9</td>
                </tr>
                <tr>
                  <td>29</td>
                  <td>Açaí Mania</td>
                  <td>Sorveteria</td>
                  <td>89.3</td>
                </tr>
                <tr>
                  <td>30</td>
                  <td>Actual</td>
                  <td>Vestuário</td>
                  <td>89.4</td>
                </tr>
                <tr>
                  <td>31</td>
                  <td>Cacau Brasil</td>
                  <td>Chocolateria</td>
                  <td>87.1</td>
                </tr>
                <tr>
                  <td>32</td>
                  <td>Óticas Carol</td>
                  <td>Acessórios</td>
                  <td>86.2</td>
                </tr>
                <tr>
                  <td>33</td>
                  <td>Pernambucanas</td>
                  <td>Vestuário</td>
                  <td>80.9</td>
                </tr>
                <tr>
                  <td>34</td>
                  <td>Açougue Sinhá</td>
                  <td>Alimentos</td>
                  <td>77.8</td>
                </tr>
                <tr>
                  <td>35</td>
                  <td>Sandrini</td>
                  <td>Vestuário</td>
                  <td>75.3</td>
                </tr>
                <tr>
                  <td>36</td>
                  <td>Lojão Pague 10</td>
                  <td>Vestuário</td>
                  <td>7.8</td>
                </tr>
                <tr>
                  <td>37</td>
                  <td>Malu Presentes</td>
                  <td>Acessórios</td>
                  <td>9.3</td>
                </tr>
                <tr>
                  <td>38</td>
                  <td>Big Jhonny</td>
                  <td>Restaurante</td>
                  <td>10.1</td>
                </tr>
                <tr>
                  <td>39</td>
                  <td>Mamuska</td>
                  <td>Vestuário</td>
                  <td>12.9</td>
                </tr>
                <tr>
                  <td>40</td>
                  <td>Toque Final</td>
                  <td>Vestuário</td>
                  <td>15.7</td>
                </tr>
                <tr>
                  <td>41</td>
                  <td>Casas Bahia</td>
                  <td>Loja</td>
                  <td>17.3</td>
                </tr>
                <tr>
                  <td>42</td>
                  <td>BVCI</td>
                  <td>Internet</td>
                  <td>21.6</td>
                </tr>
                <tr>
                  <td>43</td>
                  <td>CVC</td>
                  <td>Viagens</td>
                  <td>23.9</td>
                </tr>
                <tr>
                  <td>44</td>
                  <td>Cacau Show</td>
                  <td>Chocolateria</td>
                  <td>27.8</td>
                </tr>
                <tr>
                  <td>45</td>
                  <td>Droga Raia</td>
                  <td>Drogaria</td>
                  <td>30.3</td>
                </tr>
                <tr>
                  <td>46</td>
                  <td>Tuca Semi Joias</td>
                  <td>Acessórios</td>
                  <td>97.8</td>
                </tr>
                <tr>
                  <td>47</td>
                  <td>Chiquinho Sorvetes</td>
                  <td>Sorveteria</td>
                  <td>90.3</td>
                </tr>
                <tr>
                  <td>48</td>
                  <td>Espaço Girl</td>
                  <td>Vestuário</td>
                  <td>89.9</td>
                </tr>
                <tr>
                  <td>49</td>
                  <td>Açaí Mania</td>
                  <td>Sorveteria</td>
                  <td>89.3</td>
                </tr>
                <tr>
                  <td>50</td>
                  <td>Actual</td>
                  <td>Vestuário</td>
                  <td>89.4</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- FIM RECLAMAÇÕES ULTIMAS SEMANAS -->

          <!-- FIM DIV DE CONTEUDOS -->
        </div>
      </div>
    </div>
  </section>

  <!-- INSERIR CONTEUDO AQUI -->
  <!-- INSERIR CONTEUDO AQUI -->
  <!-- INSERIR CONTEUDO AQUI -->
  <!-- INSERIR CONTEUDO AQUI -->
  <!-- INSERIR CONTEUDO AQUI -->
  <!-- INSERIR CONTEUDO AQUI -->
  <!-- INSERIR CONTEUDO AQUI -->




  <!--RODAPÉ-->
  <footer id="footer" style="background-color: #232323; margin-bottom: -10%; z-index: 10">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms" >
      <div class="container text-center">
        <div class="tudo">
          <div class="logo"> <a href="index.html"><img style="margin-left: 30%; margin-top: 4%;" class="img-responsive" src="images/logo.png" alt=""></a>
            <div id="icons" class="social-icons" style="margin-top: 5%;">
              <ul>
                <li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a class="tumblr" href="#"><i class="fa fa-tumblr-square"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="texto">
            <h3>Sobre nós</h3>
            <p>Somos uma equipe de alunos do Instituto Federal de São Paulo - Campus São João da Boa Vista, que buscam finalizar o projeto proposto em uma das disciplinas com o maior sucesso possível. <br/>
              Ao alcançar esse sucesso, estaremos proporcionando
              para a cidade um novo sistema que pode impulsionar o comércio justo e maior comprometimento por parte dos estabelecimentos presentes na cidade.  <a href="php/mod01/mod01-SobreProjeto.html">Saiba mais...</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom" style="background-color: #191919;">
        <div class="container">
          <div class="row">
            <div class="col-sm-6" style=" color: white">
              <p>&copy; 2017 IFSP-SBV</p>
            </div>
            <div class="col-sm-6">
              <p class="pull-right" style="color: white;">Construído por <a style="color: white;" href="http://sbv.ifsp.edu.br/">Equipe IFSP</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!--FIM DO RODAPÉ-->

    <!--/#about-us-->


    <!-- SCRIPTS CHART JS -->
    <script src="js/mod04/datatables/Chart.js" type="text/javascript"></script>

    <!-- SCRIPTS PARA DATATABLES -->

    <script src="js/mod04/datatables/jquery.dataTables.min.js"></script>
    <script src="js/mod04/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mod04/datatable.js"></script>
    <script src="js/mod04/datatables/dataTables.responsive.min.js"></script>


    <!--script em geral-->
    <script src="js/mod04/rankings.js"></script>
    <!-- <script type="text/javascript" src="js/jquery.js"></script> -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script> -->
    <script type="text/javascript" src="js/jquery.inview.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/mousescroll.js"></script>
    <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.countTo.js"></script>
    <!-- <script type="text/javascript" src="js/main.js"></script> -->
    <!-- <script type="text/javascript" src="js/disableOnTop.js"></script> -->

    <!--fim do script em geral-->

  </body>
  </html>