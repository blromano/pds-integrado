<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row justify-content-between">
                <div class="col">
                    <h5 class="title"><?php echo $this->getView()->title; ?></h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <dialog id="popUp" class="popUp">
                <div class="header_pop">
                    <p class="p_j">Excluir Resíduo</p>
                </div>
                <div class="body_pop">
                    <form class="form_j">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="id">ID</label>
                                <input disabled type="number" class="form-control text_j" value="1">
                            </div>
                            <div class="form-group col-md-10">
                                <label for="nome">Nome</label>
                                <input disabled type="text" class="form-control text_j" placeholder="Nome do resíduo" value="Pilha">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="tipo">Tipo</label>
                            <input disabled list="tipo-residuo" class="form-control text_j" placeholder="Tipo do resíduo" value="Resíduos Sólidos Urbanos">
                            <datalist id="tipo-residuo">
                                <option value="Resíduos Industriais">Lodos gerados por sistemas de tratamento de efluentes líquidos,...</option>
                                <option value="Resíduos Hospitalares">Provenientes de atividades ligadas ao tratamento de saúde,...</option>
                                <option value="Resíduos Sólidos Urbanos">Metais, isopor, espumas,...</option>
                                <option value="Resíduos de Construção Civil">Tijolos, blocos, telhas, argamassa, concreto, placas de revestimento,...</option>
                                <option value="Resíduos Nucleares">Rejeitos radioativos ou contaminados com radionuclídeos,...</option>
                            </datalist>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-7">
                                <button type="button" class="btn btn-danger btn-sm" onclick="closePopUp()"><i class="bi bi-backspace"></i> Cancelar</button>
                                <button type="button" class="btn btn-success btn-sm" onclick="closePopUp()"><i class="bi bi-trash"></i> Confirmar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </dialog>
            <div class="form-row align-items-center search_bar">
                <div class="form-group col-md-7 search_bar">
                    <input type="search" class="form-control text_j" placeholder="Selecionar Ponto">
                </div>
                <div class="form-group search_bar2">
                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-search icon"></i></button>
                </div>
                <div class="form-group col-md-2 search_bar">
                    <select name="filtro" class="form-control filter">
                        <option>Período</option>
                    </select>
                </div>
                <div class="form-group col-md-2 search_bar">
                    <button type="button" class="btn btn-success"><i class="bi bi-stars icon"></i> Limpar</button>
                </div>
            </div>
            <table class="table_j table-hover table-sm">
                <caption>Lista de Resíduos Por Ponto</caption>
                <thead class="thead">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Metal</td>
                        <td>Resíduo Sólido Urbano</td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i> Editar</button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="openPopUp()"><i class="bi bi-trash"></i> Excluir</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Metal</td>
                        <td>Resíduo Sólido Urbano</td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i> Editar</button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="openPopUp()"><i class="bi bi-trash"></i> Excluir</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Metal</td>
                        <td>Resíduo Sólido Urbano</td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i> Editar</button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="openPopUp()"><i class="bi bi-trash"></i> Excluir</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Metal</td>
                        <td>Resíduo Sólido Urbano</td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i> Editar</button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="openPopUp()"><i class="bi bi-trash"></i> Excluir</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    var popUp = document.querySelector('popUp');

    function openPopUp() {
        document.getElementById("popUp").setAttribute("open", "");
    }

    function closePopUp() {
        document.getElementById("popUp").removeAttribute("open");
    }
</script>