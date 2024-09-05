<?php 
    $pagina = "listagem";
    $footerColado = False;
    include "../config.php";
    include '../header.php';

    echo $cssListagem;
?>
    <section class="d-flex flex-column align-items-center">
        <h1 class="main-title mt-2">Dados do Usuário</h1>
        
        <section class="bg-white mt-5 mb-5 listagem d-flex align-items-center flex-column px-5 col-md-6 col-sm-12 col-lg-3">
            <div class="d-flex flex-column align-items-center w-100">
                <img class="rounded-circle mt-5" width="150px" src="../../../resources/img/perfil.jpg" class="font-weight-bold">Renata</span>
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
                </br>
                
                <a type="submit" id="bt" href="../paciente/solicitacao.php" class="btn btn-sm btn-primary" >Solicitar Agendamento</a></br>
                <a type="submit" id="bt" href="../paciente/listagemConsultaOnlineConfir.php" class="btn btn-sm btn-primary">Histórico de Consultas</a></br>
                <a type="submit" id="bt" href="../triagem/triagem1.php" class="btn btn-sm btn-primary">Triagem</a>

                </div>
                
            </div>
            
        </section>
    </section>
<?php include "../footer.php";?>