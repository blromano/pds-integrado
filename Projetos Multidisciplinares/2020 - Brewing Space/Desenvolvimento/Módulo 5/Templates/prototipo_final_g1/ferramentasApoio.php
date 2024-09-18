
<?php 
require_once('conexao/request.class.php');

if (isset($_POST['tempAJST']) && !empty($_POST['tempAJST'])) {
    $tempAJST = $_POST['tempAJST'];

    $conect = new Ferramentas();
    $arrayAJST = $conect->exDados();

    
    foreach ($arrayAJST as $key => $value) {
        if ($tempAJST == $value->AJD_TEMPERATURA) {
            $teste = $value->AJD_CORRECAO;
        }
    }
}

 ?>
 <html>
    <head>
        <title>Brewing Space</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="css/css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <div class="container-fluid">

                    <a href="#" class="navbar-brand">
                        <img class="logo" src="img/Logo-2-Transparente.png" alt="logotipo">
                    </a>

                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="nav-principal">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Feed de notícias</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link ml-3">Receitas</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link ml-3 ">Gerenciamento</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link ml-3 active">Ferramentas de apoio</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            
                            <li class="nav-item">
                                <a href="#" class="btn text-light fas fa-sign-out-alt fa-2x"></a>
                            </li>
                        </ul>
                    </div>

                </div>               
            </nav>            
        </header>

        <section>
            <div class="container mt-5"> 
                <div class="row">
                    <div class="col">
                        <div class="accordion" id="ferramentas">
                            
                            <!-- NUMERO 1 TEMPERATURAS -->
                            
                            <div class="card">
                                <div class="card-header bg-transparent" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Conversão de temperaturas (ºC, ºF, ºK)
                                        </button>
                                    </h2>
                                </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#ferramentas">
                                <div class="card-body">
                                    <form>
                                        <div class="form-group row text-center">
                                            <label for="cTemp" class="col-2 col-form-label pr-1">°C</label>
                                            <div class="col-5" >
                                                <input type="number" class="form-control" id="cTemp" onblur="calculoCel()">
                                            </div>
                                        </div>
                                        <div class="form-group row text-center">
                                            <label for="fTemp" class="col-2 col-form-label pr-1">°F</label>
                                            <div class="col-5" >
                                                <input type="number" class="form-control" id="fTemp" onblur="calculoFah()">
                                            </div>
                                        </div>
                                        <div class="form-group row text-center">
                                            <label for="kTemp" class="col-2 col-form-label pr-1">°K</label>
                                            <div class="col-5" >
                                                <input type="number" class="form-control" id="kTemp" onblur="calculoKel()">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                                
                            <!-- JAVASCRIPT CALCULO TEMPERATURA -->
                                
                            <script>
                                function calculoCel(){
                                    var c = document.getElementById("cTemp").value;
                                    var f = (parseFloat(c)*9/5) + 32;
                                    var k = parseFloat(c) + 273;
                                    document.getElementById("fTemp").value = f;
                                    document.getElementById("kTemp").value = k;
                                }
                                function calculoFah(){
                                    var f = document.getElementById("fTemp").value;
                                    var c = (parseFloat(f)-32) / (9/5);
                                    var k = ((parseFloat(f)-32) / (9/5) + 273);
                                    document.getElementById("cTemp").value = c;
                                    document.getElementById("kTemp").value = k;
                                }
                                function calculoKel(){
                                    var k = document.getElementById("kTemp").value;
                                    var c = parseFloat(k)-273;
                                    var f = ((parseFloat(k)-273)*9/5) + 32;
                                    document.getElementById("cTemp").value = c;
                                    document.getElementById("fTemp").value = f;
                                }
                            </script>
                            
                            <!-- NUMERO 2 PESO -->
                            
                            <div class="card ">
                                <div class="card-header bg-transparent" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Conversão de pesos (Kg, g, Lb, Oz)
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#ferramentas">
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group row text-center">
                                                <label for="kgPeso" class="col-2 col-form-label pr-1">Kg</label>
                                                <div class="col-5" >
                                                    <input type="number" class="form-control" id="kgPeso" onblur="calculoKg()">
                                                </div>
                                            </div>
                                            <div class="form-group row text-center">
                                                <label for="gPeso" class="col-2 col-form-label pr-1">g</label>
                                                <div class="col-5" >
                                                    <input type="number" class="form-control" id="gPeso" onblur="calculoG()">
                                                </div>
                                            </div>
                                            <div class="form-group row text-center">
                                                <label for="lbPeso" class="col-2 col-form-label pr-1">Lb</label>
                                                <div class="col-5" >
                                                    <input type="number" class="form-control" id="lbPeso" onblur="calculoLb()">
                                                </div>
                                            </div>
                                            <div class="form-group row text-center">
                                                <label for="ozPeso" class="col-2 col-form-label pr-1">Oz</label>
                                                <div class="col-5" >
                                                    <input type="number" class="form-control" id="ozPeso" onblur="calculoOz()">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- JAVASCRIPT CALCULO PESO -->
                                
                            <script>
                                function calculoKg(){
                                    var kg = document.getElementById("kgPeso").value;
                                    var g = parseFloat(kg) * 1000;
                                    var lb = parseFloat(kg) * 2.205;
                                    var oz = parseFloat(kg) * 35.274;
                                    document.getElementById("gPeso").value = g;
                                    document.getElementById("lbPeso").value = lb;
                                    document.getElementById("ozPeso").value = oz;
                                }
                                function calculoG(){
                                    var g = document.getElementById("gPeso").value;
                                    var kg = parseFloat(g) / 1000;
                                    var lb = parseFloat(g) / 454;
                                    var oz = parseFloat(g) / 28.35;
                                    document.getElementById("kgPeso").value = kg;
                                    document.getElementById("lbPeso").value = lb;
                                    document.getElementById("ozPeso").value = oz;
                                }
                                function calculoLb(){
                                    var lb = document.getElementById("lbPeso").value;
                                    var g = parseFloat(lb) * 454;
                                    var kg = parseFloat(lb) / 2.205;
                                    var oz = parseFloat(lb) * 16;
                                    document.getElementById("gPeso").value = g;
                                    document.getElementById("kgPeso").value = kg;
                                    document.getElementById("ozPeso").value = oz;
                                }
                                function calculoOz(){
                                    var oz = document.getElementById("ozPeso").value;
                                    var g = parseFloat(oz) * 28.35;
                                    var lb = parseFloat(oz) / 16;
                                    var kg = parseFloat(oz) / 35.274;
                                    document.getElementById("gPeso").value = g;
                                    document.getElementById("lbPeso").value = lb;
                                    document.getElementById("kgPeso").value = kg;
                                }
                            </script>
                            
                            <!-- NUMERO 3 VOLUME -->
                            
                            <div class="card">
                                <div class="card-header bg-transparent" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Conversão de volumes (L, ml, Gal)
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#ferramentas">
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group row text-center">
                                                <label for="lVolume" class="col-2 col-form-label pr-1">L</label>
                                                <div class="col-5" >
                                                    <input type="number" class="form-control" id="lVolume" onblur="calculoL()">
                                                </div>
                                            </div>
                                            <div class="form-group row text-center">
                                                <label for="mlVolume" class="col-2 col-form-label pr-1">ml</label>
                                                <div class="col-5" >
                                                    <input type="number" class="form-control" id="mlVolume" onblur="calculoMl()">
                                                </div>
                                            </div>
                                            <div class="form-group row text-center">
                                                <label for="galVolume" class="col-2 col-form-label pr-1">Gal</label>
                                                <div class="col-5" >
                                                    <input type="number" class="form-control" id="galVolume" onblur="calculoGal()">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- JAVASCRIPT CALCULO VOLUME -->
                            
                            <script>
                                function calculoL(){
                                    var l = document.getElementById("lVolume").value;
                                    var ml = parseFloat(l) * 1000;
                                    var gal = parseFloat(l) / 3.785;
                                    document.getElementById("mlVolume").value = ml;
                                    document.getElementById("galVolume").value = gal;
                                }
                                function calculoMl(){
                                    var ml = document.getElementById("mlVolume").value;
                                    var l = parseFloat(ml) / 1000;
                                    var gal = parseFloat(ml) / 3785;
                                    document.getElementById("lVolume").value = l;
                                    document.getElementById("galVolume").value = gal;
                                }
                                function calculoGal(){
                                    var gal = document.getElementById("galVolume").value;
                                    var l = parseFloat(gal) * 3.785;
                                    var ml = parseFloat(gal) * 3785;
                                    document.getElementById("lVolume").value = l;
                                    document.getElementById("mlVolume").value = ml;
                                }
                            </script>
                            
                            <!-- NUMERO 4 COR -->
                            
                            <div class="card border-transparent">
                                <div class="card-header bg-transparent" id="headingFour">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Conversão de cor (SRM, EBC)
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#ferramentas">
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group row text-center">
                                                <label for="srmCor" class="col-2 col-form-label pr-1">SRM:</label>
                                                <div class="col-5" >
                                                    <input type="number" class="form-control" id="srmCor">
                                                </div>
                                            </div>
                                            <div class="form-group row text-center">
                                                <label for="ebcCor" class="col-2 col-form-label pr-1">EBC:</label>
                                                <div class="col-5" >
                                                    <input type="number" class="form-control" id="ebcCor">
                                                </div>
                                            </div>
                                        </form>
                                    </div> 
                                </div>
                            </div>
                            
                            <!-- NUMERO 5 AMARGOR (IBU) -->
                            
                            <div class="card">
                                <div class="card-header bg-transparent" id="headingFive">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            Cálculo amargor (IBU)
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#ferramentas">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="tempoIBU" class="col-sm-2 col-form-label">Tempo de fervura:</label>
                                            <div class="col-sm-4">
                                                <select id="tempoIBU" name="tempoIBU" onblur="calcular_IBU()" class="form-control">
                                                    <option selected> Selecione uma opção</option>
                                                    <option value="0">0</option>
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="25">25</option>
                                                    <option value="30">30</option>
                                                    <option value="35">35</option>
                                                    <option value="40">40</option>
                                                    <option value="45">45</option>
                                                    <option value="50">50</option>
                                                    <option value="55">55</option>
                                                    <option value="60">60</option>
                                                    <option value="70">70</option>
                                                    <option value="80">80</option>
                                                    <option value="90">90</option>
                                                    <option value="100">100</option>
                                                    <option value="110">110</option>
                                                    <option value="120">120</option>
                                                </select>
                                            </div>
                                            <label for="denIBU" class="col-sm-2 col-form-label">Densidade pré-fervura do mosto:</label>
                                            <div class="col-sm-4">
                                                <select id="denIBU" name="denIBU" onblur="calcular_IBU()" class="form-control">
                                                    <option selected>Selecione uma opção</option>
                                                    <option value="1.030">1.030</option>
                                                    <option value="1.040">1.040</option>
                                                    <option value="1.050">1.050</option>
                                                    <option value="1.060">1.060</option>
                                                    <option value="1.070">1.070</option>
                                                    <option value="1.080">1.080</option>
                                                    <option value="1.090">1.090</option>
                                                    <option value="1.100">1.100</option>
                                                    <option value="1.110">1.110</option>
                                                    <option value="1.120">1.120</option>
                                                   
                                                </select>
                                              
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pesoIBU" class="col-sm-2 col-form-label">Peso do lúpulo (mg):</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" onblur="calcular_IBU()" id="pesoIBU">
                                            </div>
                                            <label for="alfaIBU" class="col-sm-2 col-form-label">Unidades de alfa ácido (%):</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" onblur="calcular_IBU()" id="alfaIBU">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="volIBU" class="col-sm-2 col-form-label">Volume de cerveja (L):</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" onblur="calcular_IBU()" id="volIBU">
                                            </div>
                                        </div>
                                        <br />
                                        <div class="form-group row">
                                            <label for="IBU" class="col-sm-2 col-form-label">IBU: </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="IBU" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- JAVA SCRIPT CALCULO IBU   -->
                            <script>
                                var GravidadeO = [
                            [999,1.030,1.040,1.050,1.060,1.070,1.080,1.090,1.100,1.110,1.120],
                            [0,0.000,0.000,0.000,0.000,0.000,0.000,0.000,0.000,0.000,0.000],
                            [5,0.055,0.050,0.046,0.042,0.038,0.035,0.032,0.029,0.027,0.025],
                            [10,0.100,0.091,0.084,0.076,0.070,0.064,0.058,0.053,0.049,0.045],
                            [15,0.137,0.125,0.114,0.105,0.096,0.087,0.080,0.073,0.067,0.061],
                            [20,0.167,0.153,0.140,0.128,0.117,0.107,0.098,0.089,0.081,0.074],
                            [25,0.192,0.175,0.160,0.147,0.134,0.122,0.112,0.102,0.094,0.085],
                            [30,0.212,0.194,0.177,0.162,0.148,0.135,0.124,0.113,0.103,0.094],
                            [35,0.229,0.209,0.191,0.175,0.160,0.146,0.133,0.122,0.111,0.102],
                            [40,0.242,0.221,0.202,0.185,0.169,0.155,0.141,0.129,0.118,0.108],
                            [45,0.253,0.232,0.212,0.194,0.177,0.162,0.148,0.135,0.123,0.113],
                            [50,0.263,0.240,0.219,0.200,0.183,0.168,0.153,0.140,0.128,0.117],
                            [55,0.270,0.247,0.226,0.206,0.188,0.172,0.157,0.144,0.132,0.120],
                            [60,0.276,0.252,0.231,0.211,0.193,0.176,0.161,0.147,0.135,0.123],
                            [70,0.285,0.261,0.238,0.218,0.199,0.182,0.166,0.152,0.139,0.127],
                            [80,0.291,0.266,0.243,0.222,0.203,0.186,0.170,0.155,0.142,0.130],
                            [90,0.295,0.270,0.247,0.226,0.206,0.188,0.172,0.157,0.144,0.132],
                            [100,0.298,0.272,0.249,0.228,0.208,0.190,0.174,0.159,0.145,0.133],
                            [110,0.300,0.274,0.251,0.229,0.209,0.191,0.175,0.160,0.146,0.134],
                            [120,0.301,0.275,0.252,0.230,0.210,0.192,0.176,0.161,0.147,0.134] 
                            ]
                                function calcular_IBU(){

                                    var P = document.getElementById("pesoIBU").value;
                                    var A = document.getElementById("alfaIBU").value/100;
                                    var V = document.getElementById("volIBU").value;
                                    var U ;
                                    var T = document.getElementById("tempoIBU").value;
                                    var D = document.getElementById("denIBU").value;
                                    var hhh;
                                    var resto;

                                    for (var c = 0;c < 20; c++) {
                     
                                        for (var l = 0; l < 11; l++) {

                                            if (T == GravidadeO[c][0] && D == GravidadeO[0][l])
                                            {U = GravidadeO[c][l];}                  
                                        };                                        
                                    };

                                    var IBU = (U*P*A)/V;
                                    document.getElementById("IBU").value = IBU;
                                    

                                };
                                
                            </script>
                            
                            <!-- NUMERO 6 TEOR ALCOOLICO (ABV) -->
                            
                            <div class="card">
                                <div class="card-header bg-transparent" id="headingSix">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            Cálculo teor alcoólico (ABV)
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#ferramentas">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="oriABV" class="col-sm-2 col-form-label">Densidade original:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="oriABV" onblur="calculoABV()">
                                            </div>
                                            <label for="finalABV" class="col-sm-2 col-form-label">Densidade final:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="finalABV" onblur="calculoABV()">
                                            </div>
                                        </div>
                                        <br />
                                        <div class="form-group row">
                                            <label for="ABV" class="col-sm-2 col-form-label">ABV: </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="ABV" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- JAVASCRIPT CALCULO ABV -->
                            
                            <script>
                                function calculoABV(){
                                    var og = document.getElementById("oriABV").value;
                                    var of = document.getElementById("finalABV").value;
                                    var abv = 131.25 * (parseFloat(og) - parseFloat(of));
                                    document.getElementById("ABV").value = abv;
                                }
                            </script>
                            
                            <!-- NUMERO 7 BRIX -->
                            
                            <div class="card">
                                <div class="card-header bg-transparent" id="headingSeven">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                            Conversão BRIX para Densidade
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#ferramentas">
                                    <div class="card-body">
                                    <div class="form-group row">
                                            <label for="brix" class="col-sm-2 col-form-label">BRIX:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="brix" onblur="calculoBRIX()">
                                            </div>
                                            <label for="denBRIX" class="col-sm-2 col-form-label">Densidade:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="denBRIX" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- JAVASCRIPT CALCULO BRIX -->
                            
                            <script>
                                function calculoBRIX(){
                                    var brix = document.getElementById("brix").value;
                                    var den = (parseFloat(brix) * 4) + 1000;
                                    document.getElementById("denBRIX").value = den;
                                }
                            </script>  

                            <!-- AJUSTE DE DESNIDADE -->
                        <form method="POST">
                            <div class="card">
                                <div class="card-header bg-transparent" id="headingEight">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                            Ajuste de densidade
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseEight" class="collapse show" aria-labelledby="headingEight" data-parent="#ferramentas">
                                    <div class="card-body">
                                    <div class="form-group row">
                                            <label for="ajusteTemp" class="col-sm-2 col-form-label">Temperatura:</label>
                                            
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="tempAJST" id="tempAJST">
                                                </div>
                                            
                                            <label for="ajusteCorre" class="col-sm-2 col-form-label">Correção:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="correc" id="correc" readonly value="<?php if(isset($teste)&& !empty($teste)){ echo $teste;}?>">
                                            </div>
                                            <button type="submit" name="enviar" class="btn btn-primary mb-2">Enviar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>                        
        </section>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
    <footer class="mt-5 ">
        <div class="container-fluid bg-dark">
            <div class="row">
                <div class="col">
                    <p class="lead text-center text-white">
                        © Copyright 4° ano de infomática do ano de 2020. Todos os Direitos Reservados.
                    </p>
                </div>
            </div>
        </div>
    </footer> 
</html>


