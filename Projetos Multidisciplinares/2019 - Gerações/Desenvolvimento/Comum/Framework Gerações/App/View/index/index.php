<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h1>INDEX</h1>
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($this->getView()->dados  as $produto){ ?> 
                        <tr>
                            <td><?php echo $produto->getId(); ?></td>
                            <td><?php echo $produto->getDescricao(); ?></td>
                            <td><?php echo $produto->getPreco(); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>