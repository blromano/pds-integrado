<?php 

if(isset($this->getView()->usuario) )
{

?>
<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <span>Editar Usuários</span>
            </div>
            <div class="card-body">
                <form action="/usuario/atualizar" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Nome Completo" required="" value="<?php echo $this->getView()->usuario->__get('nome');?>">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="E-mail" required="" value="<?php echo $this->getView()->usuario->__get('email');?>">
                    </div>
                   
                    <div class="form-group">
                        <label for="nivel" class="">Nível De Acesso:</label name="nivel" id="nivel">
                        <br />
                            <select name="nivel" id="nivel" placeholder="Selecione o nível" type="text" class="form-control">
                                <option value="adm" <?php if($this->getView()->usuario->__get('nivel') == 'adm') { echo "selected";}?>>
                                    Administrador         
                                </option>
                                <option value="usr" <?php if($this->getView()->usuario->__get('nivel') == 'usr') { echo "selected";}?>>
                                    Usuário         
                                </option>
                            </select>
                    </div>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $this->getView()->usuario->__get('idusuario');?>">  

                  
                    <div class="form-row">
                        <div class="col">
                            <button type="submit" class="btn btn-outline-secondary">Editar</button>
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
    echo "Usuário não selecionado!";
}