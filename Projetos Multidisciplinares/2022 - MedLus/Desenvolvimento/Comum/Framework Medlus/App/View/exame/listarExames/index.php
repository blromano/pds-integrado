<script>
        var parts = window.location.search.substr(1).split("&");
        var $_GET = {};
        for (var i = 0; i < parts.length; i++) {
            var temp = parts[i].split("=");
            $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
        };
</script>
<?php if(isset($_GET['msg'])){?>
    <?php if(str_ends_with($_GET['msg'], 'Sucesso')){?>
        <script>    
        Swal.fire({title: $_GET['msg'].replace(/_/g," "), icon: "success", showCancelButton: false, showConfirmButton: false,});
        </script>
    <?php } else{?>
    <script>    
        Swal.fire({title: $_GET['msg'].replace(/_/g," "), });
    </script>
<?php } ?>
<?php } ?>

<?php 
if (count($this->getView()->exames) < 1) { ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-med">Exames Cadastrados</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome do Paciente</th>
                        <th>Nome do Exame</th>
                        <th>Data Marcada</th>
                        <th>Estado do Exame</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <td valign="top" colspan="5" class="dataTables_empty">Não Existem Dados Cadastrados</td>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } else {?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-med">Exames Cadastrados</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID do Exame</th>
                        <th>Nome do Paciente</th>
                        <th>CPF</th>
                        <th>Nome do Exame</th>
                        <th>Data Marcada</th>
                        <th>Estado do Exame</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                        <?php foreach ($this->getView()->exames as $dado) { ?>
                            <tr>
                                <td scope="row"><?php echo $dado->__get('EXA_ID'); ?></td>
                                <td><?php echo $dado->__get("USU_NOME")?></td>
                                <td><?php echo $dado->__get("USU_CPF")?></td>
                                
                                <td><?php echo $dado->__get('EXA_NOME'); ?></td>
                                <td><?php echo $dado->__get('EXA_DATA_MARCADA'); ?></td>
                                <?php if($dado->__get("EXA_STATUS") == 1){?>
                                    <td class="text-success font-weight-bold">Autorizado</td>
                                <?php }elseif($dado->__get("EXA_STATUS") == 0){?>
                                    <td class="text-danger font-weight-bold">Recusado</td>
                                <?php }?>
                                <td class="text-center text-nowrap mx-auto">
                                    <a  class="btn btn-sm btn-med mx-2"  href='./detalharexame?id=<?php echo $dado->__get("EXA_ID");?>'>
                                        <button class="btn btn-sm btn-med mx-2" type="button" id="PopoverCustomT-1">Detalhar</button>
                                    </a> 
                                    <a class="btn btn-sm btn-danger mx-2"  href='./excluirexame?id=<?php echo $dado->__get('EXA_ID'); ?>'>
                                        <button  class="btn btn-sm btn-danger mx-2"  type="button" id="PopoverCustomT-1">Excluir</button>
                                    </a>                               
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?> 