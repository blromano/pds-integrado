<?php 
    $pagina = "listagem";
    $footerColado = False;
    include "config.php";
    include 'header.php';
?>
    <section class="d-flex flex-column align-items-center container">
        <h1 class="main-title mt-2">Dados do Usuário</h1>
        <section class="col-12 col-md-6">
            <div class="d-flex flex-column align-items-center w-90">
                <img class="rounded-circle mt-5" width="150px" src="../assets/img/perfil.jpg" class="font-weight-bold">Renata</span>
                <span class="text-black-50">ingrata@gmail.com</span>
            </div>
            <div class="py-5 data">
                <div class="row mt-1">
                <table class= "d-flex flex-row justify-content-center table " >
                    <tr>
                    <style> 
                        .table_
                        {
                            border: hidden;
                            border-collapse: collapse;
                        }
                        textarea {
                      
                        outline: none;
                        }
                        section {
                        padding: 10px;
                        overflow: hidden;
                    }
                    </style>
                        <th class="table_" scope="col">Nome do Paciente:</th>
                        <th class="table_" scope="col">Renata Cristina Mussulino Peixoto</th>
                    </tr>
                    <tr>
                        <th class="table_" scope="col">Nome do Médico:</th>
                        <th class="table_" scope="col">Estevan Bittencourt de Almeida</th>
                    </tr>
                    <tr>
                        <th class="table_ " scope="col">Horário de inicio e término:</th>
                        <th class="table_ " scope="col"><input id="hora-cons" type="time" name="hora-cons" value="13:30"> - <input id="hora-cons" type="time" name="hora-cons" value="14:15" ></th>
                    </tr>
                    <tr>
                        <th class="table_" scope="col" >Sintomas:</th>
                        <th class="table_" scope="col"><textarea class= "" rows="3" cols="50" > </textarea></th>
                        
                    </tr>
                    <tr >
                        <th class="table_" scope="col">Diágnostico:</th>
                        <th class="table_" scope="col"><textarea class= "" rows="3" cols="50"> </textarea> </th>
                    </tr>
                    <tr>
                        <th class="table_" scope="col">Medicamento:</th>
                        <th class="table_" scope="col"><textarea class= "" rows="3" cols="50"> </textarea> </th>
                    </tr>
                    <tr>
                        <th class="table_" scope="col">Observações:</th>
                        <th class="table_" scope="col"><textarea class= "" rows="3" cols="50"> </textarea> </th>
                    </tr>
                </table>
                    <div> <br> </div> 
                    <div class="d-flex flex-row justify-content-center">
                        <tr class="action-row">
                            <a href="prototipo-20.php" class="btn btn-sm btn-primary"> Registrar Dados</a>
                        </tr>
                    </div> 
                </div>
            </div>
        </section>
    </section>
<?php include "footer.php";?>