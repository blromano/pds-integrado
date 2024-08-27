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
            <h1 class="text-center"> Teste de Vista </h1>
                <form>
                    <div class="row">
                        <div class="col-md-3" >
                            <img src="./ishihara1.jpg" alt="teste daltonismo 1" width="256" height="256">
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                Que numero você enxerga?
                                <input type="number">
                                <input type="checkbox">
                                Não consigo enxergar nenhum numero.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <img src="./ishihara2.jpg" alt="teste daltonismo 1" width="256" height="256">
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                Que numero você enxerga?
                                <input type="number">
                                <input type="checkbox">
                                Não consigo enxergar nenhum numero.
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-3" >
                            <img src="./ishihara3.jpg" alt="teste daltonismo 1" width="256" height="256">
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                Que numero você enxerga?
                                <input type="number">
                                <input type="checkbox">
                                Não consigo enxergar nenhum numero.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <img src="./ishihara4.jpg" alt="teste daltonismo 1" width="256" height="256">
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                Que numero você enxerga?
                                <input type="number">
                                <input type="checkbox">
                                Não consigo enxergar nenhum numero.
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6" >
                            <img src="./miohiper.jpg" alt="teste daltonismo 1" width="512" height="256">
                        </div>
                        <div class="col-md-6">
                            <h3> Instruções </h3>
                            <p>
                                Faça o teste sem óculos. Fique a 2 metros de distância do monitor. Feche um dos olhos com a mão e com o olho aberto veja se as letras parecem mais pretas na metade vermelha ou na metade verde. Caso você veja melhor as letras na parte vermelha provavelmente tem miopia. Se for na parte verde provavelmente você apresenta hipermetropia. Se for parecido, ou você não tem grau ou o grau é bem pequeno. Agora teste o outro olho da mesma forma.
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="text-center" style="border-top: 1px solid lightgray; margin-top: 5px">
                            <input type="radio" name="miohiper"> Enxergo melhor no fundo vermelho
                            <input type="radio" name="miohiper"> Enxergo melhor no fundo verde
                        </div>
                    </div>
                    <div class="row">
                        <div clas="col-md-6">
                            <img src="./astigmatismo.jpg" alt="teste astigmatismo" width="512" height="512">
                        </div>
                        <div class="col-md-6">
                            <h3> Instruções </h3>
                            <p>
                                    Fique a dois metros de distância da tela, e feche um dos olhos, se enxergar algumas linhas mais escuras e mais nítidas que outras, provavelmente tem astigmatismo. Caso todas as linhas pareçam iguais, sua visão está normal.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-center" style="border-top: 1px solid lightgray; margin-top: 5px">
                            <input type="radio" name="astigmatismo"> Enxergo algumas linhas mais escuras e mais nítidas que outras.
                            <input type="radio" name="astigmatismo"> Enxergo todas as linhas de forma igual.
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="text-success">Não apresenta daltonismo</span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-warning">Provável miopia</span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-danger">Alta probabilidade de astigmatismo</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <input type="submit" value="Enviar">
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
