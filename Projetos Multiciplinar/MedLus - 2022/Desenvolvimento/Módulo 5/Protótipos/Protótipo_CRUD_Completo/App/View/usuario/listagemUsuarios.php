<?php if (count($this->getView()->usuarios) < 1) { ?>
   <p>Não existem registros de usuários</p>
<?php } else {?>
   <h2>Usuários Cadastrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Nível</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->getView()->usuarios as $dado) { ?>
                    <tr>                                                        
                        <td><?php echo $dado->__get('idusuario'); ?></td>
                        <td><?php echo $dado->__get('nome'); ?></td>
                        <td><?php echo $dado->__get('email'); ?></td>
                        <td>
                            <?php 
                                if($dado->__get('nivel') == 'usr')
                                {
                                    echo "Usuário";
                                }
                                else
                                {
                                    echo "Administrador";    
                                }
                            ?>
                        </td>
                        <td>
                            <a href='usuario/editar?id=<?php echo $dado->__get('idusuario'); ?>'>
                                <button type="button" id="PopoverCustomT-1">Editar</button>
                            </a>
                        </td>
                        <td>
                            <a href='usuario/excluir?id=<?php echo $dado->__get('idusuario'); ?>'>
                                <button type="button" id="PopoverCustomT-1">Excluir</button>
                            </a>
                        </td>
                    </tr>
                <?php } ?>    
            </tbody>
        </table>                                        
<?php } ?>                                        
