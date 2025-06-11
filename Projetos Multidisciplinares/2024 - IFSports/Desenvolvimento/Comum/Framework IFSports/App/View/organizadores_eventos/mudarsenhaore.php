<link rel="stylesheet" href="../../resources/css/modalidades.css">
<div class="formcentralize">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo $this->getView()->title ?></h4><br><br>

                <form action="/dashboard/organizadores_eventos/atualizarsenhaore" class="forms-sample" method="POST" onsubmit="return validateForm()">

                    <div class="form-group">
                        <label for="LGN_SENHA">Nova Senha do Secretario</label>
                        <input type="password" class="form-control" id="LGN_SENHA" name="LGN_SENHA" placeholder="Nova Senha" value="" require>
                    </div><br>

                    <div class="form-group">
                        <label for="LGN_SENHA_CONFIRMACAO">Confirme a Nova Senha do Secretario</label>
                        <input type="password" class="form-control" id="LGN_SENHA_CONFIRMACAO" name="LGN_SENHA_CONFIRMACAO" placeholder="Confirmar Senha" value="" require>
                    </div><br>
                
                    <input type="hidden" id="LGN_ID" name="LGN_ID" value="<?php echo $this->getView()->LGN_ID; ?>">

                    <input type="submit" class="btn btn-primary mr-2" value="Salvar">
                    <a href="/dashboard/secretarios_eventos/listar" class="btn btn-danger">Cancelar</a>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        var senha = document.getElementById("LGN_SENHA").value;
        var confirmacao = document.getElementById("LGN_SENHA_CONFIRMACAO").value;

        if (senha !== confirmacao) {
            alert("As senhas não coincidem. Por favor, tente novamente.");
            return false;
        }

        if (senha.trim() === "") {
            alert("Por favor, insira a nova senha.");
            return false;
        }

        return true;
    }
</script>
