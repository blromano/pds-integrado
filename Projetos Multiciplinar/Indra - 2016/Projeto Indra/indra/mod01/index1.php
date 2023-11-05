<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projeto Indra</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="../../css/plugin/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/plugin/freelancer.css" rel="stylesheet">
    <!-- formVailidatior.io CSS -->
    <link href="../../css/plugin/formValidation.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <!--<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="../../css/custom/mod01/style.css" rel="stylesheet" type="text/css"/>

</head>
<script type="text/javascript">
    function mascara(t, mask) {
        var i = t.value.length;
        var saida = mask.substring(1, 0);
        var texto = mask.substring(i)
        if (texto.substring(0, 1) != saida) {
            t.value += texto.substring(0, 1);
        }
    }
</script>

<script src="../../js/plugin/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src="../../js/custom/mod01/validacaoMascara.js"></script>
<script>
    function mostrar_formulario(valor_select) {

        switch (valor_select) {
            case '1':
            $("#form_instituicao").css("display", "block");
            $("#form_especialista").css("display", "none");
            break;
            case '2':
            $("#form_especialista").css("display", "block");
            $("#form_instituicao").css("display", "none");
            break;
            default:
            $("#form_especialista").css("display", "none");
            $("#form_instituicao").css("display", "none");
            break;
        }
    }
</script>


<body id="page-top" class="index">
<?php

require_once "../../modelo/mod01/UsuarioLogin.php";
session_start();




if(isset($_SESSION['user'])){
      
       switch ($_SESSION['user']->getNivelAcesso()) {
		   case 1: 
		   header('Location: indexNivel1.php');
		   break;
      
        case 2:
            header('Location: indexNivel2.php');
            break;
        case 3:
            header('Location: indexNivel3.php');
            break;
        case 4:
            header('Location: indexNivel4.php');
            break;      
        default:
            header('location:index1.php');  
            break;
        }

 
}

