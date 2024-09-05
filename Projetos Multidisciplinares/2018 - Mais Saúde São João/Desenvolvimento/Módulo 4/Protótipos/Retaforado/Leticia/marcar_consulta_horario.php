<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Marcar Consulta</title>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="bower_components/jquery/dist/jquery.js" charset="utf-8"></script>
	<script src="bower_components/popper.js/dist/popper.js" charset="utf-8"></script>
	<script src="bower_components/bootstrap/dist/js/bootstrap.js" charset="utf-8"></script>
	<script src="scripts/animations.js" charset="utf-8"></script>
	<link rel="stylesheet" href="custom-css/build/mssj-style.css"> 
        
    </head>
    <body>
        
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
                <div class="offset-md-5">
                   <input type="button" value="Pesquisar" class="btn btn-primary btn-sm">
                </div>
            </body>

    </body>
</html>