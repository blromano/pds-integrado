<div class="col-12 d-flex flex-column align-items-center w-100">
    <h1 class="h3 mb-2 text-gray-800 my-4">Internação Médica</h1>

    <form action="/internacoes_medicas/inserir" method="post" class="user" class="col-12 col-md-6 col-lg-4">
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" name="NOME_PACIENTE" id="NOME_PACIENTE"
                    placeholder="Nome do Paciente">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="Prontuario"
                    placeholder="Prontuário">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="NomeMedico"
                    placeholder="Nome do Médico">
            </div>
        </div>

        <div class="form-group">
            <p>Causa da Internação</p>
            <textarea class="form-control" name="INM_CAUSAINTERNACAO" id="INM_CAUSAINTERNACAO"></textarea>
        </div>

        <div class="form-group">
            <p>Prescrição Médica</p>
            <input type="file" id="INM_PRESCRICAOMEDICA" name="INM_PRESCRICAOMEDICA">
        </div>

        <div class="form-group">
            <p>Necessidades Clínicas</p>
            <textarea class="form-control" name="INM_NECESSIDADESCLINICAS" id="INM_NECESSIDADESCLINICAS"></textarea>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" name="INM_TEMPOINTERNACAO"
                    id="INM_TEMPOINTERNACAO" placeholder="Tempo de Permacência">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user"
                    name="INM_ACOMPANHAMENTOCLINICO" id="INM_ACOMPANHAMENTOCLINICO" placeholder="Acompanhamento Clínico">
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block btn-med">Enviar</button>
    </form>      
</div>