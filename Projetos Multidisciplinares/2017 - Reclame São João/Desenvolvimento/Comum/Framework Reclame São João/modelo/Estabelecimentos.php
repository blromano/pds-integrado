<?php
class Estabelecimentos
{
	   
       

		private $EST_ID;
		private $EST_CNPJ;
		private $EST_FOTO_PERFIL;
		private $EST_NOME_FANTASIA;
		private $EST_NUMERO_ENDERECO;
		private $EST_COMPLEMENTO;
        private $EST_NOME_RESPONSAVEL;
        private $EST_NOME_EMPRESA;
        private $EST_PUBLICO_ALVO;
		private $EST_VISAO_GERAL_EMPRESA;
        private $EST_SITE_EMPRESA;
		private $EST_FACEBOOK_EMPRESA;
        private $EST_EMAIL;
		private $USU_ID;
		private $LOC_ID;
		private $TES_ID;
	
	function __construct() 
        {
            
        }
        
        
        function getEST_ID() 
        {
            return $this->EST_ID;
        }

        function getEST_CNPJ() 
        {
            return $this->EST_CNPJ;
        }

        function getEST_FOTO_PERFIL() 
        {
            return $this->EST_FOTO_PERFIL;
        }

        function getEST_NOME_FANTASIA() 
        {
            return $this->EST_NOME_FANTASIA;
        }
		
		function getEST_NUMERO_ENDERECO() 
        {
            return $this->EST_NUMERO_ENDERECO;
        }
		
		function getEST_COMPLEMENTO() 
        {
            return $this->EST_COMPLEMENTO;
        }

        function getEST_NOME_RESPONSAVEL() 
        {
            return $this->EST_NOME_RESPONSAVEL;
        }

        function getEST_NOME_EMPRESA() 
        {
            return $this->EST_NOME_EMPRESA;
        }

        function getEST_PUBLICO_ALVO() 
        {
            return $this->EST_PUBLICO_ALVO;
        }
		
		function getEST_VISAO_GERAL_EMPRESA() 
        {
            return $this->EST_VISAO_GERAL_EMPRESA;
        }

        function getEST_SITE_EMPRESA() 
        {
            return $this->EST_SITE_EMPRESA;
        }

        function getEST_EMAIL() 
        {
            return $this->EST_EMAIL;
        }
		
		function getUSU_ID() 
        {
            return $this->USU_ID;
        }
		
		function getLOC_ID() 
        {
            return $this->LOC_ID;
        }
		
		function getTES_ID() 
        {
            return $this->TES_ID;
        }
		
		function getEST_FACEBOOK_EMPRESA() 
        {
            return $this->EST_FACEBOOK_EMPRESA;
        }

        function setEST_ID($EST_ID) 
        {
            $this->EST_ID = $EST_ID;
        }

        function setEST_CNPJ($EST_CNPJ) 
        {
            $this->EST_CNPJ = $EST_CNPJ;
        }

        function setEST_FOTO_PERFIL($EST_FOTO_PERFIL) 
        {
            $this->EST_FOTO_PERFIL = $EST_FOTO_PERFIL;
        }

        function setEST_NOME_FANTASIA($EST_NOME_FANTASIA) 
        {
            $this->EST_NOME_FANTASIA = $EST_NOME_FANTASIA;
        }
		
		function setEST_RUA($EST_RUA)
        {
            $this->EST_RUA = $EST_RUA;
        }
		
		function setEST_BAIRRO($EST_BAIRRO)
        {
            $this->EST_BAIRRO = $EST_BAIRRO;
        }
		
		function setEST_NUMERO_ENDERECO($EST_NUMERO_ENDERECO)
        {
            $this->EST_NUMERO_ENDERECO = $EST_NUMERO_ENDERECO;
        }
		
		function setEST_COMPLEMENTO($EST_COMPLEMENTO)
        {
            $this->EST_COMPLEMENTO = $EST_COMPLEMENTO;
        }

        function setEST_CEP($EST_CEP)
        {
            $this->EST_CEP = $EST_CEP;
        }

        function setEST_NOME_RESPONSAVEL($EST_NOME_RESPONSAVEL)
        {
            $this->EST_NOME_RESPONSAVEL = $EST_NOME_RESPONSAVEL;
        }

        function setEST_NOME_EMPRESA($EST_NOME_EMPRESA)
        {
            $this->EST_NOME_EMPRESA = $EST_NOME_EMPRESA;
        }

        function setEST_PUBLICO_ALVO($EST_PUBLICO_ALVO) 
        {
            $this->EST_PUBLICO_ALVO = $EST_PUBLICO_ALVO;
        }
		
		function setEST_VISAO_GERAL_EMPRESA($EST_VISAO_GERAL_EMPRESA) 
        {
            $this->EST_VISAO_GERAL_EMPRESA = $EST_VISAO_GERAL_EMPRESA;
        }

        function setEST_SITE_EMPRESA($EST_SITE_EMPRESA) 
        {
            $this->EST_SITE_EMPRESA = $EST_SITE_EMPRESA;
        }

        function setEST_EMAIL($EST_EMAIL)
        {
            $this->EST_EMAIL = $EST_EMAIL;
        }
		
		function setUSU_ID($USU_ID)
        {
            $this->USU_ID = $USU_ID;
        }
		
		function setLOC_ID($LOC_ID)
        {
            $this->LOC_ID = $LOC_ID;
        }
		
		function setTES_ID($TES_ID)
        {
            $this->TES_ID = $TES_ID;
        }
		
		function setEST_FACEBOOK_EMPRESA($EST_FACEBOOK_EMPRESA)
        {
            $this->EST_FACEBOOK_EMPRESA = $EST_FACEBOOK_EMPRESA;
        }
}
  
?>
