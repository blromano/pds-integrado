<?php

    namespace App\Controller;

    use FW\Controller\Action;

    class Mod05Controller extends Action{

        //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada
        public function resultados(){             
            $this->render('visu_resultados','dashboard');
        }

         //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada
         public function enviarfotos(){             
            $this->render('enviarfotos','dashboard');
        }

        public function certificado(){             
            $this->render('certificado','dashboard');
        }

        public function baixarcertificado(){             
            $this->render('baixarcertificado','dashboard');
        }

        public function denuncia(){             
            $this->render('denuncia','dashboard');
        }
        
        public function filtrardenuncia(){             
            $this->render('filtrardenuncia','dashboard');
        }

        public function detalhesdenuncia(){             
            $this->render('detalhesdenuncia','dashboard');
        }
        public function VisualizarResultadosjogos(){             
            $this->render('VisualizarResultadosjogos','dashboard');
        }
        public function FiltrarResultados(){             
            $this->render('FiltrarResultados','dashboard');
        }
        public function EditarResultados(){             
            $this->render('EditarResultados','dashboard');
        }
        public function CriarTabelasDeResultados(){             
            $this->render('CriarTabelasDeResultados','dashboard');
        }
        public function AcompanharFeedback(){             
            $this->render('AcompanharFeedback','dashboard');
        }
        public function GerenciarCertificado(){             
            $this->render('GerenciarCertificado','dashboard');
        }
        public function ListarDenuncias(){             
            $this->render('ListarDenuncias','dashboard');
        }
        public function ValidarFotos(){             
            $this->render('ValidarFotos','dashboard');
        }
   
        public function validaAutenticacao() {}
    }

?>