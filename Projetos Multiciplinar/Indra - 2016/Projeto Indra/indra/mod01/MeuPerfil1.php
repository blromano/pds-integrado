<?php

require_once "../../modelo/mod01/UsuarioLogin.php";
session_start();




if(!isset($_SESSION['user'])){
    //session_destroy();
    header('location:index1.php');
    } else{
    if($_SESSION['user']->getNivelAcesso() > 4) {
       
        switch ($_SESSION['user']->getNivelAcesso()) {
      
        case 2:
            header('Location: indexNivel3.php');
            break;
        case 3:
            header('Location: indexNivel3.php');
            break;
        case 1:
            header('Location: indexNivel1.php');
            break;      
        default:
            header('location:index1.php');  
            break;
        }
    }
}
?>



<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Meu Perfil</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="../../css/plugin/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/plugin/freelancer.css" rel="stylesheet">
    <!-- formVailidatior.io CSS -->
    <link href="../../css/plugin/formValidation.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="../../css/custom/mod01/style.css" rel="stylesheet" type="text/css"/>
        </head>
        <script src="../../js/plugin/jquery.js"></script>


        <body id="page-top" class="index">
            <?php
               // print_r($_SESSION['user']); die;
            ?>

            <div class="modal fade" id="modal-exluir-cadastro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Excluir Cadastro</h4>
                        </div>
                        <div class="modal-body">
                            <label>Você realmente deseja excluir seu cadadastro?</label>                       
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Excluir</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--Modal Cadastro-->

            <div id="modal-editar-cadastro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Alterar Cadastro</h4>
                        </div>  
                        <div class="modal-body">  
                            <form  class="form_alterar_cadastro" method="post" action="../../class/mod01/AlterarCadastroUsuario.php" novalidate id = "form_alterar_cadastro">
                                <div  class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nome:</label>
                                            <input type="text" class="form-control" placeholder="Nome" minlength="1" maxlength="100" 
                                            name="USU_NOME" value="<?php echo $_SESSION['user']->getNome();?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Senha:</label>
                                            <input style=""type="password" class="form-control" placeholder="Senha" name="USU_SENHA" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="USU_ID" value="<?php echo $_SESSION['user']->getId();?>">
                                            <input type="hidden" class="form-control" name="NIV_ID" value="<?php echo $_SESSION['user']->getNivelAcesso();?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            
                                           
                                            <?php
                                            $cepArray = str_split($_SESSION['user']->getCep(),5);
                                            $cep = $cepArray[0] . '-' . $cepArray[1];

                                            ?>
                                            <label>CEP:</label>
                                             <input type="text" class="form-control" placeholder="CEP" maxlength="9" onKeyPress="mascara(this, '#####-###')"  name="USU_CEP" id="cep" value="<?= $cep ?>"  required>
                                            

                                            <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                                            <script>
                                            $("#cep").blur(function () {
                                                var cep = this.value.replace(/[^0-9]/, "");
                                                var url = "http://viacep.com.br/ws/" + cep + "/json/";
                                                $.getJSON(url, function (dadosRetorno) {
                                                    try {
                                                        $("#endereco").val(dadosRetorno.logradouro);
                                                        $("#cidade").val(dadosRetorno.localidade);
                                                        var estado = 0;
                                                        if (dadosRetorno.uf == "AC") {
                                                            estado = 1;
                                                        }
                                                        if (dadosRetorno.uf == "AL") {
                                                            estado = 2;
                                                        }
                                                        if (dadosRetorno.uf == "AP") {
                                                            estado = 3;
                                                        }
                                                        if (dadosRetorno.uf == "AM") {
                                                            estado = 4;
                                                        }
                                                        if (dadosRetorno.uf == "BA") {
                                                            estado = 5;
                                                        }
                                                        if (dadosRetorno.uf == "CE") {
                                                            estado = 6;
                                                        }
                                                        if (dadosRetorno.uf == "DF") {
                                                            estado = 7;
                                                        }
                                                        if (dadosRetorno.uf == "ES") {
                                                            estado = 8;
                                                        }
                                                        if (dadosRetorno.uf == "GO") {
                                                            estado = 9;
                                                        }
                                                        if (dadosRetorno.uf == "MA") {
                                                            estado = 10;
                                                        }
                                                        if (dadosRetorno.uf == "MT") {
                                                            estado = 11;
                                                        }
                                                        if (dadosRetorno.uf == "MS") {
                                                            estado = 12;
                                                        }
                                                        if (dadosRetorno.uf == "MG") {
                                                            estado = 13;
                                                        }
                                                        if (dadosRetorno.uf == "PA") {
                                                            estado = 14;
                                                        }
                                                        if (dadosRetorno.uf == "PB") {
                                                            estado = 15;
                                                        }
                                                        if (dadosRetorno.uf == "PR") {
                                                            estado = 16;
                                                        }
                                                        if (dadosRetorno.uf == "PE") {
                                                            estado = 17;
                                                        }
                                                        if (dadosRetorno.uf == "PI") {
                                                            estado = 18;
                                                        }
                                                        if (dadosRetorno.uf == "RJ") {
                                                            estado = 19;
                                                        }
                                                        if (dadosRetorno.uf == "RN") {
                                                            estado = 20;
                                                        }
                                                        if (dadosRetorno.uf == "RS") {
                                                            estado = 21;
                                                        }
                                                        if (dadosRetorno.uf == "RO") {
                                                            estado = 22;
                                                        }
                                                        if (dadosRetorno.uf == "RR") {
                                                            estado = 23;
                                                        }
                                                        if (dadosRetorno.uf == "SC") {
                                                            estado = 24;
                                                        }
                                                        if (dadosRetorno.uf == "SP") {
                                                            estado = 25;
                                                        }
                                                        if (dadosRetorno.uf == "SE") {
                                                            estado = 26;
                                                        }
                                                        if (dadosRetorno.uf == "TO") {
                                                            estado = 27;
                                                        }
                                                        $("#estado").val(estado);
                                                    } catch (ex) {
                                                    }
                                                });
});
</script>
</div>
</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label>Rua:</label>
            <input type="text" id="endereco" class="form-control" minlength="1" maxlength="100" placeholder="Rua" name="USU_RUA" value="<?php echo $_SESSION['user']->getRua();?>" required >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label>Complemento:</label>
            <input type="text" class="form-control" placeholder="Complemento" name="USU_COMPLEMENTO" value="<?php echo $_SESSION['user']->getComplemento();?>"  >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label>Número da Residência:</label>
            <input type="text" class="form-control" placeholder="Numero da Residencia"  minlength="1" maxlength="6" name="USU_NUMERO_RESIDENCIA" value="<?php echo $_SESSION['user']->getNumeroResidencia();?>" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label> Cidade:</label>
            <input type="text" id="cidade" class="form-control" placeholder="Cidade" minlength="1" maxlength="70" name="USU_CIDADE" value="<?php echo $_SESSION['user']->getCidade();?>" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">                   
            <label>Estado:</label>
            <div>
                <select style="float: left;" id="estado" class="form-control" required name="USU_ESTADO">
                    <option value="0">Estado</option>
                    <option value="1">Acre</option>
                    <option value="2">Alagoas</option>
                    <option value="3">Amapá</option>
                    <option value="4">Amazonas</option>
                    <option value="5">Bahia</option>
                    <option value="6">Ceará</option>
                    <option value="7">Distrito Federal</option>
                    <option value="8">Espírito Santo</option>
                    <option value="9">Goiás</option>
                    <option value="10">Maranhão</option>
                    <option value="11">Mato Grosso</option>
                    <option value="12">Mato Grosso do Sul</option>
                    <option value="13">Minas Gerais</option>
                    <option value="14">Pará</option>
                    <option value="15">Paraíba</option>
                    <option value="16">Paraná</option>
                    <option value="17">Pernambuco</option>
                    <option value="18">Piauí</option>
                    <option value="19">Rio de Janeiro</option>
                    <option value="20">Rio Grande do Norte</option>
                    <option value="21">Rio Grande do Sul</option>
                    <option value="22">Rondônia</option>
                    <option value="23">Roraima</option>
                    <option value="24">Santa Catarina</option>
                    <option value="25">São Paulo</option>
                    <option value="26">Sergipe</option>
                    <option value="27">Tocantins</option>
                </select> 
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group"  required >


            <label>Data de Nascimento:</label>
            <div>
                <?php
                $dataNascimento = explode('-', $_SESSION['user']->getDataNascimento());
                ?>
                <select style="float: left; " class="form-control" name = "dia" required>
                    <option value="">Dia</option>
                    <?php
                    for ($i = 1; $i <= 31; $i++):
                        $dia = $i < 10 ? '0' . $i : $i;
                    $selecionado = $dataNascimento[2] == $i ? "selected" : ""; ?>
                    <option value="<?= $dia ?>" <?= $selecionado ?>><?= $dia ?></option>
                    <?php endfor;
                        //$dia = $_POST['dia'];
                    ?>
                </select>

                <select style="float: left; " class="form-control" name = "mes"  required>
                    <option value="">Mês</option>
                    <?php for ($i = 1; $i <= 12; $i++):
                    $mes = $i < 10 ? '0' . $i : $i;
                    $selecionado = $dataNascimento[1] == $i ? "selected" : ""; ?>
                    <option value="<?= $mes ?>" <?= $selecionado ?>><?= $mes ?></option>
                <?php endfor; ?>
            </select>

            <select style="float: left; " class="form-control" name = "ano"  required>
                <option value="">Ano</option>
                <?php for ($i = 2016; $i >= 1900; $i--):
                    $selecionado = $dataNascimento[0] == $i ? "selected" : ""; ?>
                    <option value="<?= $i ?>" <?= $selecionado ?>><?= $i ?></option>
                <?php endfor;
                //$ano = $_POST['ano'];
                ?>
            </select>


        </div>

    </div>

