<section id="md8" class="container-fluid">
    <div class="container">
        <center><h2>CADASTRO DE TAREFAS</h2></center>
        <br>
        <form action="/action_page.php">
            <div class="row">
                <div class="col-25">
                    <label for="nometarefa">Nome da Tarefa</label>
                </div>
                <div class="col-75">
                    <input type="text" id="nometarefa" name="nometarefa" placeholder="Nome da Tarefa"/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Descrição</label>
                </div>
                <div class="col-75">
                    <input type="text" id="descricao" name="descricao" placeholder="Descrição">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Data Realização</label>
                </div>
                <div class="col-75">
                    <input type="date" id="datarealizacao" name="datarealizacao">
                </div>
            </div>    
            <div class="row">
                <div class="col-25">
                    <label for="country">Funcionário Responsável</label>
                </div>
                <div class="col-75">
                    <select id="funcionarioresponsavel" name="funcionarioresponsavel">
                        <option value="lindinha">Lindinha</option>
                        <option value="florzinha">Florzinha</option>
                        <option value="docinho">Docinho</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="country">Setor</label>
                </div>
                <div class="col-75">
                    <select id="setor" name="setor">
                        <option value="cozinha">Cozinha</option>
                        <option value="quarto">Quarto</option>
                        <option value="sala">Sala</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">Observações</label>
                </div>
                <div class="col-75">
                    <textarea id="observacoes" name="observacoes" placeholder="Produtos específicos e outros" style="height:200px"></textarea>
                </div>
            </div>
            <br>
            <div class="form-group caixa-pesquisa-div text-center" style="margin-right: 10px;">
                <input type="submit" value="Cadastrar">
            </div>
            <br>
            <br>
            <br>
        </form>
        <br>
        <br>
        <br>
    </div>
</section>