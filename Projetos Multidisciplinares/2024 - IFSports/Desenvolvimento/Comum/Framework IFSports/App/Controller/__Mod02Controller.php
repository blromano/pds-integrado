<?php

    namespace App\Controller;

    use FW\Controller\Action;

    class Mod02Controller extends Action{

        //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada
        public function listarEventos_mod02(){             
            $this->render('listarEventos_mod02','dashboard');
        }

        public function inscricao_mod02(){             
            $this->render('inscricao_mod02','dashboard');
        }
        public function editarDocumentos_mod02(){             
            $this->render('editarDocumentos_mod02','dashboard');
        }
        public function cancelarInscricao_mod02(){             
            $this->render('cancelarInscricao_mod02','dashboard');
        }
        public function meusEventosAluno_mod02(){             
            $this->render('meusEventosAluno_mod02','dashboard');
        }
        public function meusEventosOS_mod02(){             
            $this->render('meusEventosOS_mod02','dashboard');
        }
        public function inscricaoModalidades_mod02(){             
            $this->render('inscricaoModalidades_mod02','dashboard');
        }

        public function listarInscricaoDeAlunoEmEventos_mod02(){             
            $this->render('listarInscricaoDeAlunoEmEventos_mod02','dashboard');
        }

        public function verificarInscricaoDeAlunoEmModalidade_mod02(){             
            $this->render('verificarInscricaoDeAlunoEmModalidade_mod02','dashboard');
        }
        public function imprimircracha_mod02(){             
            $this->render('imprimircracha_mod02','dashboard');
        }
        public function gerarCracha_mod02(){             
            $this->render('gerarCracha_mod02','dashboard');
        }
        public function verificarPend_mod02(){             
            $this->render('verificarPend_mod02','dashboard');
        }
    
        public function validaAutenticacao() {}
    }

?>
