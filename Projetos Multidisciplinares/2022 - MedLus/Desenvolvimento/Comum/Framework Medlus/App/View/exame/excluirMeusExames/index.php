<?php 

if(isset($this->getView()->exame) )
{

?>

<div class="row">
    <div id="excluirmeusexames" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <span><?php echo $this->getView()->title; ?></span>
            </div>
            <div class="card-body">
                <form action="/exames/excluir" method="post">
                    <div>
                        <td>
                            <a href='exames/excluir?id=<?php echo $dado->__get('EXA_ID'); ?>'>
                            <button type="button" id="PopoverCustomT-1">Excluir</button>
                            </a>
                        </td> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
}
else{
    echo "Nenhum exame cadastrado!";
}
?>