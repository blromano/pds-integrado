<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>

        <div id="header" class="container-fluid text-center">
            <div class="menu_logo">
                <img class="icon" id="logo" src="Logo_Final.png">
            </div>
            <div class="menu_esq opcao_menu col-sm-2 dropdown">
                <img class="icon" src="icon_nutricao.png">
                <div class="dropdown-content">
                    <a href=""> Plano alimentar </a>
                    <a href=""> Dário de bordo </a>
                    <a href=""> Ferramentas nutricionais </a>
                </div>
                <br class="legenda_icone"> Nutrição
            </div>
            <div class="opcao_menu col-sm-2 dropdown">
                <img class="icon" src="icon_treino.png">
                <div class="dropdown-content">
                    <a href=""> Checkup </a>
                    <a href=""> Treinos </a>
                    <a href=""> Ferramentas esportivas </a>
                </div>
                <br class="legenda_icone"> Treinamento
            </div>
            <div class="opcao_menu col-sm-2 dropdown">
                <img class="icon" src="icon_social.png">
                <div class="social_dropdown dropdown-content">
                    <a href=""> Meu perfil </a>
                    <a href=""> Feed </a>
                </div>
                <br class="legenda_icone"> +Saúde Social
            </div>
            <div class="opcao_menu col-sm-2">
                <a href=""><img class="icon" src="icon_login.png"></a>
                <br class="legenda_icone"> Sair
            </div>
        </div>

        <div id="content">
            <div class="container-fluid text-center">    
                <style>
                    .form1{
                        width: 40%;
                    }
                </style>
                <div class="col-sm-8 text-left"> 

                    <div class="container">
                        <br/> <br/>
                        
                        <h2>Lista com Filtragem de elementos</h2> 
                        <br/>
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <ul class="list-group" id="myList">
                            <li class="list-group-item">bacon</li>
                            <li class="list-group-item">carne de bovino</li>
                            <li class="list-group-item">frango</li>
                            <li class="list-group-item">papelão</li>
                        </ul>  
                    </div>

                    <script>
                        $(document).ready(function () {
                            $("#myInput").on("keyup", function () {
                                var value = $(this).val().toLowerCase();
                                $("#myList li").filter(function () {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                            });
                        });
                    </script>
                    
                    
                    <!DOCTYPE html>
 
                            <br/><br/>
                            <div class="container">
                                <h2>Tabela de resultado de pesquisa</h2>  
                                <br/>
                                <div class="table-responsive">          
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Usuário</th>
                                                <th>Nome</th>
                                                <th>Sobrenome</th>
                                                <th>Idade</th>
                                                <th>Cidade</th>
                                                <th>País</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>@anna_pereira</td>
                                                <td>Anna</td>
                                                <td>Pereira</td>
                                                <td>35</td>
                                                <td>São Paulo</td>
                                                <td>Brasil</td>
                                            </tr>
                                             <tr>
                                                <td>@pedro_luis</td>
                                                <td>Pedro Luis</td>
                                                <td>Santos</td>
                                                <td>23</td>
                                                <td>Brasília</td>
                                                <td>Brasil</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
            
                            <br/><br/>
                            <div class="container">
                                <h2>Tabela simples</h2> 
                                <br/>
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Usuário</th>
                                            <th>Perfil</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>@serginho123</td>
                                            <td>Educador Físico</td>
                                            <td>serginho_maromba@outlook.com.br</td>
                                        </tr>
                                        <tr>
                                            <td>@bruno_nutri</td>
                                            <td>Nutricionista</td>
                                            <td>bruninho_nutritudo@outlook.com.br</td>
                                        </tr>
                                        <tr>
                                            <td>@leticia678</td>
                                            <td>Usuário</td>
                                            <td>leezinha@hotmail.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>
        </div>
<br><br>
<div class="container-fluid text-center">    
    <div class="row content">
    </div>
</div>
<footer class="text-center">
    <p> Mais Saúde São João <br> © Copyright 2018 <br> Todos os direitos reservados </p>
</footer>

</body>
</html>
