<div class="col-12 d-flex flex-column align-items-center w-100">
    <h1 class="h3 mb-2 text-gray-800 my-4">Solicitar Exame</h1>
    <form id="solicitarExame" class="col-12 col-md-6 col-lg-4" method="POST" action="/exame/inserir" enctype="multipart/form-data">
        <div class="form-group">
            <p id="sizeLimitError" class="text-danger font-weight-bold d-none">O arquivo da guia não pode exceder 10 MB</p>
        </div>
        <div class="form-group">
            <label for="nomeExame">Nome do Exame</label>
            <input type="text" class="form-control rounded-pill" required="required" id="nomeExame" placeholder="Nome do Exame" name="EXA_NOME">
        </div>
        <div class="form-group">
            <label for="dataExame">Data do Exame</label>
            <input type="date" class="form-control rounded-pill" required="required" id="dataExame" format-value="dd-MM-yyyyTHH:mm" placeholder="Data e Horário" name="EXA_DATA_MARCADA">
        </div>
        <div class="form-group">
            <label for="setor">Horário do Exame</label>
            <input type="time" class="form-control rounded-pill" required="required" id="horarioExame" placeholder="Setor do Atendimento" name="EXA_HORARIO">
        </div>
        <div class="form-group">
            <label for="guia">Guia de Exame Médico</label>
            <input type="file" class="form-control rounded-pill" accept=".pdf, .jpeg, .png, .jpg" required="required" id="guia" placeholder="Guia de Exame Médico" name="EXA_URL_GUIA_MEDICA">
        </div>
        <div class="form-group">
            <label for="setor">Setor do Atendimento</label>
            <input type="text" class="form-control rounded-pill" required="required" id="setor" placeholder="Setor do Atendimento" name="EXA_SETOR_ATENDIMENTO">
        </div>
        <input class="btn btn-med rounded-pill btn-block" type="submit" value="Enviar" href="solicitar">
    </form>
</div>

<script type="text/javascript">
    const sizeLimitError = $('#sizeLimitError')
    let tamanhoAutorizadoGuia = true
    $('#guia').on('change', function() {
        const tamanho = this.files[0].size / 1024 / 1024 * 1.049 // MB
        if (tamanho > 10) {
            if (sizeLimitError.hasClass('d-none')) sizeLimitError.removeClass('d-none')
            tamanhoAutorizadoGuia = false
        } else {
            if (!sizeLimitError.hasClass('d-none')) sizeLimitError.addClass('d-none')
            tamanhoAutorizadoGuia = true
        }
    });

    $('form#solicitarExame').on('submit', e => {
        if (!tamanhoAutorizadoGuia) e.preventDefault()
    })
</script>