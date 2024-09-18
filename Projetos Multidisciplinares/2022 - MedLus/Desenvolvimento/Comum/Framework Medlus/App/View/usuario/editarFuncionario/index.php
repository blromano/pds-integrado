<?php 

if(isset($this->getView()->paciente) )
{

?>

<section class="d-flex flex-column align-items-center">       
</section>

<div class="col-12 d-flex flex-column align-items-center w-100 mb-5">
    <h1 class="h3 mb-2 text-gray-800 my-4">Editar Dados</h1>
    <form action="/funcionarios/atualizar" method="post" class="col-12 col-md-6 col-lg-4 "> <!-- VER SE A ROTA TA CERTA -->
            <div>
                <div class="d-flex flex-column align-items-center w-100">
                    <img class="rounded-circle mt-5" width="150px" src="<?php echo $local;?>Assets/img/perfil.jpg" class="font-weight-bold">Renata</span>
                    <span class="text-black-50"><?php echo $dado->__get('USU_EMAIL'); ?></span>
                </div>
                <div class="form-group">
                    <label>Nome completo</label>
                    <p><input type="text" class="form-control rounded-pill" id="USU_NOME" name="USU_NOME" value="<?php echo $this->getView()->paciente->__get('USU_NOME');?>"></input></p>
                </div>
                <div class="form-group">
                    <label>Número de Telefone</label>
                    <p><input type="text" class="form-control rounded-pill" id="USU_TELEFONE" name="USU_TELEFONE" value="<?php echo $this->getView()->paciente->__get('USU_TELEFONE');?>"></input></p>
                </div>
                <div class="form-group">
                    <label>Número de Celular</label>
                    <p><input type="text" class="form-control rounded-pill" id="USU_CELULAR" name="USU_CELULAR" value="<?php echo $this->getView()->paciente->__get('USU_CELULAR');?>"></input></p>
                </div>
                <div class="form-group">
                    <label>Endereço</label>
                    <p> <input type="text" class="form-control rounded-pill" id="" name="" value="<?php echo $this->getView()->paciente->__get('');?>"></input></p> <!-- FALTA COISA NO BANCO, N DA PRA EDITAR AINDA-->
                </div>
                <div class="form-group">
                    <label>CPF</label>
                    <p><?php echo $dado->__get('USU_CPF'); ?></p>
                </div>
                <div class="form-group">
                    <label>RG</label>
                    <p><input type="text" class="form-control rounded-pill" id="USU_RG" name="USU_RG" value="<?php echo $this->getView()->paciente->__get('USU_RG');?>"></input></p>
                </div>
                <div class="form-group">
                    <label>Data de Nascimento</label>
                    <p><input type="date" class="form-control rounded-pill" id="USU_DATA_DE_NASCIMENTO" name="USU_DATA_DE_NASCIMENTO" value="<?php echo $this->getView()->paciente->__get('USU_DATA_DE_NASCIMENTO');?>" ></input></p>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <p><input type="text" class="form-control rounded-pill" id="USU_EMAIL" name="USU_EMAIL" value="<?php echo $this->getView()->paciente->__get('USU_EMAIL');?>"></input></p>
                </div>  
                <div class="form-group">
                    <label>Cidade</label>
                    <p><input type="text" class="form-control rounded-pill" id="" name="" value="<?php echo $this->getView()->paciente->__get('');?>"></input></p> <!-- FALTA COISA -->
                </div>
                <div class="form-group">
                    <label>Estado</label>
                    <p><input type="text" class="form-control rounded-pill" id="" name="" value="<?php echo $this->getView()->paciente->__get('');?>"></input></p> <!-- FALTA COISA -->
                </div>
                <div>
                    <table>
                        <thead>
                            <td><button type="" class="btn btn-med" > Alterar senha </a> <!-- ??? -->
                            <button type="submit" class="btn btn-med">Salvar</button>
                            <button type="" class="btn btn-danger botaover"> Cancelar </a></td> <!-- ??? -->
                        </thead>
                    </table>
                </div>
            </div>
    </form>
</div>

<?php 
}
else{
    echo "Funcionário não selecionado!";
}
?>