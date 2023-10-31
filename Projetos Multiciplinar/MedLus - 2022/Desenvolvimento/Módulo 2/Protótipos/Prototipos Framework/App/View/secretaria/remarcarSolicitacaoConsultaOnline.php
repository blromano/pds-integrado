<?php 
    $pagina = "remarcarSolicitacaoConsultaOnline";
    $footerColado = False;
    include "../config.php";
    include '../header.php';
    
    echo $css; 
    echo $cssListagem;
?>
    <section class="d-flex flex-column align-items-center">
        <h2 class="main-title mt-2">Remarcar Solicitação de Consulta Online</h2>
        <section class="bg-white mt-5 mb-5 listagem d-flex align-items-center flex-column px-5 col-md-6 col-sm-12 col-lg-3">
            <div class="d-flex flex-column align-items-center w-100">
                <img class="rounded-circle mt-5" width="150px" src="../../../resources/img/perfil.jpg" class="font-weight-bold">Renata</span>
                <span class="text-black-50">ingrata@gmail.com</span>
            </div>
            <div class="py-5 data">
                <div class="row mt-1">
                    <div class="d-flex flex-row justify-content-between">
                        <label>Nome completo: </label>
                        <p>Renata Cristina Mussulino Peixoto</p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>Nome do Médico:</label>
                        <p> Alessandra de Oliveira Pinheiro</p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>Especialidade do Médico:</label>
                        <p> Cardiologista</p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>Data da consulta:</label>
                        <p> 29/06/2022</p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>Horário</label>
                        <p>12:00</p>
                    </div>
                    <br/>
                    <br/>
                    <label for="data">Nova Data:</label>
                    <input type="date" placeholder="Data" id="data">

                    <label for="horario">Novo Horário:</label>
                    <input type="time" placeholder="Horário" id="horario">

                </div>
                <br/>
                <br/>
                
                    <a href="#" class="btn btn-sm btn-primary" >Salvar Alterações</a>
                    <a href="#" class="btn btn-sm btn-primary">Cancelar</a>
                
            </div>
        </section>
    </section>
<?php include "../footer.php";?>
