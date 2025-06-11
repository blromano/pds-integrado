<br><BR></BR>

<link rel="stylesheet" href="../../resources/css/mod05.css">
<form id="fotoForm" method="POST" enctype="multipart/form-data" action="/dashboard/fotos/enviar">
    <!-- Campos Hidden -->
    <input type="hidden" id="FK_EVENTOS_EVO_ID" name="FK_EVENTOS_EVO_ID" value="2">
    <input type="hidden" id="FK_ALUNOS_ALU_ID" name="FK_ALUNOS_ALU_ID" value="2">
    
    <div class="column">
        <h1 class="text-center mb-4">ENVIAR FOTOS</h1>
        <div id="uploadContainer">
            <div class="form-row" id="line1">
                <div class="preview" id="preview1">
                    <i class="fas fa-image"></i>
                </div>
                <!--<label for="file-upload1" class="escolher-arquivo">Escolher arquivo</label>-->
                <input type="file" id="file-upload1" name="FTS_ARQUIVO[]" onchange="previewImage(this,'preview1')" accept="image/*" required>
                <div class="form-group">
                    <input type="datetime-local" id="FTS_DATE" name="FTS_DATE[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control description" id="FTS_LEGENDA" name="FTS_LEGENDA[]" placeholder="Descrição" maxlength="200" required>
                </div>
                <button type="button" class="btn btn-danger" onclick="removeLine(this)">
                    <i class="fas fa-trash icon"></i> Remover
                </button>
            </div>
        </div>
        <div class="footer-buttons">
            <button type="submit" class="btn add-button" id="submitButton">Enviar fotos</button>
        </div>
    </div>
</form>


<script>
    let lineCount = 1;

    function previewImage(input, previewId) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewElement = document.getElementById(previewId);
                previewElement.innerHTML = ''; // Remove o ícone
                previewElement.style.backgroundColor = 'transparent';
                const img = new Image();
                img.src = e.target.result;
                img.className = 'preview';
                previewElement.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    }

    function addNewLine() {
        if (lineCount < 5) {
            lineCount++;
            const newLine = document.createElement('div');
            newLine.classList.add('form-row');
            newLine.id = 'line' + lineCount;
            const previewId = 'preview' + lineCount;
            const fileInputId = 'file-upload' + lineCount;
            newLine.innerHTML = `
                    <div class="preview" id="${previewId}">
                        <i class="fas fa-image"></i>
                    </div>
                    <label for="${fileInputId}" class="escolher-arquivo">Escolher arquivo</label>
                    <input type="file" id="${fileInputId}" onchange="previewImage(this, '${previewId}')" accept="image/*" required>
                    <div class="form-group">
                        <input type="datetime-local" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control description" placeholder="Descrição" maxlength="200" required>
                    </div>
                    <button type="button" class="btn btn-danger" onclick="removeLine(this)">
                        <i class="fas fa-trash icon"></i> Remover 
                    </button>
                `;
            document.getElementById('uploadContainer').appendChild(newLine);
        } else {
            Swal.fire({
                title: "Atenção",
                text: "Você só pode adicionar até 5 fotos.",
                icon: "warning",
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
            });
        }
    }

    function removeLine(button) {
        const line = button.closest('.form-row');
        line.remove();
        lineCount--;
    }

    document.getElementById('submitButton').addEventListener('click', function() {
        const rows = document.querySelectorAll('.form-row');
        let allFieldsFilled = true;
        let formData = new FormData();
        let files = [];
        
        rows.forEach((row, index) => {
            const dateInput = row.querySelector('input[type="datetime-local"]');
            const descInput = row.querySelector('input[type="text"]');
            const fileInput = row.querySelector('input[type="file"]');
            
            if (!dateInput.value || !descInput.value || !fileInput.files[0]) {
                allFieldsFilled = false;
            } else {
                formData.append('files[]', fileInput.files[0]);  // Adiciona o arquivo à FormData
                formData.append('dates[]', dateInput.value);
                formData.append('descriptions[]', descInput.value);
            }
        });

        if (!allFieldsFilled) {
            Swal.fire({
                title: "Erro",
                text: "Preencha todos os campos e selecione as imagens!",
                icon: "error",
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
            });
        } else {
            Swal.fire({
                title: "Enviando...",
                text: "Por favor, aguarde enquanto as fotos são enviadas.",
                icon: "info",
                showConfirmButton: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Enviar as imagens via AJAX
            fetch('/dashboard/fotos/enviar', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                Swal.fire({
                    title: "Sucesso",
                    text: data.message,
                    icon: "success",
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                }).then(() => {
                    location.reload(); // Recarrega a página após o envio
                });
            })
            .catch(error => {
                Swal.fire({
                    title: "Erro",
                    text: "Ocorreu um erro ao enviar as fotos.",
                    icon: "error",
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                });
            });
        }
    });
</script>