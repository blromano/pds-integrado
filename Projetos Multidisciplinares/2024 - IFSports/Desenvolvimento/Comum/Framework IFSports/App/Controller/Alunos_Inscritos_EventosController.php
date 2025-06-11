<?php

    namespace App\Controller;

    use FW\Controller\Action;
    use App\Model\Alunos_Inscritos_EventosModel;
    use App\DAO\Alunos_Inscritos_EventosDAO;
    use App\DAO\AlunosDAO;
    use TCPDF; // Importa a biblioteca TCPDF

    class Alunos_Inscritos_EventosController extends Action{

        public function listarmeuseventos(){ 
            $title = "Meus Eventos - Dashboard";
            $texto = "";
            $icone_editar='<i class="ti-file btn-icon-append"></i>';

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;

            $alunosinscritoseventosDAO = new Alunos_Inscritos_EventosDAO();
            $meuseventos = $alunosinscritoseventosDAO->listarmeuseventos($_SESSION['ID']);
            $this->getView()->eventos = $meuseventos;
            $this->render('listarmeuseventos','dashboard');
        }

        public function meuseventos(){ 
            $title = "Meus Eventos - Dashboard";
            $texto = "";
            $icone_editar='<i class="ti-file btn-icon-append"></i>';

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;
            $AIE_ID = $_POST['AIE_ID'];
            $this->getView()->AIE_ID = $AIE_ID;

            $alunosinscritoseventosDAO = new Alunos_Inscritos_EventosDAO();
            $meuseventos = $alunosinscritoseventosDAO->meuseventos($_GET['id']);
            $this->getView()->eventos = $meuseventos;
            $this->render('meuseventos','dashboard');
        }

        //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada
        public function verificarInscricaoAluno(){         
            $title = "Listar inscrições de Alunos";
            $texto = "";
            $icone_editar='<i class="ti-file btn-icon-append"></i>';
            

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;
            
            
            $alunos_inscritos_evento = new Alunos_Inscritos_EventosDAO();
            $alunos_inscritos_eventos = $alunos_inscritos_evento->ListarAlunosInscritosEventos($_GET['EVO_ID']);
            //print_r($alunos_inscritos_eventos);
            //exit();
            $this->getView()->alunos_inscritos_eventos = $alunos_inscritos_eventos;
            $this->render('verificarInscricaoAluno','dashboard');
        }
    
        

        public function homologarInscricaoAluno(){
            $title = "Verificar Inscrição de Aluno";
            $texto = "";
            $icone_editar='<i class="ti-file btn-icon-append"></i>';
            

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;
            
            $alunos_inscritos_evento = new alunos_inscritos_eventosDAO();
            $alunos_inscritos_eventos = $alunos_inscritos_evento->buscarPorId($_GET['AIE_ID']);
            
            $this->getView()->alunos_inscritos_eventos = $alunos_inscritos_eventos;
            $this->render('homologarInscricaoAluno','dashboard');
        }

        public function naoHomologarAluno(){
            $title = "Não Homologar Inscrição de Aluno";
            $texto = "";

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            
            $alunos_inscritos_evento = new alunos_inscritos_eventosDAO();
            $alunos_inscritos_eventos = $alunos_inscritos_evento->buscarPorId($_GET['AIE_ID']);
            
            $this->getView()->alunos_inscritos_eventos = $alunos_inscritos_eventos;
            $this->render('naoHomologarAluno','dashboard');
        }
        public function inserirAluno() {
        }      
        public function justificativa(){             
            
            $alunos_inscritos_eve = new Alunos_Inscritos_EventosModel();

            $alunos_inscritos_eve = new Alunos_Inscritos_EventosDAO();

            $alunos_inscritos_eve-> __set('AIE_JUSTIFICATIVA', $_POST['AIE_JUSTIFICATIVA']);
            $alunos_inscritos_eventosDAO->justificativa($alunos_inscritos_eve);
        }
        public function listar(){       
            
            $title = "Listagem de Alunos Inscritos no Evento - Dashboard";
            $texto = "";
            
            $this->getView()->title = $title;
            $this->getView()->texto = $texto;

            $aluno_inscrito_eventoDAO = new Alunos_Inscritos_EventosDAO();
            $alunos_inscritos_eventos = $aluno_inscrito_eventoDAO->AlunosInscritosEventos($_GET['EVO_ID']);

            $this->getView()->alunos_inscritos_eventos = $alunos_inscritos_eventos;


            $this->render('listar','dashboard');
        }

        public function inscricaoEvento(){   
            $title = "Inscrição em Evento";
            $texto = "Placeholder";

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;          
            $this->render('inscricaoEvento','dashboard');
        }

        public function inserir() {
            $inscricao_alu_eve = new Alunos_Inscritos_EventosModel();
            
            // Pasta onde os arquivos serão armazenados
            $uploadDir = __DIR__ . '/uploads/documentos';            
            // Cria o diretório, se não existir
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            chmod($uploadDir, 0777);
    
            // Função auxiliar para salvar o arquivo e retornar o nome salvo
            function salvarArquivo($campo, $destino) {
                // Verifica se o arquivo foi enviado e se não houve erro no upload
                try {
                    // Obtém o caminho temporário e o nome original do arquivo
                    $arquivoTemp = $_FILES[$campo]['tmp_name'];
                    $nomeOriginal = basename($_FILES[$campo]['name']);
                    
                    // Gera um nome único para o arquivo para evitar sobrescrever arquivos existentes
                    $nomeArquivo = uniqid() . '_' . $nomeOriginal;
                    
                    // Verifica se o diretório de destino existe, se não, cria o diretório
                    if (!is_dir($destino)) {
                        mkdir($destino, 0777, true);
                    
                    
                    // Define o caminho completo do arquivo no destino
                    $caminhoDestino = $destino . DIRECTORY_SEPARATOR . $nomeArquivo;
                    
                    // Move o arquivo do diretório temporário para o diretório de destino                        // Retorna o nome do arquivo salvo
                        return $nomeArquivo;
                    } 
                } catch (Exception $e) {
                    // Exibe erro caso ocorra
                    die('Erro: ' . $e->getMessage());
                }
            }
            
            
            
        
            try {

                // Salvar arquivos e definir os nomes no modelo
                $inscricao_alu_eve->__set("AIE_BOLETIM_ESCOLAR", salvarArquivo('AIE_BOLETIM_ESCOLAR', $uploadDir));
                $inscricao_alu_eve->__set("AIE_FOTO_PESSOAL", salvarArquivo('AIE_FOTO_PESSOAL', $uploadDir));
                $inscricao_alu_eve->__set("AIE_COPIA_RG", salvarArquivo('AIE_COPIA_RG', $uploadDir));
                $inscricao_alu_eve->__set("AIE_AUTORIZACAO_PAIS", salvarArquivo('AIE_AUTORIZACAO_PAIS', $uploadDir));
        
                // Configuração adicional
                $alunosDAO = new AlunosDAO();
                $alunoModel = $alunosDAO->BuscarAlunoLogado($_SESSION['ID']); // $alunoModel->__get('ALU_ID')
                $inscricao_alu_eve->__set("AIE_ATIVO", '1');
                $inscricao_alu_eve->__set("AIE_HOMOLOGA", null);
                $inscricao_alu_eve->__set("AIE_JUSTIFICATIVA", null); // Ajuste conforme necessário
                $inscricao_alu_eve->__set("FK_ALUNOS_ALU_ID", $alunoModel->__get('ALU_ID')); // Ajuste conforme necessário
                $inscricao_alu_eve->__set("FK_EVENTOS_EVO_ID", $_POST['EVO_ID']); // Ajuste conforme necessário
        
                // Salva no banco de dados
                $Alunos_Inscritos_EventosDAO = new Alunos_Inscritos_EventosDAO();
                $Alunos_Inscritos_EventosDAO->inserir($inscricao_alu_eve);
        
                // Redireciona após o sucesso
                header('Location: /dashboard/listarmeuseventos');
            } catch (Exception $e) {
                // Exibe erro caso ocorra
                die('Erro: ' . $e->getMessage());
            }
        }
        

        
        public function cancelarInscricao(){   
            $title = "Cancelar inscrição em evento";
            $texto = "Placeholder";
            $aluno_inscrito_eventoDAO = new Alunos_Inscritos_EventosDAO();
            $nomeEvento = $aluno_inscrito_eventoDAO->getNomeEventoPorAIE($_POST['AIE_ID']);
            $this->getView()->title = $title;
            $this->getView()->texto = $texto;      
            $this->getView()->nomeEvento = $nomeEvento;    
            $this->render('cancelarInscricao','dashboard');
        }

        public function desativarInscricao() {
            // Verifica se a requisição é do tipo POST
                $AIE_ID = $_POST['AIE_ID']; // ID do evento a ser cancelado
                $AIE_JUSTIFICATIVA = $_POST['AIE_JUSTIFICATIVA']; // Justificativa fornecida pelo usuário
        
                    $alunosInscritosEventosDAO = new Alunos_Inscritos_EventosDAO();
        
                    try {
                        $alunosInscritosEventosDAO->desativarInscricao($AIE_ID, $AIE_JUSTIFICATIVA);
                        header("Location: /dashboard/listarmeuseventos");
                        exit;
                    } catch (\Exception $e) {
                        // Mensagem de erro em caso de falha
                        $_SESSION['error'] = "Erro ao cancelar a inscrição: " . $e->getMessage();
                    }
        }
                
        

        public function editarDocumentos() {   
            $title = "Editar documentação enviada";
            $texto = "Placeholder";
        
            $this->getView()->title = $title;
            $this->getView()->texto = $texto;          
        
            $AIE_ID = $_POST['AIE_ID'];  // Valor fixo para testes, se for dinâmico, deve ser capturado de outro lugar, como $_POST ou $this->getRequest()->get('AIE_ID')
            
            $aluno_inscrito_eventoDAO = new Alunos_Inscritos_EventosDAO();
            
            // Captura o retorno da função listarDocumentosPorAIE_ID
            $documentos = $aluno_inscrito_eventoDAO->listarDocumentosPorAIE_ID($AIE_ID);
        
            // Passa o resultado para a view
            $this->getView()->documentos = $documentos;
            
            // Renderiza a view
            $this->render('editarDocumentos', 'dashboard');
        }

        public function baixarDocumento() {
            try {
                // Recebe o nome do arquivo via GET ou POST
                $nomeArquivo = urldecode($_GET['file']);
        
                // Caminho do diretório onde os arquivos estão armazenados
                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '../../../resources/uploads/documentos/'; // Ajuste conforme necessário
        
                // Caminho completo do arquivo
                $caminhoArquivo = $uploadDir . $nomeArquivo;
        
                // Depuração
                echo "Caminho do arquivo: " . $caminhoArquivo;
        
                // Verifica se o arquivo existe
                if (file_exists($caminhoArquivo)) {
                    // Força o download do arquivo
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="' . basename($caminhoArquivo) . '"');
                    header('Content-Length: ' . filesize($caminhoArquivo));
                    readfile($caminhoArquivo);  // Lê o arquivo e envia para o navegador
                    exit;
                } else {
                    throw new Exception('Arquivo não encontrado.');
                }
            } catch (Exception $e) {
                // Caso haja erro, mostra uma mensagem
                echo "Erro: " . $e->getMessage();
            }
        }
        


        public function pdf_lista(){   
            $title = "-";
            $texto = "-";

            

            $aluno_inscrito_eventoDAO = new Alunos_Inscritos_EventosDAO();
            $alunos_inscritos_eventos = $aluno_inscrito_eventoDAO->AlunosInscritosEventos($_GET['AIE_ID']);

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;     
            $this->getView()->alunos_inscritos_eventos = $alunos_inscritos_eventos;     
           $this->render('pdf_lista','');
        }

        public function pdf_aluno(){   
            $title = "-";
            $texto = "-";

            

            $aluno_inscrito_eventoDAO = new Alunos_Inscritos_EventosDAO();
            $alunos_inscritos_eventos = $aluno_inscrito_eventoDAO->AlunosInscritosEventos($_GET['EVO_ID']);

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;     
            $this->getView()->alunos_inscritos_eventos = $alunos_inscritos_eventos;     
           $this->render('pdf_aluno','');
        }

        public function inserirDocumentos() {
            $AIE_ID = $_POST['AIE_ID'] ?? $_GET['AIE_ID'];
            
            $aluno_inscrito_eventoDAO = new Alunos_Inscritos_EventosDAO();
            $documentos = $aluno_inscrito_eventoDAO->listarDocumentosPorAIE_ID($AIE_ID);
        
            $campos = [
                'AIE_COPIA_RG',
                'AIE_BOLETIM_ESCOLAR',
                'AIE_FOTO_PESSOAL',
                'AIE_AUTORIZACAO_PAIS'
            ];
        
            // Processar cada campo
            foreach ($campos as $campo) {
                if (isset($_FILES[$campo]) && $_FILES[$campo]['error'] == UPLOAD_ERR_OK) {
                    // Substitui o arquivo
                    $aluno_inscrito_eventoDAO->salvarDocumento($_FILES[$campo], $AIE_ID, $campo, $_FILES[$campo]['name']);
                } else {
                    // Mantém o arquivo original, se existir
                    if (isset($documentos[$campo])) {
                        $this->manterArquivoOriginal($documentos[$campo], $AIE_ID, $campo);
                    }
                }
            }
        
            // Redireciona ou exibe uma mensagem de sucesso após a operação
            header('Location: /dashboard/listarmeuseventos');
            exit;
        }
                
        
        private function manterArquivoOriginal($documentoOriginal, $AIE_ID, $documento) {
            // Mantém o arquivo original no banco de dados
            $Alunos_Inscritos_EventosDAO = new Alunos_Inscritos_EventosDAO();
            $uploadDir = '../../../resources/uploads/documentos/';
            $file = [
                'tmp_name' => $_SERVER['DOCUMENT_ROOT'] . '../../../resources/uploads/documentos/' . $documentoOriginal,
                'name' => $documentoOriginal,
                'error' => UPLOAD_ERR_OK,
                'size' => file_exists($_SERVER['DOCUMENT_ROOT'] . '../../../resources/uploads/documentos/' . $documentoOriginal) ? filesize($_SERVER['DOCUMENT_ROOT'] . '../../../resources/uploads/documentos/' . $documentoOriginal) : 0,
            ];
        
            // Atualiza o banco de dados com o caminho do arquivo original
            $Alunos_Inscritos_EventosDAO->atualizarDocumento($AIE_ID, $documento, $documentoOriginal);
        }
        

        public function exibirDocumentos($AIE_ID) {
            $Alunos_Inscritos_EventosDAO = new Alunos_Inscritos_EventosDAO();
            try {
                // Verifica se o AIE_ID foi passado corretamente
                if (empty($AIE_ID)) {
                    throw new Exception("Erro: AIE_ID não encontrado.");
                }
                
                // Chama a função para buscar os documentos enviados
                $documentos = $this->$Alunos_Inscritos_EventosDAO->listarDocumentosPorAIE_ID($AIE_ID);
    
                // Verifica se documentos foram encontrados
                if (empty($documentos)) {
                    throw new Exception("Nenhum documento encontrado para este AIE_ID.");
                }
                    
            } catch (Exception $e) {
                // Captura e exibe a mensagem de erro
                echo $e->getMessage();
            }
        }
        
                
        public function validaAutenticacao() {}
    }


    

?>
