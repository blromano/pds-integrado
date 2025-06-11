<html>

<script>
function alertarEnvio()
{
alert("Conteúdo enviado com sucesso!");
window.location.href = "/meus_eventos_aluno";
}
function redirecionarMeusEventosAluno() {
    window.location.href = "/meus_eventos_aluno";
}

</script>
<style>
    .text-center {
    text-align: center;
}

.container {
    width: 60%;
    height: 60%;
    margin-left: auto;
    margin-right: auto;
    margin-top: 30px;
}

.form-container {
    width: 100%;
    height: 100%;
    border-radius: 30px;
    border-left: -50px;
}

.justificativa-label {
    margin-left: 5%;
}

.textarea {
    width: 90%;
    height: 90%;
    border-color: lightgray;
    border-style: solid;
    border-radius: 5px;
    margin-right: auto;
    margin-left:auto
}

.link-btn {
    margin-left: auto;
}

.btn-enviar {
    width: 150px;
    height: 50px;
    margin-left: 36.7%;
    margin-top:10px;
    background-color: #3BBFC3;
    border-color: #3BBFC3;
}
    </style>


    <head>
        <link rel="stylesheet" type="text/css" href="cancelarinscricao.css">
    </head>
    <body>
        <h1 class="text-center">Cancelar Inscrição</h1>
        <div class="container">
            <h4 class="text-center">Você tem certeza que deseja cancelar sua inscrição nesse evento?</h4>
            <form class="form-container">
                <h4 class="justificativa-label">Justificativa:</h4>
                <textarea name="" id="" cols="130" rows="10" class="textarea"></textarea>
            </form>
                <button type="button" class="btn btn-dark btn-enviar" onclick="alertarEnvio()">
                    <h4>Enviar</h4>
                </button>
                <button type="button" class="btn btn-dark btn-enviar" onclick="redirecionarMeusEventosAluno()">
                    <h4>Cancelar</h4>
                </button>
        </div>
    </body>
</html>