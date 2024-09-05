

<form action="/alterarPessoa" method="POST">
    <h1>Editar de Pessoas</h1>
    <label>Nome</label><br>
    <input type="text" name="PES_NOME" id="PES_NOME" value="<?php echo $this->getView()->pessoa->__get('PES_NOME'); ?>"><br>
    <label>Email</label><br>
    <input type="text" name="PES_EMAIL" id="PES_EMAIL" value="<?php echo $this->getView()->pessoa->__get('PES_EMAIL'); ?>"><br>
    <label>Telefone</label><br>
    <input type="text" name="PES_TELEFONE" id="PES_TELEFONE" value="<?php echo $this->getView()->pessoa->__get('PES_TELEFONE'); ?>"><br>
    <input type="hidden" name="PES_ID" id="PES_ID" value="<?php echo $this->getView()->pessoa->__get('PES_ID'); ?>">
    <input type="submit" value="Alterar"><br>

</form>