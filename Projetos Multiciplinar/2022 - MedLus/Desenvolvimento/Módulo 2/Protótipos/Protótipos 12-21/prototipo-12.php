<?php 
    $pagina = "listagem";
    $footerColado = False;
    include "config.php";
    include 'header.php';
?>
    <section class="d-flex flex-column align-items-center container">
        <h1 class="main-title mt-2">Solicitar Encaminhamento</h1>
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

                <table class= "d-flex flex-row justify-content-center "> 
                <tr>
                    <th class="table_" scope="col">Solicitar consulta Presencial: </th>       
                </tr>
                <td class = "table_ d-flex flex-row justify-content-center " >
                      <a href="prototipo-12(2).php" class="btn btn-sm btn-primary  "style=" margin:6px " > <h7> Confirmar</h7></a> 
                        <a href="#" class="btn btn-sm btn-danger " style=" margin:6px"><h7> Cancelar</h7></a>   
                </td>
                </table>
                
                    <div> <br> </div>
                </div>
            </div>
        </section>
    </section>
<?php include "footer.php";?>