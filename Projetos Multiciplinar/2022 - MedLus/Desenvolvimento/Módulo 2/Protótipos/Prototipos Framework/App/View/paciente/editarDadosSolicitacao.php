<?php 
    $pagina = "editarDadosSolicitacao";
    $footerColado = False;
    include "../config.php";
    include '../header.php';
    
    echo $css; 
    echo $cssListagem;
?>
    <section class="d-flex flex-column align-items-center">
        <h1 class="main-title mt-2">Editar dados</h1>
        <section class="bg-white mt-5 mb-5 listagem d-flex align-items-center flex-column px-5 col-md-6 col-sm-12 col-lg-3">
            <div class="d-flex flex-column align-items-center w-100">
            <img class="rounded-circle mt-5" width="150px" src="../../../resources/img/perfil.jpg" class="font-weight-bold">Renata</span>
                <span class="text-black-50">ingrata@gmail.com</span>
            </div>
            <div class="py-5 data">
                <div class="row mt-1">
                    
                        <label>Nome completo: </label> <br/>
                        <input type="text" class="form-control" id="nome" value="Renata Cristina Mussulino Peixoto" >
                        
                        <label>RG</label><br/>
                        <input type="real" class="form-control" id="rg" value="46.963.231-8" >

                        <label>CPF</label><br/>
                        <input type="real" class="form-control" id="cpf" value="456.963.231-89" >
                    
                </div>
                <br/>
                <br/>
                    <a href="#salvar" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#salvar">Salvar Alterações</a>
                    <a href="#cancelar" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#cancelar" >Cancelar</a>

            </div>

            <div class="modal fade" id="cancelar" tabindex="-1" role="dialog" aria-labelledby="cancelarLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="cancelarLabel">Cancelar </h5>
                                <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 Tem certeza que deseja cancelar a alteração?
                            </div>
                             <div class="modal-footer">
                                  <a href="../paciente/listagem.php" class="btn btn-sm btn-primary"  data-dismiss="modal">Sim</a>
                                  <a href="" class="btn btn-sm btn-primary"  data-dismiss="modal">Não</a>
                             </div>
                         </div>
                    </div>
            </div>

            <div class="modal fade" id="salvar" tabindex="-1" role="dialog" aria-labelledby="salvarLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="salvarLabel">Cancelar </h5>
                                <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 Tem certeza que deseja finalizar a alteração?
                            </div>
                             <div class="modal-footer">
                                  <a href="../paciente/solicitacao.php" class="btn btn-sm btn-primary"  data-dismiss="modal">Sim</a>
                                  <a href="" class="btn btn-sm btn-primary"  data-dismiss="modal">Não</a>
                             </div>
                         </div>
                    </div>
            </div>
        </section>
    </section>
<?php include "../footer.php";?>

