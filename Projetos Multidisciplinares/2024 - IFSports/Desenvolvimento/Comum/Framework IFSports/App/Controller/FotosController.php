<?php

namespace App\Controller;

use FW\Controller\Action;
use App\Model\FotosModel;
use App\DAO\FotosDAO;

class FotosController extends Action
{

    public function alterarStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fts_id = $_POST['FTS_ID'];
            $fts_status = $_POST['FTS_STATUS'];
    
            $fotoModel = new FotosModel();
            $fotoModel->__set('FTS_ID', $fts_id);
            $fotoModel->__set('FTS_STATUS', $fts_status);
    
            $fotosDAO = new FotosDAO();
            $fotosDAO->alterar($fotoModel);
    
            echo json_encode(['status' => 'success', 'message' => 'Status atualizado com sucesso!']);
            exit;
        }
    }
    

    public function enviar()
    {
        $title = "Envio de Fotos - Dashboard";
        $texto = "";
        $icone_editar = '<i class="ti-file btn-icon-append"></i>';
        $mensagensErro = [];
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fk_eventos_id = $_POST['FK_EVENTOS_EVO_ID'] ?? null;
            $fk_alunos_id = $_POST['FK_ALUNOS_ALU_ID'] ?? null;
    
            if (isset($_FILES['FTS_ARQUIVO']) && is_array($_FILES['FTS_ARQUIVO']['name'])) {
                $numFiles = count($_FILES['FTS_ARQUIVO']['name']);
                for ($i = 0; $i < $numFiles; $i++) {
                    $fileTmpPath = $_FILES['FTS_ARQUIVO']['tmp_name'][$i];
                    $fileName = $_FILES['FTS_ARQUIVO']['name'][$i];
                    $fileError = $_FILES['FTS_ARQUIVO']['error'][$i];
    
                    if ($fileError === UPLOAD_ERR_OK) {
                        $extensao = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    
                        if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
                            $novoNome = uniqid(time()) . '.' . $extensao;
                            $destino = './resources/imagens/' . $novoNome;
    
                            if (move_uploaded_file($fileTmpPath, $destino)) {
                                $ftsData = $_POST['FTS_DATE'][$i];
                                $ftsLegenda = $_POST['FTS_LEGENDA'][$i];
    
                                $fotoModel = new FotosModel();
                                $fotoModel->__set('fts_arquivo', $novoNome);
                                $fotoModel->__set('fts_legenda', $ftsLegenda);
                                $fotoModel->__set('fts_data', $ftsData);
                                $fotoModel->__set('fts_foto', $destino);
                                $fotoModel->__set('fk_eventos_evo_id', $fk_eventos_id);
                                $fotoModel->__set('fk_alunos_alu_id', $fk_alunos_id);
    
                                $fotosDAO = new FotosDAO();
                                $fotosDAO->inserir($fotoModel);
                            }
                        } else {
                            $mensagensErro[] = 'Apenas arquivos .jpg, .jpeg, .gif ou .png são permitidos!';
                        }
                    } else {
                        $mensagensErro[] = 'Erro no upload do arquivo.';
                    }
                }
            }
            header('Location: /dashboard/fotos/enviar');
            exit;
        }
    
        $this->getView()->title = $title;
        $this->getView()->texto = $texto;
        $this->getView()->mensagensErro = $mensagensErro;
    
        $this->render('enviar', 'dashboard');
    }

    public function validar() {
        $status = $_GET['status'] ?? null;
    
        $fotosDAO = new FotosDAO();
        $fotos = $fotosDAO->listar($status);
    
        $this->getView()->fotos = $fotos;
        $this->getView()->title = "Validar Fotos - Dashboard";
        $this->render('validar', 'dashboard');
    }
    
    

    public function validaAutenticacao() {}
}
