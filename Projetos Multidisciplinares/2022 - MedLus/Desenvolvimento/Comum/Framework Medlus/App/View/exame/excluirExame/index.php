<?php
    use App\DAO\PacienteDAO;
    use App\DAO\UsuarioDAO;
    use App\Model\PacienteModel;
    use App\Model\UsuariosModel;
?>
<?php $dado = $this->getView()->exame?>
<?php
    $usu = new UsuariosModel();
    $usuDAO = new UsuarioDAO();
    $pac = new PacienteModel();
    $pacDAO = new PacienteDAO();
    $pac = $pacDAO->buscarPorId($dado->__get('FK_PACIENTES_PAC_ID'));
    $usu = $usuDAO->buscarPorId($pac->__get('FK_USUARIOS_USU_ID'));
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">Excluir o Exame : <?php echo $dado->__get("EXA_NOME")?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                </thead>
                <tbody>
                <form action="./excluir?id=<?php echo $dado->__get("EXA_ID")?>" method="POST" class="d-flex justify-content-center row">
                    <div class="input-group mb-3 row">
                        <label class="form-label col-2 mt-2" for="username">Prontuário: </label>
                        <input class="form-control col-3" name="username" type="text" placeholder="Prontuario" id="username">
                    </div>
                    <div class="input-group mb-3 row">
                        <label class="form-label col-2 mt-2" for="passwd">Senha: </label>
                        <input class="form-control col-3" type="password" name="passwd" placeholder="Senha" id="passwd">
                    </div>
                    
                    <button type="submit" name="excluir" class="btn btn-med mx-2">Salvar</button>
                    <a href="./listarexame" type="button" name="cancelar" class="btn btn-danger">Cancelar</a>
                </form>
                </tbody>
            </table>
        </div>
    </div>
</div>