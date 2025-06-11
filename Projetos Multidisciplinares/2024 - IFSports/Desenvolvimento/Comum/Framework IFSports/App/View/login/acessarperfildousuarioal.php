<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../resources/css/acessarperfildousuario.css">
</head>
<body>
    <div class="containerzao">
        <div class="event-info-container">
            <h2>Perfil do Usuário</h2>
            <a href="/dashboard/info?id=<?php echo $_SESSION["ID"]; ?>" class="edit-button">
                <i class="fas fa-edit"></i> Editar Informações
            </a>
            <div class="photo-container">
                <img src="/resources/images/fotos-alunos/bruno.png" width="300px">
                <!--<img src="<?php //echo $this->getView()->aluno->__get('ALU_FOTO'); ?>" alt="Foto do Usuário" class="profile-image"> -->
            </div>
            <div>
                <span class="event-info-label">Nome Completo:</span>
                <span class="event-info-value"><?php echo $this->getView()->aluno->__get('ALU_NOME'); ?></span>
            </div>
            <div>
                <span class="event-info-label">Nome Social:</span>
                <span class="event-info-value"><?php echo $this->getView()->aluno->__get('ALU_NOME_SOCIAL'); ?></span>
            </div>
            <div>
                <span class="event-info-label">Prontuário:</span>
                <span class="event-info-value"><?php echo $this->getView()->aluno->__get('ALU_PRONTUARIO'); ?></span>
            </div>
            <div>
                <span class="event-info-label">Campus:</span>
                <span class="event-info-value"><?php echo $this->getView()->aluno->__get('CAM_NOME'); ?></span>
            </div>
            <div>
                <span class="event-info-label">E-mail:</span>
                <span class="event-info-value"><?php echo $this->getView()->aluno->__get('LGN_EMAIL'); ?></span>
            </div>
            <div>
                <span class="event-info-label">Cargo:</span>
                <span class="event-info-value">Estudante</span>
            </div>
        </div>
    </div>
</body>
</html>