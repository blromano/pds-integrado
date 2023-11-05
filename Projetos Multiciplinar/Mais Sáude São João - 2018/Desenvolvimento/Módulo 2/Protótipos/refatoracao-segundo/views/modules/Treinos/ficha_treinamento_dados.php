<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> +Saúde São João </title>
        <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
        <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
        <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
        <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" href="hover.css">
        <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
        <link href="views/modules/Treinos/mod04.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="views/modules/Treinos/mod04.css"> 
    </head>
    <body>           
    <!--Dados do paciente ---> 
        <div class="container">
                    <br>
                    <br>
            <div class="tabcontent">  <br>                   
                <div>
                    <h3 class="text-center">Informações sobre o usuário</h3> 
                    <br>
                    <div class="row">
                        <div class="col">
                         <label>Nome</label>
                         <input type="text" class="form-control" placeholder="Rogério" id="nome" disabled>
                        </div>
                        <div class="row"></div>
                    </div>
                    <div class="row">
                        <img id="avatarfichatreinamento" src="https://thumbs.dreamstime.com/b/vector-user-icon-7337510.jpg">                                
                        <div class="col espaco">
                          <label>Gênero</label>
                        <input type="text" class="form-control" value="Maculino" id="genero" disabled >
                        </div>
                        <div class="col espaco">
                            <label>Data de Nascimento</label>
                            <input type="date" class="form-control" value="00/00/0000" id="data" disabled  >
                        </div>              
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Endereço</label>
                            <input type="text" class="form-control" value="Socorro av.2" id="rua" disabled >
                        </div>
                        <div class="col">
                            <label>Email</label>
                            <input type="Email" class="form-control" value="xxxxxx@xxxx.xxx" id="email" disabled >
                        </div>
                        <div class="col">
                            <label>Telefone</label>
                            <input type="text" class="form-control" value="xxxx-xxxx" id="tel" disabled>
                        </div>
                    </div>
                    <br><br>
                </div>
                <!--FICHA DE TREINAMENTO -->
                <h3 class="separacao text-center"><br>Ficha de treinamento </h3>
                <button type="button" class="btn btn-success" >Adicionar treino</button>
                <br><br>
                
            </div>
        </div>     
    </body>
</html>