?>
    <!--Modal Login-->

       <div id="background-modal" class="elemento-escondido"></div>

            <div id="modal-login" class="elemento-escondido">

                <form class="formLogin" action="../../class/mod01/verificarlogin.php" method="POST" id="form-login" >
                    <div class="row control-group">
                        <label>LOGIN</label>                        
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control entrada-texto"  pattern="^[_A-z0-9@./\-/]{1,}$" placeholder="Email">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label  :>Senha</label>
                            <input name="senha" type="password" class="form-control entrada-texto" placeholder="Senha" >
                        </div>
                    </div>

                    <br>                 
                    
                    <div class="form-group col-xs-12" id="cadastrar">
                        <button type="submit" class="btn btn-primary"> Login </button>
                        <button class="btn btn-primary" id="btn-cancelar"> Cancelar </button>
                        <a style="color:Darkblue"; data-dismiss="#modal-login" data-toggle="modal" data-target="#modalRec" id="btn-recuperar">Esqueci minha senha.</a>                        
                    </div>
                    <br>
                </form>
            </div>

            <!-- <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a> -->
           <!--  <div class="modal fade" id="modal-login">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Login</h4>
                        </div>
                        <div class="modal-body">
                            <form class="formLogin" action="verificarlogin.php" method="POST">
                                <div class="control-group">                    
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input style="width: 95%" name="email" type="email" class="form-control"  pattern="^[_A-z0-9@./\-/]{1,}$" placeholder="Email">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="form-group">
                                        <label>Senha</label>
                                        <input style="width: 95%" name="senha" type="password" class="form-control" placeholder="Senha" >
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">                                
                                <button type="button" type="submit" class="btn btn-primary">Login</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <a style="color:Darkblue"; data-dismiss="#modal-login" data-toggle="modal" data-target="#modalRec" id="btn-recuperar">Esqueci minha senha.</a>    
                            </div>
                        </div>
                    </div>
                </div>
 -->

                <!--Modal Cadastro-->

                <div id="modal-cadastro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Cadastro</h4>
                            </div>  
                            <div class="modal-body">  
                                <form  class="form_cadastro" method="post" action="../../class/mod01/cadastrar_usuario.php" novalidate id = "form_cadastro">
                                    <div  class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Nome:</label>
                                                <input type="text" class="form-control" placeholder="Nome" minlength="1" maxlength="100" name="USU_NOME" required>
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
                                                <label>Email:</label>
                                                <input type="email" class="form-control" placeholder="Email"  minlength="1" maxlength="100" name="USU_EMAIL" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>CEP:</label>
                                                <input type="text" class="form-control" placeholder="CEP" maxlength="9" onKeyPress="mascara(this, '#####-###')"  name="USU_CEP" id="cep" required>
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
            <input type="text" id="endereco" class="form-control" minlength="1" maxlength="100" placeholder="Rua" name="USU_RUA" >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label>Complemento:</label>
            <input type="text" class="form-control" placeholder="Complemento" name="USU_COMPLEMENTO" >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label>Número da Residência:</label>
            <input type="text" class="form-control" placeholder="Numero da Residencia"  minlength="1" maxlength="6" name="USU_NUMERO_RESIDENCIA" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label> Cidade:</label>
            <input type="text" id="cidade" class="form-control" placeholder="Cidade" minlength="1" maxlength="70" name="USU_CIDADE" required>
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

                <select style="float: left; " class="form-control" name = "dia"  required>
                    <option value="">Dia</option

                        <?php
                        for ($i = 0; $i <= 31; $i++) {
                            if ($i < 10)
                                echo "<option value='0" . $i . "'>0" . $i . "</option>";
                            else
                                echo "<option value='" . $i . "'>" . $i . "</option>";
                        }
                        $dia = $_POST['dia'];
                        ?>
                    </select>

                    <select style="float: left; " class="form-control" name = "mes"  required>
                        <option value="">Mês</option>
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            if ($i < 10) {
                                echo "<option value='0" . $i . "'>0" . $i . "</option>";
                            } else {
                                echo "<option value='" . $i . "'>" . $i . "</option>";
                            }
                            $mes = $_POST['mes'];
                        }
                        ?>
                    </select>

                    <select style="float: left; " class="form-control" name = "ano"  required>
                        <option value="">Ano</option>
                        <?php
                        for ($i = 2016; $i >= 1900; $i--) {
                            echo "<option value='" . $i . "'>" . $i . "</option>";
                        }
                        $ano = $_POST['ano'];
                        ?>
                    </select>


                </div>

            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">                   
                <label>Tipo de úsuario:</label>
                <div>
                    <select style="float: left;" class="form-control"  name="nivel" required  onchange="mostrar_formulario(this.value);">
                        <option value="0">Úsuario Comum</option>
                        <option value="1">Instituição</option>
                        <option value="2">Especialista</option>

                    </select>

                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div id="form_instituicao" style="display:none">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Nome fantasia:</label>
                            <input type="text" class="form-control" placeholder="Nome fantasia" name="INS_NOME_FANTASIA" maxlength="100" required>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Rasão Social:</label>
                            <input type="text" class="form-control" placeholder="rasão social" name="INS_RAZAO_SOCIAL" maxlength="150" required>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>CNPJ:</label>
                            <input type="text" class="form-control" placeholder="cnpj" name="INS_CNPJ" pattern="^[0-9/\.//\-/]{1,}$"  maxlength="18" onKeyPress="mascara(this, '99.999.999/9999-99')" required>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div id="form_especialista" style="display:none">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">

                            <label>Instituíção:</label>
                            <input type="text" class="form-control" placeholder="instituição" name="USU_INSTITUICAO" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>RG:</label>
                            <input type="text" class="form-control" placeholder="RG" maxlength="13" name="ESP_RG"  pattern="^[0-9A-z/\.//\-/]{1,}$" onKeyPress="mascara(this, '##.###.###-##')" required>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>CPF:</label>
                            <input type="text" class="form-control" placeholder="cpf" maxlength="14" pattern="^[0-9/\.//\-/]{1,}$" name="ESP_CPF" onKeyPress="mascara(this, '999.999.999-99')" required>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Especialização:</label>
                            <input type="text" class="form-control" placeholder="especialização"  maxlength="500" name="ESP_ESPECIALIZACAO" required>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="checkbox">
                <label><input  type="checkbox" name="termos" required>Aceito os Termos de Uso</label>
                <a style="font-size: 11px; margin-left: 0.3%; color: #4682B4" data-toggle="modal" data-target="#modalTermos">
                    Saiba mais
                </a>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

            <div>

                <input  type="submit" role="button" value="Cadastrar" class="btn btn-primary" disabled></input>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalTermos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Termos de Uso</h4>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
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


<!--Modal Recuperar Senha-->
<div class="modal fade" id="modalRec" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">recuperar senha</h4>
            </div>
            <form class="formRecuperacao" action="../../class/mod01/RecuperarSenha.php" method="POST" novalidate id="formRecuperacao">
                <div class="modal-body">

                    <label>Insira seu email para entrarmos em contato com você:</label>
                    <div class="form-group">
                        <br></br>
                        <label style="float:left">EMAIL:</label>
                        <input type="email" class="form-control" placeholder="EMAIL" name="rec_email" >
                    </div>

                </div>
                <div class="modal-footer">
                    <input  type="submit" role="button" value="Enviar" class="btn btn-primary"  ></input>
                </div>
            </form>
        </div>
    </div>
