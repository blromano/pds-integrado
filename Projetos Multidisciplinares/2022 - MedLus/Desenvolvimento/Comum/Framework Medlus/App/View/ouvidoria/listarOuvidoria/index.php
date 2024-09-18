<?php 
if (count($this->getView()->Ouvidorias) < 1) { ?>
   <p>Não existem registros de Reclamações</p>
   <a href="/ouvidoria/enviar"> Enviar Reclamação</a>
<?php } else {?>
    <h1 class="h3 mb-2 text-gray-800">Reclamações Cadastradas</h1>
    
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="posbotao">
                    <a href="/ouvidoria/enviar" type= "submit"class="btn btn-sm btn-success btn_redondo">Adicionar Reclamação</a>
            </div>
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">RECADO</th>
                    <th scope="col">MOTIVO</th>
                    <th scope="col">SITUACAO</th>
                    <th scope="col" class="actions text-center">Ações</th>     
                </tr>
            </thead>
            <tbody>
    <?php foreach ($this->getView()->Ouvidorias as $dado) { ?>
        <tr>
            <td><?php echo $dado->__get('OUV_ID'); ?></td>
            <td><?php echo $dado->__get('OUV_RECADO'); ?></td>
            <td><?php echo $dado->__get('OUV_MOTIVO'); ?></td>
            <td><?php echo $dado->__get('OUV_SITUACAO'); ?></td>
            <td class="action-row text-center">
                <form action="/ouvidoria/atualizaLista" method="post" >
                    <input type="hidden" id="ReclamacaoId" name="ReclamacaoId" value="<?php echo $dado->__get('OUV_ID'); ?>">
                
                    <!--<button type="button" id="PopoverCustomT-1">Definir situação</button>-->
                        <select id="OUV_SITUACAO" name="OUV_SITUACAO" onchange="this.form.submit()">
                            <option value="0" <?php if($dado->__get('OUV_SITUACAO')==0) echo "selected"; ?>>Aberto</option>
                            <option value="1" <?php if($dado->__get('OUV_SITUACAO')==1) echo "selected"; ?>>Não verificada</option>
                            <option value="2" <?php if($dado->__get('OUV_SITUACAO')==2) echo "selected"; ?>>Resolvida</option>
                        </select>

                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>  
<br><br>
<?php } ?> 
