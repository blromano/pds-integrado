<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1 class="display-3">SOBRE</h1>
                <?php foreach($this->getView()->dados  as $info){ ?>
                    <h1 class="display-4"><?php echo $info->getTitulo(); ?></h1>
                    <p class="lead"><?php echo $info->getDescricao(); ?></p>
                    <hr>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
