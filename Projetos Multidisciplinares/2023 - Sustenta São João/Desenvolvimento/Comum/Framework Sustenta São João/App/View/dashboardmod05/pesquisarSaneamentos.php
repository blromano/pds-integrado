<html>
    <head>
        <!--Bibliotecas -Sweet Alert-->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.js"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.css">        
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

            <style>
    

  </style>
        </head>
    <body>
        <div class="content">        
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title"><?php echo $this->getView()->title; ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="areaDePesquisa">
                                <form class="formularioPesquisa">
                                    <p>
                                    Pesquisar:<input style='margin-left:10px' type="text" name="pesquisarSetore" value="Redes de Esgoto">
                                    <input type="submit" value="Pesquisar" >
                                    </p>
                                    <p>                               
                                        <button type="submit" class="botaoAdicionar" onclick="abrirNovaGuia('inserirSaneamentos')"><i class="fas fa-plus"></i> Adicionar</button>
                                    </p>
                                </form>
                            </div>
                            <div class="container-MOD5">                        
                                <form>
                                    <ul class="elementos">
                                        <li class="itemLista1">
                                            Nome do Saneamento
                                        </li>                        
                                        <li class="itemLista1">
                                            Data de Criação
                                        </li>                                                                
                                        <li class="itemLista1">
                                            Nome do tipo de Saneamento
                                        </li> 
                                        <li class="itemLista1">
                                            Ações
                                        </li> 
                                    </ul>                      
                                    <ul class="elementos">
                                        <li class="itemLista2">
                                            Redes de Esgoto
                                        </li>                        
                                        <li class="itemLista2">
                                            05/03/2004
                                        </li>     
                                        <li class="itemLista2">
                                            Coleta e descarte de Esgoto
                                        </li>                                                        
                                        <li class="itemLista2">
                                            <button class="bnt-excluir"><i class="fas fa-trash-alt" id=botaoExcluir></i></button>                                          
                                            <button class="bnt-engrenagem" id="abrirAlert"><i class="fas fa-cog"></i></button>                            
                                            <!-- <button class="bnt-engrenagem" onclick="abrirSweetAlert()" id=botaoEditar><i class="fas fa-cog"></i></button>                             -->
                                        </li>                                
                                    </ul>                                             
                                </form>                                                                                         
                            </div>
                        </div>    
                    </div>
                </div>
            </div>      
        </div>      

        <div class="sweetAlertMOD05">
            <div class="sweet-alert-overlay" id="sweetAlert1">
                <div class="sweet-alert">
                <h1>Alterar Saneamentos</h1>
                <form class="formulario">
                    <fieldset>
                    <div class="elementosLabel">
                        <label>Nome do Saneamento</label>
                        <input type="text" value="Redes de Esgoto">
                    </div>
                    <div class="elementosLabel">
                        <label>Data de Criação</label>
                        <input type="text" value="05/03/2004">
                    </div>
                    <div class="elementosLabel">
                        <label>Nome do Tipo de Saneamento</label>
                        <input type="text" value="Coleta e descarte de Esgoto">
                    </div>
                    <input type="submit" value="Alterar" id="alterar">
                    <input type="submit" value="Fechar" id="fecharAlert">
                    
                    </fieldset>
                </form>            
                <!-- <button id="closeAlert">Fechar</button> -->
                </div>
            </div>
        </div>
        
        <script>

        // Seleciona o botão Excluir/Editar pelo ID        
            var botaoExcluir = document.getElementById('botaoExcluir');
            botaoExcluir.addEventListener('click', function() {
            
            event.preventDefault(); // Impede o envio padrão do formulário
            Swal.fire({
                title: 'Tem certeza?',
                text: 'Você deseja mesmo excluir esse tipo de Saneamento?',
                html:    
                '<div class="sweetEstilo">' +
                '<p class="sweetConteudo">Nome:Antônio</p>' +
                '<p class="sweetConteudo">Setor Responsável:Descarte</p>' + 
                '</div>',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    Swal.fire(
                        'Excluído!',
                        'O item foi excluído com sucesso.',
                        'success'
                        );
                    }
                });
            });

            function abrirNovaGuia(url) {
                window.open(url, '_blank');
            }

        </script>
        
        <script>
            function abrirSweetAlert() {

                event.preventDefault();
                Swal.fire({
                    title: 'Alterar Dados',
                    html:    
                    '<div class="sweetEstilo">' +
                    'Nome<input type="text" id="nomeFuncionario" placeholder="" class="swal2-input" value="Wilson"></br>' +
                    'Data de Nasc.<input type="text" id="dataNascimento" placeholder="" class="swal2-input" value="20/08/2004"></br>' + 
                    'Setor Responsável<input type="text" id="setorResponsavel" placeholder="" class="swal2-input" value="Descarte de Resíduos"></br>' + 
                    '</div>',
                    showCancelButton: true,
                    confirmButtonText: 'Alterar',
                    cancelButtonText: 'Cancelar',
                    preConfirm: () => {
                        const nomeFuncionario = Swal.getPopup().querySelector('#nomeFuncionario').value;
                        const dataNascimento = Swal.getPopup().querySelector('#dataNascimento').value;
                        const setorResponsavel = Swal.getPopup().querySelector('#setorResponsavel').value;
                        if (!nomeFuncionario || !dataNascimento || !setorResponsavel) {
                            Swal.showValidationMessage('Preencha todos os campos');
                            return false;
                        }
                        return { nomeFuncionario: nomeFuncionario, dataNascimento: dataNascimento, setorResponsavel:setorResponsavel };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        const nomeFuncionario = result.value.nomeFuncionario;
                        const dataNascimento = result.value.dataNascimento;
                        const setorResponsavel = result.value.setorResponsavel;
                        // Aqui você pode fazer algo com os dados inseridos, como enviar uma solicitação AJAX para processamento.
                        Swal.fire(`Dados alterados:</br> Nome do Funcionário - ${nomeFuncionario} ,</br> Data de Nasc. - ${dataNascimento},</br> Setor Responsável - ${setorResponsavel}`);
                    }
                });
            }
        </script>


        <script>
            const botaoAbrir = document.getElementById('abrirAlert');
            const botaoFechar = document.getElementById('fecharAlert');
    
            const sweetAlert1 = document.getElementById('sweetAlert1');
    

            //Adciona um evendo de click ao botão abrir/fechar
            botaoAbrir.addEventListener('click', () => {
            sweetAlert1.style.display = 'block';
            event.preventDefault();
            //.style.display = 'block' , a função torna o display: none da div em block, ou seja, o conteúdo passa a ser visto
            });

            botaoFechar.addEventListener('click', () => {
            overlay.style.display = 'none';
            event.preventDefault();
            //permite que o conteúdo seja fechado, já que o display fica = 'none'
            });

        </script>


    </body>
</html>                                            





 
