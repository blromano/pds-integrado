<table>
    <tr>
        <td>ID</td>
        <td>Nome</td>
        <td>Email</td>
        <td>Telefone</td>
        <td>Funções</td>
    </tr>
    <?php foreach ($this->getView()->pessoas as $dado){ ?>
        <tr>
            <td><?php echo $dado->__get("PES_ID"); ?></td>
            <td><?php echo $dado->__get("PES_NOME"); ?></td>
            <td><?php echo $dado->__get("PES_EMAIL"); ?></td>
            <td><?php echo $dado->__get("PES_TELEFONE"); ?></td>
            <td><a href="/editarPessoa?id=<?php echo $dado->__get("PES_ID"); ?>">Editar</a> / <a href="/excluirPessoa?id=<?php echo $dado->__get("PES_ID"); ?>">Excluir</a></td>
        </tr>

    <?php } ?>