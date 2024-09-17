<?php 
    $pagina = "listagem";
    $footerColado = true;
    include "config.php";
    include 'header.php';
?>

    <section class="d-flex flex-column align-items-center">
        <h1 class="main-title mt-2">Solicitação de Consulta Presencial</h1>
        <section class="bg-white mt-5 mb-5 listagem d-flex align-items-center flex-column px-5 col-md-6 col-sm-12 col-lg-3">
            
            <div class="py-5 data">
                <div class="row mt-1">
                    <div class="d-flex flex-row justify-content-between">
                        <label>Data: </label>
                        <p><input type="date" id="data" name="data"></p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>Hora: </label>
                        <p>
                            <input type="time" id="inputy_d" name="hora">
                            <style>
                            #inputy_d{

                                width: 100%;
                                text-align: center;
                                margin-right: 75px;
                                margin-left: 0px;
                            }
                            </style>
                        </p>
                    </div>
                    <!-- Ainda a decidir: -->
                    <!-- <br><br><br>
                    <div class="d-flex flex-row">
                        <label>Justificativa do reagendamento: </label>
                    </div>
                    
                    <div class="d-flex flex-row">
                        <p>
                            <textarea id="txtTextArea"  rows="4" cols="45"></textarea>
                        </p>
                    </div> -->
                </div>
            </div>
            <div class="d-flex flex-row justify-content-center">
                    <tr class="action-row">
                        <a href="#exampleModal" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Confirmar Solicitação</a>
                    </tr>
                </div> 
            </div>
        </section>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmar Agendamento</h5>
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
    
<?php include "footer.php";?>