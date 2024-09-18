<div class="col-12 d-flex flex-column align-items-center w-100">
    <h1 class="h3 mb-2 text-gray-800 my-4">Triagem</h1>
    <form action="/triagempresencial/inserir" method="post" class="user" class="col-12 col-md-6 col-lg-4">
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" name="NOME_PACIENTE" id="NOME_PACIENTE"
                    placeholder="João Batista">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="CPF"
                    placeholder="23165435213">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" id="Prontuario"
                    placeholder="AAAA1">
            </div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="NomeEnf"
                placeholder="Gabriela Martins">
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="DataA"><?php echo ("&nbsp&nbsp&nbsp"); ?>Data Atendimento</label>
                <input type="date" class="form-control form-control-user" id="DataA" value="2022-10-25">
            </div>
            <div class="col-sm-6">
                <label for="DataT"><?php echo ("&nbsp&nbsp&nbsp"); ?>Horário Triagem</label>
                <input type="datetime-local" class="form-control form-control-user" name="TRI_HORA_TRIAGEM" id="TRI_HORA_TRIAGEM" value="2022-10-25 16:48">
            </div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="TRI_ENDERECO_SETOR" id="TRI_ENDERECO_SETOR"
                placeholder="Ala 7, Sala 1">
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" name="TRI_PRESSAOSISTOLICA"
                    id="TRI_PRESSAOSISTOLICA" placeholder="Pressão Sistólica" value="13">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user"
                    name="TRI_PRESSAODIASTOLICA" id="TRI_PRESSAODIASTOLICA" placeholder="Pressão Diastólica" value="7">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user"
                name="TRI_PESO" id="TRI_PESO" placeholder="Peso" value="68">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user"
                    name="TRI_ALTURA" id="TRI_ALTURA" placeholder="Altura" value="1,63">
            </div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="TRI_TEMPERATURA" id="TRI_TEMPERATURA"
                placeholder="40°">
        </div>

        <div class="form-group">
            <p>Sintomas</p>
            <textarea class="form-control" name="TRI_SINTOMAS" id="TRI_SINTOMAS">Febre e dor de cabeça.</textarea>
        </div>

        <div class="form-group">
            <p>Alergia</p>
            <textarea class="form-control tarea" name="TRI_ALERGIAS" id="TRI_ALERGIAS">Amendoim.</textarea>
        </div>

        <div class="form-group">
            <p>Informações Adcionais</p>
            <textarea class="form-control tarea" name="TRI_INFORMACOESADICIONAIS" id="TRI_INFORMACOESADICIONAIS">Nenhuma.</textarea>
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
                    <label for="no" checked>Não</label>
                    <span></span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block btn-med">Editar</button>
    </form>
</div>