</div>
</div>






<div class="row">
   
</div>
<div class="row">
    <div class="col-lg-12">

        <div>

            <input  type="submit" role="button" value="Editar" class="btn btn-primary" ></input>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">

    </div>
</div>


</form>
</div>
<div class="modal-footer">
    <button class="btn btn-primary btn-table " data-dismiss="modal">Cancelar</button>
    <!--<button class="btn btn-primary btn-table " data-dismiss="modal" >Salvar</button>-->
</div>
</div>
</div>
</div>

</div>


<div id="site">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" id="menu">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#page-top" class="page-scroll icone-menu-container">
                    <img  class="img-responsive" src="../../img/icone.png" id="icone-menu" alt="icone"/>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float:right">

                <ul class="nav navbar-nav navbar-right">

                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="index1.php">P&aacute;gina Principal</a>
                    </li>
                    
                    <li class="page-scroll">
                        <a href="#about"> Instru&ccedil;&otilde;es </a>
                    </li>
                    <li class="page-scroll">
                        <a href="#funcionalidades"> Funcionalidades </a>
                    </li>
                    <li id="btn-login">
                            <a href="../../class/mod01/logout.php"> Logout </a>
                        </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header id="painel-inicial">
        <div class="container" >
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive " id="logo-indra" src="../../img/iconemod1b.png" alt="logo">
                    <div class="intro-text">
                        <span class="skills">Meu Perfil</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Alertas -->
    <div class="container-fluid elemento-escondido" id="alerta" style="padding: 1em; background-color: rgba(255,0,0,0.4); ">
        <div class="row">
            <div class="col-lg-12 text-center">
                <br>
                <br>
                <h1>Alertas</h1>
                <br>
                <br>
            </div>
        </div>

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                <div class="item active" align="center">
                    <img src="img/alerta/alerta-1.jpg" alt="" />
                    <div class="carousel-caption">
                        <h3>TUA MAE, SP</h3>
                        <p>18/03/2016 - 16:30</p>
                        <p>Risco: Grave</p>
                        <p>Pancadão de Verão</p>
                    </div>
                </div>

                <div class="item" align="center">
                    <img src="img/alerta/alerta-1.jpg" alt=""/>
                    <div class="carousel-caption">
                        <h3>TEU FILHO, SP</h3>
                        <p>18/03/2016 - 16:48</p>
                        <p>Risco: Grave</p>
                        <p>Pancadão de Verão</p>
                    </div>
                </div>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2> Alterar Dados </h2>
                    <br>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Nesta página o usuário pode ter acesso à suas informações, e alterá-las.</p>
                </div>
                <div class="col-lg-4">
                    <p>Para alterar as informações</p>
                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#modal-editar-cadastro">Editar</button>
                
            </div>
        </div>
    </div>
