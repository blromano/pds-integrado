<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../resources/css/listarmeuseventos.css">
 
</head>
<body>
    <div class="containerzao">
    <div class="event-info-container">
        <h2>Informações do Evento</h2>
        <?php foreach($this->getView()->eventos as $ev) { ?>
        <div>
            <span class="event-info-label">Nome do Evento:</span>
            <span class="event-info-value"><?php echo $ev->__get('EVO_NOME'); ?></span>
        </div>
        <div>
            <span class="event-info-label">Data de Início :</span>
            <span class="event-info-value"><?php echo $ev->__get('EVO_DATA_INICIO'); ?></span>
        </div>
        <div>
            <span class="event-info-label">Data do Fim:</span>
            <span class="event-info-value"><?php echo $ev->__get('EVO_DATA_FIM'); ?></span>
        </div>
        <div>
            <span class="event-info-label">Organizador do Evento:</span>
            <span class="event-info-value"><?php echo $ev->__get('ORE_NOME'); ?> </span>
        </div>
        <div>
            <span class="event-info-label">Status:</span>
            <span class="event-info-value"><?php echo $ev->__get('EVO_STATUS'); ?></span>
        </div>
        <div>
            <span class="event-info-label">Cidade:</span>
            <span class="event-info-value"><?php echo $ev->__get('CID_NOME'); ?></span>
        </div>
        <?php } ?>
    </div>
    <div class="square-container">
        
        <form action="/meus_eventos_aluno/editar_documentos" method="POST">
        <button type="submit" class="square edit" style="outline: none; border:none">
            <i class="fas fa-edit"></i>
            <input type="hidden" name="AIE_ID" id="AIE_ID" value="<?php echo $this->getView()->AIE_ID?>" >
            <div class="bold-text">Editar Inscrição</div></button>
        </form>

        <form action="/meus_eventos_aluno/cancelar_inscricao" method="POST">
        <button type="submit" class="square cancel" style="outline: none; border:none">
            <i class="fas fa-times-circle"></i>
            <input type="hidden" name="AIE_ID" id="AIE_ID" value="<?php echo $this->getView()->AIE_ID?>" >
            <div class="bold-text">Cancelar Inscrição</div></button>
        </form>

        <form action="/dashboard/listarmeuseventos/inscricao_modalidades" method="POST">
        <button type="submit" class="square subscribe" style="outline: none; border:none">
            <i class="fas fa-calendar-alt"></i>
            <input type="hidden" name="EVO_ID" id="EVO_ID" value="<?php echo $_GET['id']?>" >
            <div class="bold-text">Modalidades</div></button>
        </form>
        <form action="/dashboard/meuseventos/justificativa" method="POST">
        <button type="submit" class="square verify" style="outline: none; border:none">
            <i class="fas fa-search"></i>
            <input type="hidden" name="AIE_ID" id="AIE_ID" value="<?php echo $this->getView()->AIE_ID?>" >
            <div class="bold-text">Verificar Justificativa</div></button>
        </form>
        <a href="/eventos/InformarFeedback" class="square feedback">
            <i class="fas fa-comment-dots"></i>
            <div class="bold-text">Informar Feedback</div>
        </a>
        <a href="/dashboard/fotos/enviar" class="square photos">
            <i class="fas fa-camera"></i>
            <div class="bold-text">Enviar Fotos</div>
        </a>
        <a href="URL_DA_VISUALIZAR_DENUNCIAS" class="square reports">
            <i class="fas fa-exclamation-triangle"></i>
            <div class="bold-text">Visualizar Denúncias</div>
        </a>
        <a href="URL_DA_EMITIR_CERTIFICADO" class="square certificate">
            <i class="fas fa-certificate"></i>
            <div class="bold-text">Emitir Certificado</div>
        </a>
        <a href="URL_DA_EMITIR_CRACHA" class="square badge">
            <i class="fas fa-id-badge"></i>
            <div class="bold-text">Emitir Crachá</div>
        </a>
        <a href="URL_DA_ESCOLHER_OUTRO_EVENTO" class="square choose-event">
            <i class="fas fa-sign-in-alt"></i>
            <div class="bold-text">Escolher Outro Evento</div>
        </a>
    </div>
    </div>
</body>
</html>
