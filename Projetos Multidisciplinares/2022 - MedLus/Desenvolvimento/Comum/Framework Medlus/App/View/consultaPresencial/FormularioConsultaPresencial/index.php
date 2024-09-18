<!-- DataTales Example -->
<?php 
    $dados = $this->getView()->consultasPresencial;   
    $hora = $dados->__get('COP_HORA_ATENDIMENTO');
    $data = $dados->__get('COP_DATA_ATEDIMENTO');
    $pm_id = $dados->__get('PM_ID');

    $d=strtotime("$hora $data");    
        
    //print_r($dados);
    //exit();


?>

<div class="col-12 d-flex flex-column align-items-center w-100">
    <h1 class="h3 mb-2 text-gray-800 my-4">CONSULTA PRESENCIAL</h1>
    <form action="" method="post" class="user" class="col-12 col-md-6 col-lg-4">
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="Nome"
                    placeholder="Nome do Paciente/" value="<?php  echo $dados->__get('NOME_PACIENTE');?>"  readonly>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" id="Prontuario"
                    placeholder="PRONTUÁRIO" readonly>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="NomeMed"
                    placeholder="Nome do Médico" value="<?php echo $dados->__get('NOME_MEDICO');?>" readonly>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" id="Prontuario"
                    placeholder="" value="<?php echo date("Y/m/d H:i", $d);?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <textarea class="form-control" id="SintomasConsulta" rows="3" placeholder="DESCRIÇÃO/SINTOMAS"></textarea>
        </div>

        <div class="form-group">
            <p>PRESCRIÇÃO MÉDICA:<?php echo("&nbsp&nbsp")?><a href="<?php echo("/prescricao?pm_id=" . $pm_id); ?>" class="btn btn-outline-primary btn-sm">ADICIONAR</a></p>
        </div>
        <div class="form-group">
            <p>EXAMES:<?php echo("&nbsp&nbsp")?><a href="exames.php" class="btn btn-outline-primary btn-sm">ADICIONAR</a></p>
        </div>
        <div class="form-group">
            <p>INTERNAÇÃO:<?php echo("&nbsp&nbsp")?><a href="#" class="btn btn-outline-primary btn-sm">SOLICITAR</a></p>
        </div>

        <div class="form-group">
            <p>RETORNO: <div class="toggle-radio">
                <input type="radio" class="d-none" name="rdo" id="yes" onclick="return habilitar();">
                <input type="radio" class="d-none" name="rdo" id="no" checked onclick="return desabilitar();">
                    <div class="switch">
                        <label class="switch-button" for="yes">Sim</label>
                        <label class="switch-button" for="no">Não</label>
                        <span></span>
                    </div>  
                <input id="retorno" class="form-control form-control-user" name="data-retorno" type="date" style="visibility: hidden">      
            </div></p>
        </div>

        <input type="hidden" name="COP_ID" id="COP_ID" value="<?php echo $dados->__get('COP_ID'); ?>">

        <button type="submit" class="btn btn-primary btn-user btn-block btn-med" href="/consulta_salvar">SALVAR</button>
    </form>
</div>

<script>
    function desabilitar() {
        document.getElementById('retorno').style="visibility: hidden;";
  }
function habilitar() {
  document.getElementById('retorno').style="visibility: visible;";
}
</script>