<?php
session_start();
//require_once("modelo/TiposAlimentos.php");
require_once("dao/TiposAlimentosDAO.php");


$tiposAlimentos = new TiposAlimentosDAO();
$tipos_alimentos = $tiposAlimentos->listarTodos();
$row_count = $tiposAlimentos->verificarQuantidadeTiposAlimentos();
?>
<!DOCTYPE html>
<html lang="pt-Br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> +Saúde São João </title>
        <script src="<?= JQUERY_PATH ?>" charset="utf-8"></script>
        <script src="<?= POPPER_PATH ?>" charset="utf-8"></script>
        <script src="<?= THEME_JS_PATH ?>" charset="utf-8"></script>
        <script src="<?= ANIMATIONS_PATH ?>" charset="utf-8"></script>
        <link rel="stylesheet" href="<?= THEME_CSS_PATH ?>">
        <link rel="stylesheet" href="<?= FNUTRICIONAIS_CSS_PATH ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-transparent-darker">
                <div class="container-fluid">
                        <!-- <img class="position-absolute h-75 d-inline-block" src="resources/images/logo-texto.png" alt="logo_texto"> -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <button class='btn btn-outline-light' onclick='openNav()'>Menu</button>
                        <ul class="navbar-nav ml-auto active-hover">
                            <li class="nav-item my-auto">
                                <a class="nav-link" href="./view.php?mod=Rede_Social"> Rede Social </a>
                            </li>
                            <li class="nav-item my-auto">
                                <a class="nav-link" href="./view.php?mod=Treinos"> Treinamento </a>
                            </li>
                            <li class="nav-item my-auto">
                                <a class="nav-link" href="./view.php?mod=Plano_Alimentar"> Nutrição </a>
                            </li>
                            <li class="nav-item clearfix border mx-2"></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="https://openclipart.org/image/2400px/svg_to_png/211821/matt-icons_preferences-desktop-personal.png" style="width: 2rem">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">

                                    <a class="dropdown-item" href="./view.php?mod=Usuarios">perfil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item btn-danger"  href="#">Sair</a>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <h1 class="titulo_al"> Insira os Tipos de Alimentos! </h1>




        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tipo do Alimento</th>

                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($row_count > 0) {
                        while ($row = $tipos_alimentos->fetch()) {
                            ?>

                            <tr>
                                <th><?= $row["TPA_CODIGO"] ?></th>
                                <td><?= $row["TPA_NOME"] ?></td>
                                <td> <button class="btn btn-link" type="button" data-toggle="modal" data-target="#editar<?= $row["TPA_CODIGO"] ?>"><i class="fa fa-pencil"></i></button>              
                                    <button class=" btn btn-link" type="button" data-toggle="modal" data-target="#excluir<?= $row["TPA_CODIGO"] ?>"><i class="fa fa-trash"></i></button>
                                    <!-- <a href="views/modules/Ferramentas_Nutricionais/deleta_Tp_alimento.php?id=<?= $row["TPA_CODIGO"] ?>">    <button class="deleta btn btn-link" id="<?= $row["TPA_CODIGO"] ?>"><i class="fa fa-trash"></i></button></a>
                                -->
                                    </td>
                            </tr>




                            <!-- The Modal -->
                        <div class="modal fade" id="editar<?= $row["TPA_CODIGO"] ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tipo de Alimentos</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <!-- A PAGINA DE CADASTRO ESTÁ CORRETA OU PRECISA INICIAR O CONSTRUTOR/ COMO FAZER!-->
                                        <form action="?mod=fnutricionais&sub=editar_Tp_alimento" method="POST">
                                            <div class="form-group">
                                                Nome:
                                                <input required="true" type="text" maxlength="100" class="form-control" id="nome" placeholder="Nome" name="nome" value="<?= $row["TPA_NOME"] ?>">
                                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $row["TPA_CODIGO"] ?>">
                                            </div>


                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </form>

                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>            

                
                
                <div class="modal fade" id="excluir<?= $row["TPA_CODIGO"] ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Excluir Unidade de Medida</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="?mod=fnutricionais&sub=deleta_Tp_alimento" method="POST">
                                    <p>Deseja realmente excluir este tipo de alimento</p>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $row["TPA_CODIGO"] ?>">
                                    
                                    <button type="submit" class="btn btn-primary">Sim</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div> 
                
                

                        <?php
                    }
                } else {
                    ?>

                    <script>
                        $(function () {
                            $('#vasio').modal('show');
                        });
                    </script>


                    <?php
                }
                ?>   

                <!-- MODAL PARA NAO EXISTEM TIPOS DE ALIMENTOS CADASTRADOS-->
                <div class="modal fade" id="vasio">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Tipo de Alimento</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">

                                Não existe nenhum alimento cadastrado.

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>




