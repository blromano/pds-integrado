
<style>
  .titulo {
    text-align: center;
}

.tabela {
    width: 60%;
    margin-left: auto;
    margin-right: auto;
}

.subtitulo {
    text-align: center;
    margin-left: auto;
    margin-right: auto;
}

.botao {
    background-color: #3BBFC3;
    border-color: #3BBFC3;
    margin-left: auto;
    margin-right: auto;
}

.botoes {
    width: 100%;
    text-align: center;
    margin-top: 30px;
}

.enviar, .cancelar {
    width: 150px;
    height: 50px;
    background-color: #3BBFC3;
    border-color: #3BBFC3;
    margin: 0 10px;
}
  </style>

<html>

<script>
function alertarEnvio() {
    alert("Conteúdo enviado com sucesso!");
    window.location.href = "/dashboard/eventos/listar";
}

function redirecionarListarEventos() {
    window.location.href = "/dashboard/eventos/listar";
}

function uploadFile() {
    const formData = new FormData(document.getElementById('uploadForm'));
    
    fetch('upload.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('message').innerText = data;
    })
    .catch(error => {
        console.error('Erro:', error);
    });
}
</script>

<body>
    <h1 class="titulo">Envio de Documentos</h1>

    <table class="table table-bordered tabela">
    <form id="uploadForm" enctype="multipart/form-data" action="/listar_eventos/inscricao/inserir" method="POST">
        <tbody>
            <tr>
                <td>
                    <h4 class="subtitulo">Boletim Escolar</h4>
                </td>
                <td>
                    <center><input type="text" class="form-control" id="AIE_BOLETIM_ESCOLAR" name="AIE_BOLETIM_ESCOLAR" placeholder="Boletim escolar"></center>
                </td>
            </tr>
            <tr>
                <td>
                    <h4 class="subtitulo">Foto Pessoal</h4>
                </td>
                <td>
                    <center><input type="text" class="form-control" id="AIE_FOTO_PESSOAL" name="AIE_FOTO_PESSOAL" placeholder="Foto Pessoal"></center>
                </td>
            </tr>
            <tr>
                <td>
                    <h4 class="subtitulo">Cópia do RG</h4>
                </td>
                <td>
                    <center><input type="text" class="form-control" id="AIE_COPIA_RG" name="AIE_COPIA_RG" placeholder="Copia do RG"></center>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="botoes">
        <button type="submit" class="btn btn-dark enviar" ><h4>Enviar</h4></button>
        <button type="button" class="btn btn-dark cancelar" onclick="redirecionarListarEventos()"><h4>Cancelar</h4></button>
    </div>
    </form>
</body>

</html>