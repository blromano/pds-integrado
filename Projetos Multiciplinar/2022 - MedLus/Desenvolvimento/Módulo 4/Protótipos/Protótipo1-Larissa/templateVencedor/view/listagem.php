<?php 
    $pagina = "listagem";
    $footerColado = False;
    include "config.php";
    include 'header.php';
?>
    <section class="d-flex flex-column align-items-center">
        <!--<h2 class="main-title mt-2">Médico/Paciente</h2>-->
        <section class="bg-white mt-5 mb-5 listagem d-flex align-items-center flex-column px-5 col-md-6 col-sm-12 col-lg-3">
            <div class="d-flex flex-column align-items-center w-100">
                <h3>Médico/Paciente</h3>
                <img class="rounded-circle mt-5" width="150px" src="../assets/img/perfil.jpg" class="font-weight-bold">Renata</span>
                <span class="text-black-50">ingrata@gmail.com</span>
            </div>
            <div class="py-5 data">
                <div class="row mt-1">
                    <div class="d-flex flex-row justify-content-between">
                        <label>Nome completo</label>
                        <p>Renata Cristina Mussulino Peixoto</p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>Número de Telefone</label>
                        <p>(19) 99562-8965</p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>Endereço</label>
                        <p> Rua João Almeida</p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>CPF</label>
                        <p>456.963.231-89</p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>Data de Nascimento</label>
                        <p>08/07/1992</p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>Email</label>
                        <p>ingrata@gmail.com</p>
                    </div>  
                    <div class="d-flex flex-row justify-content-between">
                        <label>Cidade</label><p>São João da Boa Vista</p></div>
                    <div class="d-flex flex-row justify-content-between"><label>Estado</label><p>São Paulo</p></div>
                </div>
                </div>
            </div>
        </section>
    </section>
<?php include "footer.php";?>