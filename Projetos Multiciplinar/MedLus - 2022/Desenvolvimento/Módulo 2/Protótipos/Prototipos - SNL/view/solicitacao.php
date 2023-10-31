<?php 
    $pagina = "solicitacao";
    $footerColado = False;
    include "config.php";
    include 'header.php';
    
    echo $css; 
    echo $cssListagem;
?>
    <section class="d-flex flex-column align-items-center">
        <h1 class="main-title mt-2">Solicitação de Consulta Online</h1>
        <section class="bg-white mt-5 mb-5 listagem d-flex align-items-center flex-column px-5 col-md-6 col-sm-12 col-lg-3">
            <div class="d-flex flex-column align-items-center w-100">
                <img class="rounded-circle mt-5" width="150px" src="../assets/img/perfil.jpg" class="font-weight-bold">Renata</span>
                <span class="text-black-50">ingrata@gmail.com</span>
            </div>
            <div class="py-5 data">
                <div class="row mt-1">
                    <div class="d-flex flex-row justify-content-between">
                        <label>Nome completo: </label>
                        <p>Renata Cristina Mussulino Peixoto</p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>RG</label>
                        <p>46.963.231-8</p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>CPF</label>
                        <p>456.963.231-89</p>
                    </div>

                    <br/>
                    <label for="data">Especialidade médica:</label>
                    <input type="text" placeholder="Especialidade médica" id="es">

                    <label for="data">Data:</label>
                    <input type="date" placeholder="Data" id="data">

                    <label for="horario">Horário:</label>
                    <input type="time" placeholder="Horário" id="horario">

                </div>
                <br/>
                <br/>
                    <a href="#" class="btn btn-sm btn-primary" >Enviar</a>
                    <a href="#" class="btn btn-sm btn-primary" >Editar</a>
                    <a href="#" class="btn btn-sm btn-primary">Cancelar</a>
                
            </div>
        </section>
    </section>
<?php include "footer.php";?>

