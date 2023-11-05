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
        <link href="mod04.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="views/modules/Treinos/mod04.css"> 
    </head>
    <body>           
    <!--Dados do paciente ---> 
        <div class="container">
               <div class="container" role="main">
            <br/>
            <br/>
        <div class="text-center">
            <h5> Selecione o horário desejado</h5>
        </div>
            <div class="tabcontent offset-md-3" style="width: 50%;">
                <div class="table-responsive">
                        <table class="table table-condensed  table-striped">

                            <tbody>
                                <tr>
                                    <th scope="row">8:00 às 9:00</th>
                                    <td><input type="radio" name="disponivel" value="checked"></td>
                                </tr>
                                <tr>
                                    <th scope="row">9:00 às 10:00</th>
                                    <td><input type="radio" name="disponivel" value="checked"></td>
                                </tr>
                                <tr>
                                    <th scope="row">10:00 às 11:00</th>
                                    <td><input type="radio" name="disponivel" value="checked"></td>
                                </tr>
                                <tr>
                                    <th scope="row">11:00 às 12:00</th>
                                    <td><input type="radio" name="disponivel" value="checked"></td>
                                </tr>
                                <tr>
                                    <th scope="row">13:00 às 14:00</th>
                                    <td><input type="radio" name="disponivel" value="checked"></td>
                            </tbody>
                        </table>
                </div>
                <div class="offset-md-4">
                   <input type="button" value="Pesquisar" class="btn btn-primary btn-sm">
                </div>
        </div>     
    </body>
</html>

