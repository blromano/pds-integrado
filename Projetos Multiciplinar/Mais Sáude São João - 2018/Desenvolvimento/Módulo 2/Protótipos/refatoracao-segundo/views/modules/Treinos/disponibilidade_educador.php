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
        <link href="views\modules\Treinos\mod04.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="views/modules/Treinos/mod04.css"> 
    </head>
    <body>           
    <!--Dados do paciente ---> 
        <div class="container">
               <div class="container" role="main">
            <form>
                <br>
                <div>
                    <h3 class="text-center">Horário de atendimento</h3>
                    <br><br>
                    <div class="row form">
                        <div class="col col-md-1 ">
                            <label> Das</label>
                        </div>
                        <div class="col col-md-1 form-group">
                            <input class="col-md-12 form-control" type="number" min="1" max="24" name="horarioinicio" placeholder="Início">
                        </div>
                        <div class="col col-md-1">
                            <label> às </label>
                        </div>
                        <div class="col col-md-1 form-group">
                            <input class="col-md-12 form-control" type="number" min="1" max="24" name="horariotermino" placeholder="Termino">
                        </div>
                        <div class="col col-md-1">
                            <label> horas </label>
                        </div>
                    </div>
                    <div class="offset-6 row">
                        <div class="offset-1 col-md-2">
                            <input  class="btn btn-success" type="submit" value="Gerar tabela">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col col-md-3">
                            <label> Duração da consulta:  </label>
                        </div>
                        <div class="col col-md-1 form-group">
                            <input class="col-md-12 form-control" type="number" step="15" min="15" max="60" name="tempoconsulta" value="checked">
                        </div>
                        <div class="col col-md-1">
                            <label> minutos  </label>
                        </div>
                    </div><br><br>


                    <div class="table-responsive">
                        <table class="table table-condensed  table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th scope="row" class="tabdisp"><input type="checkbox" name="disponivel" value="checked" >  Segunda</th>
                                    <th scope="row" class="tabdisp"><input type="checkbox" name="disponivel" value="checked" >  Terça</th>
                                    <th scope="row" class="tabdisp"><input type="checkbox" name="disponivel" value="checked" >  Quarta</th>
                                    <th scope="row" class="tabdisp"><input type="checkbox" name="disponivel" value="checked" >  Quinta</th>
                                    <th scope="row" class="tabdisp"><input type="checkbox" name="disponivel" value="checked" >  Sexta</th>
                                </tr>
                            </thead>
                            <tbody>
                        <tr>
                            <th scope="row">8:00 às 9:00</th>
                            <td><input type="checkbox" name="disponivel" value="checked"></td>
                            <td><input type="checkbox" name="disponivel" value="checked"></td>
                            <td><input type="checkbox" name="disponivel" value="checked"></td>
                            <td><input type="checkbox" name="disponivel" value="checked"></td>
                            <td><input type="checkbox" name="disponivel" value="checked"></td>
                        </tr>
                        <tr>
                            <th scope="row">9:00 às 10:00</th>
                            <td><input type="checkbox" name="disponivel" value="checked"></td>
                            <td><input type="checkbox" name="disponivel" value="checked"></td>
                            <td><input type="checkbox" name="disponivel" value="checked"></td>
                            <td><input type="checkbox" name="disponivel" value="checked"></td>
                            <td><input type="checkbox" name="disponivel" value="checked"></td>
                        </tr>
                            <tr>
                                <th scope="row">10:00 às 11:00</th>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                            </tr>
                            <tr>
                                <th scope="row">11:00 às 12:00</th>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                            </tr>
                            <tr>
                                <th scope="row">12:00 às 13:00</th>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                            </tr>
                            <tr>
                                <th scope="row">13:00 às 14:00</th>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                            </tr>
                            <tr>
                                <th scope="row">14:00 às 15:00</th>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                            </tr>
                            <tr>
                                <th scope="row">15:00 às 16:00</th>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                                <td><input type="checkbox" name="disponivel" value="checked"></td>
                            </tr>
                            </tbody>
                        </table>
                          <br>
                          <br>
                    </div> 
                    <div class="offset-3">
                        <h4>Local</h4>
                        <input class="form-control col-md-8" type="text" name="localconsulta" placeholder="Endereço"><br>
                        <input class="form-control col-md-8" type="text" name="linkmaps" placeholder="Digite o link do Google Maps aqui"><br>                        
                    </div>
                    <input type="submit" class="offset-3 btn-success" value="Confirmar"><br><br>
                </div>
            </form> 
        </div>

        </div>     
    </body>
</html>

