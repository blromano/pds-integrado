<section id="md8" class="container-fluid">
    <div class="card mb-3" style="width: 100%">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Orçamentos insituição</div>

        <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleButton">Criar novo orçamento</button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Data de vecimento</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Conta de água</td>
                            <td>Conta do mês</td>
                            <td>30/05/2019</td>
                            <td>Paga <i class="fas fa-edit"></i>
                                <i class="fas fa-times"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Conta de Energia</td>
                            <td>Conta do mês</td>
                            <td>27/05/2019</td>
                            <td>Pendente <i class="fas fa-edit"></i>
                                <i class="fas fa-times"></i></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Despesas de limpeza </td>
                            <td>Compra de produtos de limpeza</td>
                            <td>26/05/2019</td>
                            <td>Pendente <i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i>
                                <i class="fas fa-times" data-toggle="modal" data-target="#ModalEX"></i></td>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDIÇÃO DE STATUS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><form>
                        Obs: Se você modificar o status, o Salário será zerado.
                        <select id="funcionarioresponsavel" name="funcionarioresponsavel">
                            <option value="lindinha">Ativo</option>
                            <option value="florzinha">Inativo</option>

                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Confirmar</button>
                </div> 
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalEX" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edição Tarefas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><form>
                        <h3>Tem certeza que quer excluir</h3>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Confirmar</button>
                </div> 
            </div>
        </div>

    </div>
    <div class="modal fade" id="exampleButton" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nova Tarefa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="novoOrçamento">
                        Nome Despesa: <input type="text" palceholder="Novo Orçamento"/>
                    </div>
                    <div id="novoDescricao">
                        Descrição: <input type="text" palceholder="Novo Orçamento"/>
                    </div></br>
                    <div id="novoData">
                        Data de Vencimento: <input type="datetime-local" name="bdaytime">
                    </div>
                    </br>
                    <div id="novoStatus">
                        Status: 
                        <select>
                            <option> Pago </option>
                            <option> Pendente </option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Salvar Tarefa</button>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

