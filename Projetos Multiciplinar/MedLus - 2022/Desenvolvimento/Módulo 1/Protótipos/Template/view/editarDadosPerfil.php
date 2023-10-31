<?php 
    $pagina = "editarDadosPerfil";
    $footerColado = False;
    include "config.php";
    include 'header.php';

    
?>
<?php echo $css; echo $cssListagem; ?>
    <section class="d-flex flex-column align-items-center">
        <h1 class="main-title mt-2">Editar Dados</h1>
        <section class="bg-white mt-5 mb-5 listagem d-flex align-items-center flex-column px-5 col-md-6 col-sm-12 col-lg-3">
            <div class="d-flex flex-column align-items-center w-100">
                <img class="rounded-circle mt-5" width="150px" src="../assets/img/perfil.jpg" class="font-weight-bold">Renata</span>
                <span class="text-black-50">ingrata@gmail.com</span>
            </div>
            <form action="editarDadosPerfil.php">
            <div class="py-5 data">
                <div class="row mt-1">
                    <div class="d-flex flex-row justify-content-between">
                        <label>Nome completo</label>
                        <p><input type="text" value="Renata Cristina Mussulino Peixoto"></input></p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>Número de Telefone</label>
                        <p><input type="text" value="(19) 99562-8965"></input></p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>Endereço</label>
                        <p> <input type="text" value="Rua João Almeida"></input></p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>CPF</label>
                        <p>456.963.231-89</p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>RG</label>
                        <p><input type="text" value="45.765.678-0"></input></p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>Data de Nascimento</label>
                        <p><input type="date" value="08/07/1992"></input></p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <label>Email</label>
                        <p><input type="text" value="ingrata@gmail.com"></input></p>
                    </div>  
                    <div class="d-flex flex-row justify-content-between">
                        <label>Cidade</label><p><input type="text" value="São João da Boa Vista"></input></p></div>
                    <div class="d-flex flex-row justify-content-between"><label>Estado</label><p><input type="text" value="São Paulo"></input></p></div>
                    <div>
                    <a type="button" class="aa" href="redefinirSenha.php" > Alterar senha </a>
                    </div>
                    <div>
                    <a type="button" class="aa" href="alterarPerfil.php" > Salvar </a>
                    </div>
                    <div>
                        <a type="button" class="btn btn-sm btn-danger botaover" href="alterarPerfil.php" > Cancelar </a>
                    </div>
                </div>
                </form>
                </div>
            </div>
        </section>
    </section>
<?php include "footer.php";?>