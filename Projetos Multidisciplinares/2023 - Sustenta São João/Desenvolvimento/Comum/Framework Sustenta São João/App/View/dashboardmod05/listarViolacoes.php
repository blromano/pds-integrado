<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title"><?php echo $this->getView()->title; ?></h5>
        </div>
            <div class="cardG-body">
              <div class=containerG>
              <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center flex-column">
                                            <h5 class="card-title font-weight-bold "> Denúncias Violadas</h5>
                                        </div>
                                        <div id="carouselExample" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
                                                <li data-target="#carouselExample" data-slide-to="1"></li>
                                                <li data-target="#carouselExample" data-slide-to="2"></li>
                                            </ol>
                                            <div class="rounded carousel-inner custom-carousel-inner d-flex align-items-center">
                                                <div class="carousel-item active">
                                                    <img src="https://images.tcdn.com.br/img/img_prod/757977/teste_box_217_1_c0e0e4ffb489ba74ed2cd344efe086c4.jpg" class="img-fluid" alt="Imagem do Problema 1" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="https://static.todamateria.com.br/upload/pa/is/paisagem-natural-og.jpg" class="w-100" alt="Imagem do Problema 2">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="https://static.vecteezy.com/ti/vetor-gratis/p1/9169455-ceu-dourado-por-do-sol-na-costa-natureza-paisagem-vetor.jpg" class="w-100" alt="Imagem do Problema 3">
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Anterior</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Próximo</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center flex-column">
                                        <div class="container ">
                                            <p class="card-text text-justify mb-3 mt-3"> 
                                            <ul class="elementos">
                
                                    <div class="container-MOD5">                
                                <table class="tabela-MOD5" id="tabela05">                    
                                <thead>
                                    <tr class="elementos">
                                        <th class="itemLista1">ID</th>
                                        <!-- <th class="itemLista1"> Titulo da Denuncia</th> -->
                                        <th class="itemLista1"> Descrição </th>
                                        <th class="itemLista1"> Nome do Usuário </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($this->getView()->violacoes as $dado) { ?>                   
                                <tr class="elementos">                     
                                    <td class="itemLista2">
                                        <?php echo $dado->__get('VIO_ID'); ?>
                                    </td>                       
                                    <!-- <td class="itemLista2">
                                       
                                    </li> -->
                                    <td class="itemLista2">
                                        <?php echo $dado->__get('VIO_DESCRICAO'); ?>
                                    </td>
                                    <td class="itemLista2">
                                        <?php echo $dado->__get('FK_CIDADAOS_USU_ID'); ?>
                                    </td>                                                           
                                    <td class="itemLista2">
                                       
                                    <input type="submit" data-id="<?php echo $dado->__get('VIO_ID'); ?>" class="botaoExcluir" value="Excluir" onclick="excluirItem(event)">                                 
                                    </td>                                
                                    </tr>  
                                    <?php } ?>    
                                  </table>          
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script> 
                function excluirItem(event) {
                    event.preventDefault();
                    const id = event.target.getAttribute('data-id');

                    Swal.fire({
                        title: 'Deseja mesmo excluir isto?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Sim',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Faça uma solicitação para excluir o item com o ID
                            fetch(`/dashboard/excluirSetores?id=${id}`, {
                                method: 'DELETE'
                            })
                            .then(response => {
                                if (response.status === 200) {
                                    // Item excluído com sucesso, exiba o segundo Sweet Alert
                                    Swal.fire('O item foi excluído com sucesso!', '', 'success');
                                    window.location.reload();
                                } else {
                                    // Lida com erros, caso haja algum problema na exclusão
                                    Swal.fire('Erro na exclusão!', '', 'error');
                                }
                            })
                            .catch(error => {
                                console.error('Erro na solicitação:', error);
                            });
                        }
                    });
                }

            </script>
        </body>
    </html>                                            

    
