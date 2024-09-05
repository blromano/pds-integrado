<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<div class="card">
    <div class="card-header">
        <div class="row justify-content-between alinhar">
            <div class="">
                <h5 class="title t_a"><?php echo $this->getView()->title; ?></h5>
            </div>
            <div class="">            
                <!-- <a class="a_j" href="http://localhost:8000/dashboard/inserirResponsavel"><button type="button" class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i> Cadastrar</button></a> -->
                <a class="a_j" href="http://localhost:8000/dashboard/cadastrogestores"><button type="button" class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i> Cadastrar</button></a>
            </div>
        </div>
    </div>
    <div class="card-body">

        <div class="form-group search_bar d-flex align-items-center">
            <input id="busca" type="search" class="form-control text_j col-md-11.5" placeholder="Buscar">
            <button id="buscar" type="button" class="btn btn-success btn-sm buscar"><i class="fas fa-search icon"></i></button>
        </div>            
        <table class="table_j table-hover table-sm table-striped">
            <caption>
                <div id="emptyMessage" style="display: none;">
                    <p>Nenhum Responsavel cadastrado</p>
                </div>
                <div id="caption" style="display: none;">
                    <p>Lista de Responsáveis por setor</p>
                </div>
            </caption>
            <thead class="thead">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>                    
                    <th scope="col">Responsavel pelo setor</th>                    
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->getView()->gestoresComSetores as $gestor) { ?>
                    <tr class="residuo-row">
                                                
                        <th scope="row" class="gestor-id" id="<?php echo $gestor['USU_ID']; ?>"><?php echo $gestor['USU_ID']; ?></th>                        
                        <td class="gestor-nome"><?php echo $gestor['USU_NOME']; ?></td>                        

                        <td><?php echo $gestor['SET_NOME']; ?></td>
                        <td>                            
                            <a class="a_j" href=""><button type="button" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i> Editar</button></a>

                            <!-- <a class="a_j" data-id="')">
                                <button type="button" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Excluir
                                </button>
                            </a> -->
                         
                            <a class="a_j" href="/dashboard/excluirResponsavelPrefeitura?id=<?php echo $gestor['USU_ID']; ?>">
                                <button type="button" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Excluir
                                </button>
                            </a>                                                      
                        </td>                        
                    </tr> 
                <?php } ?>                                   
            </tbody>
        </table>
    </div>
</div>


<script> 
    $(document).ready(function() {
    $('#buscar').on('click', function() {
        var busca = $('#busca').val().toLowerCase();

        $('.residuo-row').each(function() {
            var id = $(this).find('.gestor-id').text().toLowerCase();
            var nome = $(this).find('.gestor-nome').text().toLowerCase();

            if (id.indexOf(busca) > -1 || nome.indexOf(busca) > -1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });

        // Exibir mensagem de "Nenhum Responsável cadastrado" se não houver resultados
        if ($('.residuo-row:visible').length === 0) {
            $('#emptyMessage').show();
            $('#caption').hide();
        } else {
            $('#emptyMessage').hide();
            $('#caption').show();
        }
    });
});

</script>