<!--<script>
$('#myModal').on('shown.bs.modal', function () {
    $('#myModal').trigger('focus');
});


</script>-->

                </tbody>
            </table>
            <button type="button" class="cadastrar_novo_tipo_alimento btn btn-primary" data-toggle="modal" data-target="#myModal">
                Cadastrar Novo Tipo de Alimento
            </button>



            <?php
            $emodal = isset($_SESSION["emodal"]) ? $_SESSION["emodal"] : "";
            
           
                if ($emodal==1) {
                    ?>

                    <script>
                        $(function () {
                            $('#cadastro').modal('show');
                        });
                    </script>  

                    <?php
                            session_destroy();  } else if ($emodal == 2) {
                    ?> 
                    <script>
                        $(function () {
                            $('#cadastro_existente').modal('show');
                        });
                    </script>  

                    <?php
             session_destroy();  } else if ($emodal == 4) {
                    ?>

                    <script>
                        $(function () {
                            $('#edicao').modal('show');
                        });
                    </script>  

                    <?php
            session_destroy();    } else if ($emodal == 5) {
                    ?> 
                    <script>
                        $(function () {
                            $('#edicao_erro').modal('show');
                        });
                    </script>  

                    <?php
          session_destroy();      } else if ($emodal == 7) {
                    ?>

                    <script>
                        $(function () {
                            $('#exclusao').modal('show');
                        });
                    </script>  


                    <?php
         session_destroy();      }
                ?>
                
                    <?php
            
            session_abort();
            ?>




            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tipo de Alimento</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <!-- A PAGINA DE CADASTRO ESTÁ CORRETA OU PRECISA INICIAR O CONSTRUTOR/ COMO FAZER!-->
                            <form action="?mod=fnutricionais&sub=cadastro_Tp_alimento" method="POST">
                                <div class="form-group">
                                    Nome:
                                    <input required="true" type="text" maxlength="100" class="form-control" id="nome" placeholder="Nome" name="nome">
                                </div>


                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>






            <!--    MODAIS PARA CAIXA DE CONFIRMAÇÃO DE CADASTRO, EDIÇÃO E EXCLUSÃO     -->


            <!--     CADASTRO   -->


            <!-- The Modal -->
            <div class="modal fade" id="cadastro">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tipo de Alimento</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            Tipo de alimento cadastrado com sucesso.

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>


            <!--     CADASTRO  COM ERRO   -->

            <!-- The Modal -->
            <div class="modal fade" id="cadastro_existente">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tipo de Alimento</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            Esse tipo de alimento já foi cadastrado.

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>


            <!--   EDIÇÃO erro -->


            <!-- The Modal -->
            <div class="modal fade" id="edicao_erro">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tipo de Alimento</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            Tipo de alimento já cadastrado.

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>




            <!--   EDIÇÃO-->


            <!-- The Modal -->
            <div class="modal fade" id="edicao">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tipo de Alimento</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            Tipo de alimento editado com sucesso.

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>





            <!--   EXCLUSÃO    -->


            <!-- The Modal -->
            <div class="modal fade" id="exclusao">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tipo de Alimento</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            Tipo de alimento excluido com sucesso.

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>








        </div>

   



</body> 
</html>


