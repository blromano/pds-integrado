<html>

    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Listar Eventos Secretario</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendor/feather/feather.css">
    <link rel="stylesheet" href="../../vendor/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendor/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../resources/vendor/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendor/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../vendor/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../../resources/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../resources/css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="../../resources/css/verificarInscricaoDeAlunoEmModalidade_mod02.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../resources/images/favicon.png" />

    </head>

    <body>
    <div><br><br></div>

        <h1 class="titulo">Homologação de Documentos</h1><br>

        <div class="table-bordered"><br>
            
            <div class="btn btn-dark">
                <h4>Nome</h4>
            </div> <br><br>
               
            <div class="btn btn-dark">
                <h4>Matrícula</h4>
            </div><br><br>

            <fieldset class="tabela">
                <div>
                    <input type="checkbox" id="horns" name="horns" />
                    <label for="horns">Vôlei</label>
                  
                </div>

                <div>
                    <input type="checkbox" id="horns" name="horns" />
                    <label for="horns">Futsal</label>
                </div>

                <div>
                    <input type="checkbox" id="horns" name="horns" />
                    <label for="horns">Judô</label>
                </div>
            </fieldset>

            <div class="btn btn-dark">
                <h4>Comprovante de faixa &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Baixar</h4>
            </div><br><br>
        
            <div class="btn btn-dark">
                <h4>Autorização dos pais (se for menor de idade) &nbsp;&nbsp;&nbsp; Baixar</h4>
            </div><br><br>
    
                <form>
                    <textarea class="area_texto" rows="10" cols="10" placeholder="Justificativa (se não deferir):" minlength="20"></textarea><br>
                    <button id="button_1" type="button" class="btn btn-dark"><h4>Indeferir</h4></button> 
                    <button id="button_2" type="button" class="btn btn-dark"><h4>Deferir</h4></button> 
                </for>
           
        </div>

        </body>

    </html>