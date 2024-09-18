<div class="col-12 d-flex flex-column align-items-center w-100">
    <h1 class="h3 mb-2 text-gray-800 my-4">Edição de Solicitação de exames</h1>
    <form id="editarExame" class="col-12 col-md-6 col-lg-4" method="POST" action="/exame/editar" enctype="multipart/form-data">
        <div class="form-group">
            <p id="sizeLimitError" class="text-danger font-weight-bold d-none">O arquivo da guia não pode exceder 10 MB</p>
        </div>
        <div class="form-group">
            <label for="nomeExame">Nome do Exame</label>
            <input type="text" class="form-control rounded-pill" required="required" id="nomeExame" name="EXA_NOME" placeholder="Nome do Exame" required value="<?php echo $this->getView()->exame->__get('EXA_NOME'); ?>">
        </div>
        <div class="form-group">
            <label for="dataExame">Data do Exame</label>
            <input type="date" class="form-control rounded-pill" required="required" id="dataExame" format-value="dd-MM-yyyyTHH:mm" name="EXA_DATA_MARCADA" placeholder="Data Marcada" required value="<?php echo $this->getView()->exame->__get('EXA_DATA_MARCADA'); ?>">
        </div>
        <div class="form-group">
            <label for="setor">Horário do Exame</label>
            <?php echo $this->getView()->exame->__get('EXA_HORARIO'); ?>
            <input type="time" class="form-control rounded-pill" required="required" id="horarioExame" placeholder="Setor do Atendimento" name="EXA_HORARIO" required value="<?php echo $this->getView()->exame->__get('EXA_HORARIO'); ?>">
        </div>
        <div class="form-group">
            <label for="guia">Guia de Exame Médico</label>
            <input type="file" class="form-control rounded-pill" accept=".pdf, .jpeg, .png" id="guia" placeholder="Guia de Exame Médico" name="EXA_URL_GUIA_MEDICA">
        </div>
        <div class="form-group">
            <label for="setor">Setor do Atendimento</label>
            <input type="text" class="form-control rounded-pill" required="required" id="setor" placeholder="Setor do Atendimento" name="EXA_SETOR_ATENDIMENTO" required value="<?php echo $this->getView()->exame->__get('EXA_SETOR_ATENDIMENTO'); ?>">
        </div>
        <input type="hidden" name="EXA_ID" value="<?php echo $this->getView()->exame->__get('EXA_ID'); ?>">
        <input class="btn btn-med rounded-pill btn-block" type="submit" value="Enviar">
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

    $('form#editarExame').on('submit', e => {
        if (!tamanhoAutorizadoGuia) e.preventDefault()
    })
</script>