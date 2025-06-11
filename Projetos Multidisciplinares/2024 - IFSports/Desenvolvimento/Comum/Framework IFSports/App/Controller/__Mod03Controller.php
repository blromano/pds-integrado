<?php

    namespace App\Controller;

    use FW\Controller\Action;
    use App\Model\ResponsaveisDeEquipeModel;
    use App\DAO\ResponsavelDeEquipeDAO;

    class Mod03Controller extends Action{

        public function inserir () {

            $responsavel = new ResponsaveisDeEquipeModel();

            $responsavel->__set("RES_CPF", $_POST['RES_CPF']);
            $responsavel->__set("RES_EMAIL", $_POST['RES_EMAIL']);
            $responsavel->__set("RES_PRONTUARIO", $_POST['RES_PRONTUARIO']);
            $responsavel->__set("RES_NOME", $_POST['RES_NOME']);
            
            
            $responsaveldao = new ResponsavelDeEquipeDAO();
            $responsaveldao->inserir($responsavel);

            header('Location: mod03/listarResponsaveisDeEquipe');

        }

        /*public function listarEquipesPorModalidade_mod03(){

            $this->render('listarEquipesPorModalidade_mod03','dashboard');
        }
            */
        public function vincularEquipes_mod03(){             
            $this->render('vincularEquipes_mod03','dashboard');
        }

        /*public function listar_SelecionarAlunosInscritosNoEvento_mod03(){             
            $this->render('listar_SelecionarAlunosInscritosNoEvento_mod03','dashboard');
        }
        */
        
        //MOD 1 ALUNOS
        public function listarAlunosInscritosNoEvento_mod03(){       
            
            $title = "Listagem de Alunos Inscritos no Evento - Dashboard";
            $texto = "";
            
            $this->getView()->title = $title;
            $this->getView()->texto = $texto;


            $this->render('listarAlunosInscritosNoEvento_mod03','dashboard');
        }

        /*public function listarResponsaveisDeEquipe_mod03(){
            
            $title = "Listagem de Alunos Inscritos no Evento - Dashboard";
            $texto = "";
            
            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            
            $this->render('listarResponsaveisDeEquipe_mod03','dashboard');
        }*/

        /*
            public function gerarCracha_mod03(){             
            $this->render('gerarCracha_mod03','dashboard');
        }*/

        /*public function excluirResponsavelDeEquipe_mod03(){             
            $this->render('excluirResponsavelDeEquipe_mod03','dashboard');
        }

        public function editarResponsavelDeEquipe_mod03(){             
            $this->render('editarResponsavelDeEquipe_mod03','dashboard');
        }

        public function adicionarResponsavelDeEquipe_mod03(){             
            $this->render('adicionarResponsavelDeEquipe_mod03','dashboard');
        }*/

        /*MOD 1 ALUNOS
        public function gerarPDFListaDeAlunos_mod03(){             
            $this->render('gerarPDFListaDeAlunos_mod03','');
        }*/

        /*public function cadastrarNovaSenha_mod03(){             
            $this->render('cadastrarNovaSenha_mod03','dashboard');
        }*/

        /*MOD 1 ALUNOS
        public function gerarPDFAluno_mod03(){             
            $this->render('gerarPDFAluno_mod03','');
        }*/
        
        /*public function justificar_mod03(){             
            $this->render('justificar_mod03','dashboard');
        }*/

        public function validaAutenticacao() {}
    }

?>
