<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="../../image/png" href="favicon.png">
    <link href="../../css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="../../js/bootstrap.js" type="text/javascript"></script>
    <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="icon" type="image.png" href="../../favicon.png">


</head>

<body style="background-image: url('../../images/intro-bg.jpg');" >

    <div class="container-fluid" role="main" style="padding:5%">
        <div class="container-fluid" style="border: 1px solid lightgray; border-radius: 20px; padding: 5%; background-color: white">
            <h1 class="text-center"> Índice de Massa Corpórea </h1>
            <form>
                <div class="row">
                    <div class="col-md-4">
                        <label for="sexo">Informe seu sexo</label>
                        <div class="form-group" id="sexo">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Masculino
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Feminino
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <labe for="peso">Insira seu peso</labe>
                            <input type="number" class="form-control" name="peso" id="peso">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <labe for="peso">Insira sua altura</labe>
                            <input type="number" class="form-control" name="peso" id="peso">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center" style="border:1px solid lightgray;  border-radius: 20px; padding: 0.3em"> IMC: 25 <span class="text-success">Saudável</span>   </h1>
                        <input type="submit" class="btn btn-danger">
                    </div>
                </div>
            </form>
        </div>
    </div>






    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



    <script  src="../../js/index.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/bootstrap.min.js"></script>


    <script src="../../js/jquery-1.11.3.min.js"></script>
    <script src="../../js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../../js/plugins.js"></script>
    <script src="../../js/main.js"></script>


</body>

</html>
