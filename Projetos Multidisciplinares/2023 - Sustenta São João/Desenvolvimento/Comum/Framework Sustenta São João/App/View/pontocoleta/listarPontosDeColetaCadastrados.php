<div class="card">
    <div class="card-header">
        <div class="row justify-content-between alinhar">
            <div class="">
                <h5 class="title t_a">
                    <?php echo $this->getView()->title; ?>
                </h5>
            </div>
            <div class="">
                <a class="a_j" href="/dashboard/cadastrarPontoColeta"><button type="button"
                        class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i> Registrar</button></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group search_bar d-flex align-items-center">
            <input id="busca" type="search" class="form-control text_j col-md-11.5" placeholder="Buscar">
            <button id="buscar" type="button" class="btn btn-success btn-sm buscar"><i
                    class="fas fa-search icon"></i></button>
        </div>
        <div class="table-responsive">
            <table class="table_j table-hover table-sm table-striped">
                <thead class="thead">
                    <tr>
                        <th class="nowrap" scope="col">Proprietário</th>
                        <th class="nowrap" scope="col">CPF</th>
                        <th class="nowrap" scope="col">RG</th>
                        <th class="nowrap" scope="col">Rua do Proprietário</th>
                        <th class="nowrap" scope="col">Número do Proprietário</th>
                        <th class="nowrap" scope="col">Bairro do Proprietário</th>
                        <th class="nowrap" scope="col">CEP do Proprietário</th>
                        <th class="nowrap" scope="col">Logradouro do Proprietário</th>
                        <th class="nowrap" scope="col">Telefone do Proprietário</th>
                        <th class="nowrap" scope="col">Ponto de Coleta</th>
                        <th class="nowrap" scope="col">Rua do Ponto</th>
                        <th class="nowrap" scope="col">Número do Ponto</th>
                        <th class="nowrap" scope="col">Bairro do Ponto</th>
                        <th class="nowrap" scope="col">CEP do Ponto</th>
                        <th class="nowrap" scope="col">Logradouro do Ponto</th>
                        <th class="nowrap" scope="col">Latitude</th>
                        <th class="nowrap" scope="col">Longitude</th>
                        <th class="nowrap" scope="col">Telefone do Ponto</th>
                        <th class="nowrap" scope="col">CNPJ</th>
                        <th class="nowrap" scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->getView()->pontoColeta as $dado) { ?>
                        <tr>
                            <td class="nowrap">
                                <?php echo $dado->__get('PRO_NOME'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PRO_CPF'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PRO_RG'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PRO_RUA'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PRO_NUMERO'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PRO_BAIRRO'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PRO_CEP'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PRO_LOGRADOURO'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PRO_TELEFONE'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PCO_NOME'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PCO_RUA'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PCO_NUMERO'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PCO_BAIRRO'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PCO_CEP'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PCO_LOGRADOURO'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PCO_LATITUDE'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PCO_LONGITUDE'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PCO_TELEFONE'); ?>
                            </td>
                            <td class="nowrap">
                                <?php echo $dado->__get('PCO_CNPJ'); ?>
                            </td>
                            <td class="nowrap">
                                <a class="a_j" href="/dashboard/editarPontoColeta?id=<?php echo $dado->__get("PCO_ID"); ?>">
                                    <button type="button" class="btn btn-info btn-sm">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="openPopup()">
                                    <i class="bi bi-pencil-square"></i> Excluir
                                </button>
                            </td>
                        </tr>
                        <div class="container">
                            <div class="popup" id="popup">
                                <h2>Deseja excluir o Ponto de Coleta?</h2>
                                <a class="a_j"
                                    href="/dashboard/excluirPontoColeta?id=<?php echo $dado->__get("PCO_ID"); ?>">
                                    <button type="button" class="btn btn-danger btn-sm">Sim</button>
                                </a>
                                <button type="button" class="btn btn-info btn-sm" onclick="closePopup()">Não</button>
                            </div>
                            <script>
                                let popup = document.getElementById("popup");

                                function openPopup() {
                                    popup.classList.add("open-popup");
                                }

                                function closePopup() {
                                    popup.classList.remove("open-popup");
                                }
                            </script>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>