</div>

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
                    <a href="#about"> Sobre N&oacute;s </a>
                </li>
                <li class="">
                    <a href="#ferramentas"> Ferramentas </a>
                </li>
                <li id="btn-cadastro" data-dismiss="modal" data-toggle="modal" data-target="#modal-cadastro">
                    <a> Cadastro </a>
                </li>
                <li id="btn-cadastro" data-dismiss="modal" data-toggle="modal" data-target="#modal-login">
                    <a> Login </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->
<header id="painel-inicial">
    <div class="container elemento-expandido" >
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" id="logo-indra" src="../../img/logo-indra.png" alt="logo">
                <div class="intro-text">
                    <span class="skills">Portal do Clima de S&atilde;o Jo&atilde;o e Regi&atilde;o</span>
                </div>
            </div>
        </div>
    </div>
</header>



<!-- About Section -->
<section class="success" id="about">
    <div class="container elemento-expandido">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2> Sobre Nós </h2>
                <br>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-2">
                <p>"Indra" é um portal de consulta e comparação do clima, onde o usuário pode ver informações referentes a úmidade, temperatura, nível da chuva e outras, tendo a oportunidade de agrupá-las em gráficos e tabelas. Os dados do portal são coletados por PCDs, sendo estas estações de coleta de dados equipadas com diversos dispositivos sensoriais.</p>
            </div>
            <div class="col-lg-4">
                <p>O portal foi desenvolvido pela turma do 4º Ano do Ensino Médio integrado ao Técnico em Informática de 2016 como projeto da disciplina de PDS(Projeto de Desenvolvimento de Sistemas). O nome "Indra" refere-se a um deus do hinduísmo, responsável pelas tempestades.</p>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <button id="responsaveis" type="button" class="btn btn-xs btn-spoiler spoiler-trigger" data-toggle="collapse"><h6 style="color:white">  Responsáveis</h6></button>
            </div>
            <div class="panel-collapse collapse out" id="lista-responsaveis" style="display:none">
                <div class="panel-body">
                    <p>Nome 1</p>
                    <p>Nome 2</p>
                    <p>Nome 3</p>
                    <p>Nome 4</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--

    <!-- Ferramentas -->
  <!--   <section  id="ferramentas">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Ferramentas</h2>
                    <br />
                    <br />

                    <div class="col-md-4 ferramentas">
                        <div class="thumbnail" >
                            <img  class="card-img" src="../../img/iconemod1.png" alt="iconemod1">
                            <div class="caption link-ferramenta"  >
                                <h3>Ferramenta 1</h3>
                                <p>Descri&ccedil;&atilde;o</p>
                                <p><a href="ferramenta1.html" role="button">Saiba mais...</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ferramentas">
                        <div class="thumbnail">
                            <img  class="card-img" src="../../img/iconemod2.png" alt="iconemod1">
                            <div class="caption link-ferramenta" >
                                <h3>PCD's</h3>
                                <p>Descri&ccedil;&atilde;o</p>
                                <p><a href="ferramenta2.html" role="button">Saiba mais...</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ferramentas">
                        <div class="thumbnail">
                            <img  class="card-img" src="../../img/iconemod3.png" alt="iconemod1">
                            <div class="caption link-ferramenta" >
                                <h3>Ferramenta 3</h3>
                                <p>Descri&ccedil;&atilde;o</p>
                                <p><a href="ferramenta3.html" role="button">Saiba mais...</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ferramentas" >
                        <div class="thumbnail">
                            <img  class="card-img" src="../../img/iconemod4.png" alt="iconemod1">
                            <div class="caption link-ferramenta" >
                                <h3>Ferramenta 4</h3>
                                <p>Descri&ccedil;&atilde;o</p>
                                <p><a href="ferramenta4.html" role="button">Saiba mais...</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 ferramentas">
                        <div class="thumbnail">
                            <img  class="card-img" src="../../img/iconemod5.png" alt="iconemod1">
                            <div class="caption link-ferramenta" >
                                <h3>Ferramenta 5</h3>
                                <p>Descri&ccedil;&atilde;o</p>
                                <p><a href="ferramenta5.html" role="button">Saiba mais...</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
 -->
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
    
    <!--- formValidation.io jQuery -->
    <script src="../../js/plugin/formValidation.min.js"></script>
    <script src="../../js/plugin/formValidation-bootstrap.min.js"></script>
    <script src="../../js/custom/mod01/validator.js"></script>
    <script src="../../js/custom/mod01/validatorCadastro.js"></script>
    <script src="../../js/custom/mod01/validatorLogin.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../js/plugin/freelancer.js"></script>

    <script>
        $(document).ready(function () {


            $("#responsaveis").click(function () {
                if ($('#lista-responsaveis').is(':visible')) {
                    $("#lista-responsaveis").css("display", "none");
                } else {
                    $("#lista-responsaveis").css("display", "block");
                }
            });
        });
    </script>

</body>

</html>