</section>

<section  id="funcionalidades">
    <div class="container elemento-expandido">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Excluir Dados</h2>

                <br />
                <br />
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Nesta página o usuário pode deletar seu cadastro.</p>
                </div>
                <div class="col-lg-4">
                    <p>Para deletar seu cadastro clique aqui. </p>
                    <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#modal-exluir-cadastro">Excluir</button>
                </div>
            </div>
        </section>
        <section id="excluir-cadastro">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2> Outros </h2>
                        <br>
                        <br>
                    </div>
                </div>

            </section>

            <!-- Footer -->
            <footer class="text-center">
                <div class="footer-above">
                    <div class="container ">
                        <div class="row">
                            <div class="footer-col col-md-6">
                                <h3>Local</h3>
                                <p>Instituto Federal de Educação, Ciência e Tecnologia de São Paulo<br>Campus São João da Boa Vista</p>
                            </div>
                            <div class="footer-col col-md-6">
                                <h3>Redes Sociais</h3>
                                <ul class="list-inline">
                                    <li>
                                        <a href="https://www.facebook.com/ifspsaojoaodaboavista" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>    

        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
        <div class="scroll-top page-scroll visible-xs visible-sm">
            <a class="btn btn-primary" href="#page-top">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>

        <!-- jQuery -->
        <script src="../../js/plugin/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../js/plugin/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="../../js/custom/classie.js"></script>
        <script src="../../js/custom/cbpAnimatedHeader.js"></script>



        <!-- Contact Form JavaScript -->
       <!--  <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>
 -->
        <!-- Custom Theme JavaScript -->
        <script src="../../js/plugin/freelancer.js"></script>

        <!--- formValidation.io jQuery -->
        <script src="../../js/plugin/formValidation.min.js"></script>
        <script src="../../js/plugin/formValidation-bootstrap.min.js"></script>
        <script src="../../js/custom/validator.js"></script>
        <script src="../../js/custom/validatorCadastro.js"></script>
        <script src="../../js/custom/validatorLogin.js"></script>
        <script src="../../js/custom/validatorRecuperarSenha.js"></script>

        <script src="../../js/custom/validatorAlterarCadastro.js"></script>

