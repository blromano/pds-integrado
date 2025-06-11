<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title mb-4"><?php echo $this->getView()->title; ?></h4>
      <div class="table-responsive pt-3">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> ID </th>
              <th> Nome </th>
              <th> Local </th>
              <th> Status do Evento </th>
              <th> Data de Início </th>
              <th> Ações </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->getView()->eventos as $ev) { ?>
              <tr>
                <td> <?php echo $ev->__get('EVO_ID'); ?> </td>
                <td> <?php echo $ev->__get('EVO_NOME'); ?> </td>
                <td> <?php echo $ev->__get('CID_NOME'); ?> - <?php echo $ev->__get('EST_SIGLA'); ?> </td>
                <td> <?php echo $ev->__get('EVO_STATUS'); ?> </td>
                <td> <?php echo $ev->__get('EVO_DATA_INICIO'); ?> </td>
                <form action ="/listarmeuseventos/meuseventos?id=<?php echo $ev->__get('EVO_ID'); ?>" method="POST">
                <input type="hidden" id="AIE_ID" name="AIE_ID" value="<?php echo $ev->__get('AIE_ID')?>">                <td> <button type="submit" class="btn btn-dark">Detalhar</button></a> </td>
                </form>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>