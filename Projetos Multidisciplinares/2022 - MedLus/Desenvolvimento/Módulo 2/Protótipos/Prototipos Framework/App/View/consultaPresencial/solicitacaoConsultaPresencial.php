<?php 
    $pagina = "solicitacaoConsultaPresencial";
    $footerColado = False;
    include "../config.php";
    include "../header.php";
?>
    <section class="d-flex flex-column align-items-center container">
        <h1 class="main-title mt-2">Solicitar Encaminhamento</h1>
        <section class="col-12 col-md-6">
            <div class="d-flex flex-column align-items-center w-90">
                <img class="rounded-circle mt-5" width="150px" src="../../../resources/img/perfil.jpg" class="font-weight-bold">Renata</span>
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
                      <a href="#exampleModal2" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2" style=" margin:6px " > <h7> Confirmar</h7></a> 
                        <a href="#exampleModal" class="btn btn-sm btn-danger " style=" margin:6px"><h7> Cancelar</h7></a>   
                </td>
                </table>
                
                    <div> <br> </div>
                </div>
            </div>
        </section>
    </section>



    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Solicitação de Consulta Presencial</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        Defina uma Data:
        <div class="py-4 data">
                <div class="row mt-1">
                    <div class="d-flex flex-row justify-content-center">
                        <label>Data: </label>
                        <p>
                        <style>
                            #inputy_da{
                                
                                margin-left: 10px;
                            }
                            </style>
                            <input type="date" id="inputy_da" name="data">
                        </p>
                    </div>
                    <div class="d-flex flex-row justify-content-center">
                        <label>Hora: </label>
                        <p>
                            <input type="time" id="inputy_d" name="hora">
                            <style>
                            #inputy_d{

                                width: 91%;
                                text-align: center;
                                margin-right: 75px;
                                margin-left: 10px;
                            }
                            </style>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#bt_confirmar" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#bt_confirmar"> Confirmar Solicitação</a>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="bt_confirmar" tabindex="-1" role="dialog" aria-labelledby="bt_confirmar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bt_confirmar">Confirmar Agendamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Solicitação de consulta presencial confirmada
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Ok</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancelar Agendamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja cancelar seu agendamento de Entrar Online ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sim</button>
                    <button type="button" class="btn btn-primary">Não</button>
                </div>
            </div>
        </div>
    </div>

<?php include "../footer.php";;?>