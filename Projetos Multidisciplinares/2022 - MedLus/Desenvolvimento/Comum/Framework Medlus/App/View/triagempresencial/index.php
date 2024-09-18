<div class="col-12 d-flex flex-column align-items-center w-100">
    <h1 class="h3 mb-2 text-gray-800 my-4">Triagem</h1>
    <form action="/triagem_presencial/inserir" method="post" class="user" class="col-12 col-md-6 col-lg-4">
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" name="NOME_PACIENTE" id="NOME_PACIENTE"
                    placeholder="Nome do Paciente">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="CPF"
                    placeholder="CPF">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" id="Prontuario"
                    placeholder="Prontuário">
            </div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="NomeEnf"
                placeholder="Nome do Enfermeiro">
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="DataA"><?php echo ("&nbsp&nbsp&nbsp"); ?>Data Atendimento</label>
                <input type="date" class="form-control form-control-user" id="DataA">
            </div>
            <div class="col-sm-6">
                <label for="DataT"><?php echo ("&nbsp&nbsp&nbsp"); ?>Horário Triagem</label>
                <input type="datetime-local" class="form-control form-control-user" name="TRI_HORA_TRIAGEM" id="TRI_HORA_TRIAGEM">
            </div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="TRI_ENDERECO_SETOR" id="TRI_ENDERECO_SETOR"
                placeholder="Endereço do Atendimento">
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" name="TRI_PRESSAOSISTOLICA"
                    id="TRI_PRESSAOSISTOLICA" placeholder="Pressão Sistólica">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user"
                    name="TRI_PRESSAODIASTOLICA" id="TRI_PRESSAODIASTOLICA" placeholder="Pressão Diastólica">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user"
                name="TRI_PESO" id="TRI_PESO" placeholder="Peso">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user"
                    name="TRI_ALTURA" id="TRI_ALTURA" placeholder="Altura">
            </div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="TRI_TEMPERATURA" id="TRI_TEMPERATURA"
                placeholder="Temperatura">
        </div>

        <div class="form-group">
            <p>Sintomas</p>
            <textarea class="form-control" name="TRI_SINTOMAS" id="TRI_SINTOMAS"></textarea>
        </div>

        <div class="form-group">
            <p>Alergia</p>
            <textarea class="form-control tarea" name="TRI_ALERGIAS" id="TRI_ALERGIAS"></textarea>
        </div>

        <div class="form-group">
            <p>Informações Adcionais</p>
            <textarea class="form-control tarea" name="TRI_INFORMACOESADICIONAIS" id="TRI_INFORMACOESADICIONAIS"></textarea>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <p class="p1">Atendimento Preferencial:</p>
            </div>
            <div class="toggle-radio">
                <input type="radio" class="d-none" name="TRI_ATENDIMENTOPREFERENCIAL" id="yes">
                <input type="radio" class="d-none" name="TRI_ATENDIMENTOPREFERENCIAL" id="no"checked>
                <div class="switch1">
                    <label for="yes">Sim</label>
                    <label for="no">Não</label>
                    <span></span>
                </div>
            </div>

            <!--<div class="mb-3 mb-sm-0 radios">
                <label for="SIM">SIM</label>
                <input type="radio" id="SIM" name="AtPref" value="SIM">
            </div>
            <div class="radios">
                <label for="NAO">NÃO</label>
                <input type="radio" id="NAO" name="AtPref" value="NÃO">
            </div>-->
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block btn-med">Salvar</button>
    </form>
</div>