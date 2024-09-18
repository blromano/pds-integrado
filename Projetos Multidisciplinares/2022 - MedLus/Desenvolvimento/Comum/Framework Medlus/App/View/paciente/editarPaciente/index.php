<?php 

if(isset($this->getView()->paciente) )
{

?>

<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <span><?php echo $this->getView()->title; ?></span>
            </div>
            <div class="card-body">
                <form action="/pacientes/atualizar" method="post">
                <div class="form-group">
                        <input type="text" class="form-control" id="PAC_ID" name="PAC_ID" placeholder="PAC_ID" disabled value="<?php echo $this->getView()->paciente->__get('PAC_ID');?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="PAC_PRONTUARIO" name="PAC_PRONTUARIO" placeholder="Prontuário" required="" value="<?php echo $this->getView()->paciente->__get('PAC_PRONTUARIO');?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="FK_USUARIOS_USU_ID" name="FK_USUARIOS_USU_ID" autocomplete="off" required="" value="<?php echo $this->getView()->paciente->__get('FK_USUARIOS_USU_ID');?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="FK_PLANOS_PLA_ID" name="FK_PLANOS_PLA_ID" autocomplete="off" required="" value="<?php echo $this->getView()->paciente->__get('FK_PLANOS_PLA_ID');?>">
                    </div>
                    
                    <input type="hidden" class="form-control" name="id" value="<?php echo $this->getView()->paciente->__get('PAC_ID');?>">
                    
                    <div class="form-row">
                        <div class="col">
                            <button type="submit" class="btn btn-outline-secondary">Salvar</button>
                        </div>
                    </div>

                   
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
}
else{
    echo "Paciente não selecionado!";
}
?>