<?php    
    namespace App;
    
    use FW\Init\Boostrap;
    
    class Route extends Boostrap{
     
        public function initRoutes(){
            /* COMUM - INICIO */

            //Rota de Erro
            $routes['error404'] = array(
                'route' => '/error404',
                'controller' => 'ErrorController',
                'action' => 'index'
            );   
 
            $routes['error502'] = array(
            'route' => '/error502',
            'controller' => 'ErrorController',
            'action' => 'error502'
           ); 
            //Esta rota faz o carregamento da Tela de Login
            $routes[''] = array(
                'route' => '/',
                'controller' => 'LoginController',
                'action' => 'index'
            );
            //Esta rota faz o carregamento da dashboard        
            $routes['home'] = array(
                'route' => '/dashboard',
                'controller' => 'IndexController',
                'action' => 'index'
            );


            /* COMUM - FIM*/
            
            /* MODULO 01 - INICIO*/ 
            //Rotas de Login
            //Abre o Esqueci minha senha, Rota: /esquecisenha, Acionando o método de esqueci senha do LoginController
            $routes['login-esquecisenha'] = array(
                'route' => '/login/esquecisenha',
                'controller' => 'LoginController',
                'action' => 'alterar'
            );   
            
             //Abre o Login, Rota: /entrar, Acionando o método de logar do LoginController
            $routes['login-efetuar'] = array(
                'route' => '/login/entrar',
                'controller' => 'LoginController',
                'action' => 'logar'
            );

            //Rotas dos Dependentes 
            //Abre o Cadastro de dependentes, Rota: /caddependente, Acionando o método de Cadastrar do DependentesController
            $routes['cadastro-dependedente'] = array(
                'route' => '/cadastro/caddependente',
                'controller' => 'DependentesController',
                'action' => 'inserir'
            );

            //Abre o Listar Dependentes, Rota: /lisdependente, Acionando o método de Listagem do LoginController
            $routes['listar-dependedente'] = array(
                'route' => '/listar/lisdependente',
                'controller' => 'DependentesController',
                'action' => 'listar'
            );

            //Rotas do perfil
            $routes['editarperfillogado'] = array(
                'route' => '/editarperfillogado',
                'controller' => 'editarperfillogadocontroller',
                'action' => 'alterar'
            );

            //COMENTA AQUI DEPOIS :3 S2
            $routes['cadastro-usuario'] = array(
                'route' => '/registrar/cadastrar',
                'controller' => 'PacienteController',
                'action' => 'cadastrar'
            );

            $routes['inserir-usuario'] = array(
                'route' => '/registrar/inserir',
                'controller' => 'UsuarioController',
                'action' => 'inserir'
            );
            
            //Rotas do Funcionário
            //Rota cadastro de Funcionário
            $routes['cadastro-funcionario'] = array(
                'route' => '/registrar/funcionario',
                'controller' => 'UsuarioController',
                'action' => 'cadastrarFuncionario'
            );

            $routes['inserir-funcionario'] = array(
                'route' => '/funcionario/inserir',
                'controller' => 'UsuarioController',
                'action' => 'inserir'
            );

            $routes['listar-funcionario'] = array(
                'route' => '/funcionario/listagem',
                'controller' => 'UsuarioController',
                'action' => 'listarFuncionario'
            );

            $routes['excluir-funcionario'] = array(
                'route' => '/funcionario/excluir',
                'controller' => 'UsuarioController',
                'action' => 'excluirFuncionario'
            );


            //Rotas do Médico
            //Abre o Cadastro de Médico, Rota: /cadmedico, Acionando o método de Cadastrar do MedicoController
            /*$routes['cadastro-medico'] = array(
                'route' => '/cadastro/cadmedico',
                'controller' => 'MedicoController',
                'action' => 'inserir'
            );*/

            //Abre a Listagem do Médico, Rota: /listagemMedico, Acionando o método de Listagem do MedicoController
            /*$routes['listar-medico'] = array(
                'route' => '/listagemMedico',
                'controller' => 'MedicoController',
                'action' => 'listagem'
            );*/

            //Abre o formulário de editar Médico, Rota: /editarMedico, Acionando o método de editar do MedicoController
            $routes['editar-medico'] = array(
                'route' => '/editarMedico',
                'controller' => 'MedicoController',
                'action' => 'editar'
            );
            
            //Rotas do Secretário
            //Abre o Cadastro de secretário, Rota: /cadsecretario, Acionando o método de Cadastrar do SecretariasController
            /*$routes['cadastro-secretario'] = array(
                'route' => '/cadastro/cadsecretario',
                'controller' => 'SecretariasController',
                'action' => 'inserir'
            );*/

             //Abre a Listagem de Secretarias, Rota: /listagemSecretaria, Acionando o método de Listagem do SecretariasController
            /* $routes['listar-secretaria'] = array(
                'route' => '/listagemSecretaria',
                'controller' => 'SecretariaController',
                'action' => 'listagem'
            );*/

             //Abre o formulário de editar Secretárias, Rota: /editarSecretaria, Acionando o método de editar do SecretariasController
             $routes['editar-secretaria'] = array(
                'route' => '/editarSecretaria',
                'controller' => 'SecretariasController',
                'action' => 'editar'
            );

            //Rotas do Enfermeiro
            //Abre o Cadastro de enfermeiro, Rota: /cadenfermeiro, Acionando o método de Cadastrar do EnfermeiroController
            /*$routes['cadastro-enfermeiro'] = array(
                'route' => '/cadastro/cadenfermeiro',
                'controller' => 'EnfermeiroController',
                'action' => 'inserir'
            );*/

            //Abre a Listagem de Enfermeiros , Rota: /listagemEnfermeiros, Acionando o método de Listagem do EnfermeiroController
            /*$routes['listar-Enfermeiro'] = array(
                'route' => '/listagemEnfermeiro',
                'controller' => 'EnfermeiroController',
                'action' => 'listagem'
            );*/

            //Abre o formulário de editar Enfermeiro, Rota: /editarEnfermeiro, Acionando o método de editar do SecretariasController
            $routes['editar-enfermeiro'] = array(
                'route' => '/editarEnfermeiro',
                'controller' => 'EnfermeiroController',
                'action' => 'editar'
            );


            /* MODULO 01 - FIM*/     
            
            /* MODULO 02 - INICIO*/    

            //Rotas da Triagem Online
            //Abre a Listagem de triagemonline, Rota: /triagemonline, Acionando o método de listagem do TriagemOnlineController
            $routes['triagemonline-listar'] = array(
                'route' => '/triagemonline',
                'controller' => 'TriagemOnlineController',
                'action' => 'listagem'
            );
        
                //Abre o Formulário de Cadastro de triagemonline, Rota: /triagemonline/cadastrar, Acionando o método de cadastrar do TriagemOnlineController
            $routes['triagemonline-cadastrar'] = array(
                 'route' => '/triagemonline/cadastrar',
                'controller' => 'TriagemOnlineController',
                'action' => 'cadastrar'
            );
            
            $routes['triagemonline-cadastro-dois'] = array(
                'route' => '/triagemonline/cadastrardois',
                'controller' => 'TriagemOnlineController',
                'action' => 'cadastrardois'
            );
                    
                //Acessa o método inserir do TriagemOnlineController, Rota: /triagemonline/inserir
            $routes['triagemonline-inserir'] = array(
                'route' => '/triagemonline/inserir',
                'controller' => 'TriagemOnlineController',
                'action' => 'inserir'
            ); 
        
                //Abre o Formulário de Editar de triagemonline, Rota: /triagemonline/editar, Acionando o método de editar do TriagemOnlineController
            $routes['triagemonline-editar'] = array(
                'route' => '/triagemonline/editar',
                'controller' => 'TriagemOnlineController',
                'action' => 'editar'
            );
            
                //Acessa o método atualizar do TriagemOnlineController, Rota: /triagemonline/atualizar
            $routes['triagemonline-atualizar'] = array(
                'route' => '/triagemonline/atualizar',
                'controller' => 'TriagemOnlineController',
                'action' => 'atualizar'
            );
                //Acessa o método excluir do TriagemOnlineController, Rota: /triagemonline/excluir
            $routes['triagemonline-excluir'] = array(
                'route' => '/triagemonline/excluir',
                'controller' => 'TriagemOnlineController',
                'action' => 'excluir'
            );

           ////////////////////////////Rotas de consultas online////////////////////////////
            
            //Abre a Listagem de consultas online, Rota: /consultasOnline, Acionando o método de listagem do ConsultaOnlineController
            $routes['consultas-online-listar'] = array(
                'route' => '/consultasOnline/detalhes',
                'controller' => 'ConsultaOnlineController',
                'action' => 'listagem'
            );   
            
            $routes['consultas-online-listarMed'] = array(
                'route' => '/consultasOnline/detalhesMed',
                'controller' => 'ConsultaOnlineController',
                'action' => 'DetalhesMed'
            );  

            $routes['consultas-online-listarConsultas'] = array(
                'route' => '/consultasOnline/listagem',
                'controller' => 'ConsultaOnlineController',
                'action' => 'listarConsultas'
            );

            $routes['consultas-online-listarConsultasMed'] = array(
                'route' => '/consultasOnline/listagemMed',
                'controller' => 'ConsultaOnlineController',
                'action' => 'listarConsultasMed'
            );

            $routes['consultas-online-listarConsultasConfirm'] = array(
                'route' => '/consultasOnline/listagemConfirm',
                'controller' => 'ConsultaOnlineController',
                'action' => 'listarConsultasConfirm'
            );

            

            //Abre o Formulário de cadastro de consultas online, Rota: /consultasOnline/cadastrar, Acionando o método de cadastrar do PacienteController
            $routes['consultas-online-cadastrar'] = array(
                'route' => '/consultasOnline/cadastrar',
                'controller' => 'ConsultaOnlineController',
                'action' => 'cadastrar'
            );
            //Acessa o método inserir do ConsultaOnlineController,
            $routes['consultas-online-inserir'] = array(
                'route' => '/consultasOnline/inserir',
                'controller' => 'ConsultaOnlineController',
                'action' => 'inserir'
            ); 
            //Abre o Formulário de Editar de consultas Online, Rota: /consultasOnline/editar, Acionando o método de editar do ConsultaOnlineController
            $routes['consultas-online-editar'] = array(
                'route' => '/consultasOnline/editar',
                'controller' => 'ConsultaOnlineController',
                'action' => 'editar'
            );

            $routes['consultas-online-editarSec'] = array(
                'route' => '/consultasOnline/editarSec',
                'controller' => 'ConsultaOnlineController',
                'action' => 'editarSec'
            );

            $routes['consultas-online-editarMed'] = array(
                'route' => '/consultasOnline/editarMed',
                'controller' => 'ConsultaOnlineController',
                'action' => 'editarMed'
            );
            
                //Acessa o método atualizar do ConsultaOnlineController, Rota: /consultasOnline/atualizar
            $routes['consultas-online-atualizar'] = array(
                'route' => '/consultasOnline/atualizar',
                'controller' => 'ConsultaOnlineController',
                'action' => 'atualizar'
            );

            //Acessa o método atualizar do ConsultaOnlineController, Rota: /consultasOnline/atualizarSec
            $routes['consultas-online-atualizarSec'] = array(
                'route' => '/consultasOnline/atualizarSec',
                'controller' => 'ConsultaOnlineController',
                'action' => 'atualizarSec'
            );

            $routes['consultas-online-atualizarMed'] = array(
                'route' => '/consultasOnline/atualizarMed',
                'controller' => 'ConsultaOnlineController',
                'action' => 'atualizarMed'
            );
            
                //Acessa o método excluir do ConsultaOnlineController, Rota: /consultasOnline/excluir
            $routes['consultas-online-excluir'] = array(
                'route' => '/consultasOnline/excluir',
                'controller' => 'ConsultaOnlineController',
                'action' => 'excluir'
            );    
        
            $routes['consultas-online-listarHistorico'] = array(
                'route' => '/consultasOnline/historico',
                'controller' => 'ConsultaOnlineController',
                'action' => 'listarHistorico'
            );

            $routes['consultas-online-listarPacientes'] = array(
                'route' => '/consultasOnline/listagemPac',
                'controller' => 'ConsultaOnlineController',
                'action' => 'listarPacientes'
            );  

            $routes['consultas-online-listarConsultaPaciente'] = array(
                'route' => '/consultasOnline/historicoConPac',
                'controller' => 'ConsultaOnlineController',
                'action' => 'listarConsultaPaciente'
            );  







            

            $routes['gerenciar-consultas-presenciais'] = array(
                'route' => '/gerenciar_consultas',
                'controller' => 'GerenciarConsultaPresencialController',
                'action' => 'index'
            ); 


            // Rota de Solicitação de Consulta Online
            //Abre a Listagem de Solicitação online, Rota: /solicitacoesOnline, Acionando o método de listagem do SolicAgendOnlineController
            $routes['solicitacoesOnline-listar'] = array(
                'route' => '/solicitacoesOnline',
                'controller' => 'SolicAgendOnlineController',
                'action' => 'listagem'
            );

                //Abre o Formulário de Cadastro de Solicitação Online, Rota: /solicitacoesOnline/cadastrar, Acionando o método de cadastrar do SolicAgendOnlineController
            $routes['solicitacoesOnline-cadastrar'] = array(
                'route' => '/solicitacoesOnline/cadastrar',
                'controller' => 'SolicAgendOnlineController',
                'action' => 'cadastrar'
            );
            
                //Acessa o método inserir do SolicAgendOnlineController, Rota: /solicitacoesOnline/inserir
            $routes['solicitacoesOnline-inserir'] = array(
                'route' => '/solicitacoesOnline/inserir',
                'controller' => 'SolicAgendOnlineController',
                'action' => 'inserir'
            ); 

                //Abre o Formulário de Editar de Solicitações, Rota: /solicitacoesOnline/editar, Acionando o método de editar do SolicAgendOnlineController
            $routes['solicitacoesOnline-editar'] = array(
                'route' => '/solicitacoesOnline/editar',
                'controller' => 'SolicAgendOnlineController',
                'action' => 'editar'
            );
            
                //Acessa o método atualizar do SolicAgendOnlineController, Rota: /solicitacoesOnline/atualizar
            $routes['solicitacoesOnline-atualizar'] = array(
                'route' => '/solicitacoesOnline/atualizar',
                'controller' => 'SolicAgendOnlineController',
                'action' => 'atualizar'
            );
                //Acessa o método excluir do SolicAgendOnlineController, Rota: /solicitacoesOnline/excluir
            $routes['solicitacoesOnline-excluir'] = array(
                'route' => '/solicitacoesOnline/excluir',
                'controller' => 'SolicAgendOnlineController',
                'action' => 'excluir'
            );
            
            $routes['solicitacoesOnline-confirmar'] = array(
                'route' => '/solicitacoesOnline/confirmar',
                'controller' => 'SolicAgendOnlineController',
                'action' => 'confirmar'
            );

            $routes['solicitacoesOnline-inserirMed'] = array(
                'route' => '/solicitacoesOnline/inserirMed',
                'controller' => 'SolicAgendOnlineController',
                'action' => 'inserirMed'
            ); 


            

            /* MODULO 02 - FIM*/     

            /* MODULO 03 - INICIO*/    
            // ROTAS DE EXAME
            // Rota de Detalhar Exame
            $routes['detalhar-exame'] = array(
                'route' => '/exame/detalharexame',
                'controller' => 'ExameController',
                'action' => 'detalhar'
            );

                //Rota de Listar Exames
            $routes['exames'] = array(
                'route' => '/exame/listarexame',
                'controller' => 'ExameController',
                'action' => 'listarExames'
            );

    
                //Rota de Editar Solicitacao Exames
            $routes['exame-editar'] = array(
                'route' => '/exame/editarSolicitacaoExame',
                'controller' => 'ExameController',
                'action' => 'editarSolicitacaoExame'
            );

            // Rota de Solicitação de Exame
            $routes['listar-meus-exames'] = array(
                'route' => '/exame/meusexames',
                'controller' => 'ExameController',
                'action' => 'listarMeusExames'
            );

            // Rota de Solicitação de Exame
            $routes['solicitar-exame'] = array(
                'route' => '/exame/solicitar',
                'controller' => 'ExameController',
                'action' => 'solicitar'
            );

            // Rota de Solicitação de Exame
            $routes['excluir-meu-exame'] = array(
                'route' => '/exame/excluirmeuexame',
                'controller' => 'ExameController',
                'action' => 'excluirMeuExame'
            );

            // Rota de Solicitação de Exame
            $routes['inserir-solicitacao-exame'] = array(
                'route' => '/exame/inserir',
                'controller' => 'ExameController',
                'action' => 'inserir'
            );

                // Rota de Detalhamento de Exame
            $routes['exame-detalhamento'] = array(
                'route' => '/exame/detalharexame',
                'controller' => 'ExameController',
                'action' => 'detalhar'
            );
                // Rota de View Exclusão do Listar Exame
            $routes['exame-view-excluir'] = array(
                'route' => '/exame/excluirexame',
                'controller' => 'ExameController',
                'action' => 'ViewExcluir'
            );

                // Rota de Exclusão do Exame
            $routes['exame-excluir'] = array(
                'route' => '/exame/excluir',
                'controller' => 'ExameController',
                'action' => 'excluirExame'
            );

            // Rota de View Autorizar Exame    
            $routes['exame-view-autorizar'] = array(
                'route' => '/exame/autorizarexame',
                'controller' => 'ExameController',
                'action' => 'ViewAutorizarExame'
            );

            // Rota de  Autorizar Exame    
            $routes['exame-autorizar'] = array(
                'route' => '/exame/autorizado',
                'controller' => 'ExameController',
                'action' => 'autorizarExame'
            );
            // Rota de View de Recusar Exame
            $routes['exame-view-recusar'] = array(
                'route' => '/exame/recusarexame',
                'controller' =>'ExameController',
                'action' => 'ViewRecusarExame'
                

            );
            // Rota de Recusar Exame
            $routes['exame-recusar'] = array(
                'route' => '/exame/recusado',
                'controller' => 'Examecontroller',
                'action' => 'recusarExame'
            );

            // Rota de Upload de Resultado Exame
            $routes['exame-upload'] = array(
                'route' => '/exame/upload',
                'controller' => 'Examecontroller',
                'action' => 'uploadExame'
            );

            //Rota de Editar Solicitacao Exames
            $routes['exame-view-editar'] = array(
                'route' => '/exame/editarSolicitacaoExame',
                'controller' => 'ExameController',
                'action' => 'viewEditarSolicitacaoExame'
            );

                // Rota de View Autorizar Exame    
                $routes['exame-editar'] = array(
                'route' => '/exame/editar',
                'controller' => 'ExameController',
                'action' => 'editarSolicitacaoExame'
            );

            $routes['exame-downloadguia'] = array(
                'route' => '/exame/downloadguia',
                'controller' => 'ExameController',
                'action' => 'downloadGuia'
            );


            // Rota de Download de Resultado Exame
            $routes['exame-download'] = array(
                'route' => '/exame/download',
                'controller' => 'Examecontroller',
                'action' => 'downloadExame'
            );
            // ROTAS DE SOLICITAÇÂO E COMPRA DE PRODUTOS

            // ROTAS DE SOLICITAÇÂO E COMPRA DE PRODUTOS

            // Rota de Listar Minhas Solicitações de Compra
            $routes['listar-minhas-solicitacões'] = array(
                'route' => '/solicitacaoProduto/minhasSolicitacoes',
                'controller' => 'SolicitacaoProdutoController',
                'action' => 'listarMinhasSolicitacoesProdutos'
            );

            // Rota de Listar Solicitações de Compras
            $routes['listar-solicitacões-de-compras-de-produtos'] = array(
                'route' => '/solicitacaoProduto/listarSolicitacoes',
                'controller' => 'SolicitacaoProdutoController',
                'action' => 'listarSolicitacoesProdutos'
            );

            // Rota de Detalhar Solicitações de Compra
            $routes['detalhar-solicitacao-de-compra-de-produto'] = array(
                'route' => '/solicitacaoProduto/detalhar',
                'controller' => 'SolicitacaoProdutoController',
                'action' => 'detalharSolicitacaoProduto'
            );

            // Rota de Autorizar Solicitações de Compra
            $routes['autorizar-solicitacao-de-compra-de-produto'] = array(
                'route' => '/solicitacaoProduto/autorizar',
                'controller' => 'SolicitacaoProdutoController',
                'action' => 'autorizarSolicitacaoProduto'
            );

            // Rota de Recusar Solicitações de Compra
            $routes['recusar-solicitacao-de-compra-de-produto'] = array(
                'route' => '/solicitacaoProduto/recusar',
                'controller' => 'SolicitacaoProdutoController',
                'action' => 'recusarSolicitacaoProduto'
            );

            // Rota de View da Solicitação de Compra
            $routes['solicitar-view-compra'] = array(
                'route' => '/solicitacaoproduto/solicitacaoProduto',
                'controller' => 'SolicitacaoProdutoController',
                'action' => 'viewsolicitar'
            );

            // Rota de inserir Solicitação de Compra
            $routes['solicitar-compra'] = array(
                'route' => '/solicitacaoproduto/solicitarProduto',
                'controller' => 'SolicitacaoProdutoController',
                'action' => 'inserir'
            );

            // Rota de Listagem de Consultas Online Direcionadas para Consultas Presenciais
            $routes['consulta-direcionada'] = array(
                'route' => '/consultaPresencial/direcionadasDeOnline',
                'controller' => 'SolicitacaoProdutoController',
                'action' => 'inserir'
            );

            // Rota de Listar Produtos no Estoque
            $routes['listar-estoque'] = array(
                'route' => '/produto/listarProduto',
                'controller' => 'ProdutoController',
                'action' => 'listarEstoque'
            );

            // Rota de View do Inserir Produto no Estoque
            $routes['view-inserir-estoque'] = array(
                'route' => '/produto/inserirProduto',
                'controller' => 'ProdutoController',
                'action' => 'viewInserirEstoque'
            );

            // Rota de Inserir Produto no Estoque
            $routes['inserir-estoque'] = array(
                'route' => '/produto/inserir',
                'controller' => 'ProdutoController',
                'action' => 'inserirProduto'
            );

            // Rota de Visualização do Editar da Solicitação do Produto
            $routes['view-editar-solicitacao'] = array(
                'route' => '/solicitacaoProduto/editarSolicitacoes',
                'controller' => 'SolicitacaoProdutoController',
                'action' => 'viewEditar'
            );

            $routes['editar-solicitacao'] = array(
                'route' => '/solicitacaoProduto/editadaSolicitacao',
                'controller' => 'SolicitacaoProdutoController',
                'action' => 'editarSolicitacaoProduto'
            );

            /* MODULO 03 - FIM*/        

            /* MODULO 04 - INICIO*/    

            $routes['consultas-presenciais-listagem'] = array(
                'route' => '/consultas_listar',
                'controller' => 'ConsultaPresencialController',
                'action' => 'listagem'

            );

            $routes['consultas-presenciais-formulario'] = array(
                'route' => '/consulta_form',
                'controller' => 'ConsultaPresencialController',
                'action' => 'consultaFormulario'

            );

            $routes['triagem-presencial'] = array(
                'route' => '/triagem_presencial',
                'controller' => 'TriagemPresencialController',
                'action' => 'gerenciar'
            );

            $routes['triagem-presencial-inserir'] = array(
                'route' => '/triagem_presencial/inserir',
                'controller' => 'TriagemPresencialController',
                'action' => 'inserir'
            );

            $routes['editar-triagem-presencial'] = array(
                'route' => '/editar_triagem_presencial',
                'controller' => 'TriagemPresencialController',
                'action' => 'editar'
            );

            $routes['internacoes-medicas'] = array(
                'route' => '/internacoes_medicas',
                'controller' => 'InternacoesMedicasController',
                'action' => 'internar'
            );

            $routes['internacoes-medicas-inserir'] = array(
                'route' => '/internacoes_medicas/inserir',
                'controller' => 'InternacoesMedicasController',
                'action' => 'inserir'
            );

            $routes['internacoes-medicas-editar'] = array(
                'route' => '/internacoes_medicas/editar',
                'controller' => 'InternacoesMedicasController',
                'action' => 'editar'
            );

            $routes['internacoes-medicas-alterar'] = array(
                'route' => '/internacoes_medicas/alterar',
                'controller' => 'InternacoesMedicasController',
                'action' => 'atualizar'
            );

            $routes['internacoes-medicas-excluir'] = array(
                'route' => '/internacoes_medicas/excluir',
                'controller' => 'InternacoesMedicasController',
                'action' => 'excluir'
            );

            $routes['listagem-internacoes-medicas'] = array(
                'route' => '/listagem_internacoes_medicas',
                'controller' => 'InternacoesMedicasController',
                'action' => 'listagem'
            );

            $routes['prescricao-remedios'] = array(
                'route' => '/prescricao',
                'controller' => 'PrescricaoRemediosController',
                'action' => 'listar'
            );

            $routes['consulta-presencial-descricao'] = array(
                'route' => '/consulta_salvar',
                'controller' => 'ConsultaPresencialController',
                'action' => 'atualizarCopForm'
            );

            /* MODULO 04 - FIM*/    

            /* MODULO 05 - INICIO*/    


            $routes['remedios-listar'] = array(
                'route' => '/remedios',
                'controller' => 'RemedioController',
                'action' => 'listagem'

            );

            $routes['remedios-atualizar'] = array(
                'route' => '/remedios/atualizar',
                'controller' => 'RemedioController',
                'action' => 'atualizar'

            );

            $routes['remedios-editar'] = array(
                'route' => '/remedios/editar',
                'controller' => 'RemedioController',
                'action' => 'editar'
            );

            $routes['remedios-desativar'] = array(
                'route' => '/remedios/desativar',
                'controller' => 'RemedioController',
                'action' => 'excluir'
            );

            $routes['remedios-adicionar'] = array(
                'route' => '/remedios/inserir',
                'controller' => 'RemedioController',
                'action' => 'inserir'
            );
            $routes['remedios-cadastrar'] = array(
                'route' => '/remedios/cadastrar',
                'controller' => 'RemedioController',
                'action' => 'cadastrar'
            );
        //Rotas da Ouvidoria//
        $routes['ouvidoria-listar'] = array(
            'route' => '/ouvidoria/listagem',
            'controller' => 'ouvidoriaController',
            'action' => 'listagem'
        );
        $routes['ouvidoria-render'] = array(
            'route' => '/ouvidoria/enviar',
            'controller' => 'ouvidoriaController',
            'action' => 'cadastrar'
        );
        $routes['ouvidoria-inserir'] = array(
            'route' => '/ouvidoria/inserir',
            'controller' => 'ouvidoriaController',
            'action' => 'inserir'
        );
        $routes['ouvidoria-editar'] = array(
            'route' => '/ouvidoria/editar',
            'controller' => 'ouvidoriaController',
            'action' => 'editar'
        );
        $routes['ouvidoria-atualizar'] = array(
            'route' => '/ouvidoria/atualizar',
            'controller' => 'ouvidoriaController',
            'action' => 'atualizar'
        );
        $routes['ouvidoria-excluir'] = array(
            'route' => '/ouvidoria/excluir',
            'controller' => 'ouvidoriaController',
            'action' => 'excluir'
        );
            $routes['ouvidoria-atualizaLista'] = array(
                'route' => '/ouvidoria/atualizaLista',
                'controller' => 'ouvidoriaController',
                'action' => 'atualizaLista'
            );

         //Rotas dos planos medicos//
         $routes['PlanosMedicos-listar'] = array(
            'route' => '/planosmedicos',
            'controller' => 'PlanosMedicosController',
            'action' => 'listagem'
        );
        $routes['PlanosMedicos-editar'] = array(
            'route' => '/planosmedicos/editar',
            'controller' => 'PlanosMedicosController',
            'action' => 'editar'
        );
        $routes['PlanosMedicos-atualizar'] = array(
            'route' => '/planosmedicos/atualizar',
            'controller' => 'PlanosMedicosController',
            'action' => 'atualizar'
        );
        $routes['PlanosMedicos-desativar'] = array(
            'route' => '/planosmedicos/desativar',
            'controller' => 'PlanosMedicosController',
            'action' => 'excluir'
        );
        $routes['PlanosMedicos-inserir'] = array(
            'route' => '/planosmedicos/inserir',
            'controller' => 'PlanosMedicosController',
            'action' => 'inserir'
        );
        $routes['PlanosMedicos-cadastrar'] = array(
            'route' => '/planosmedicos/cadastrar',
            'controller' => 'PlanosMedicosController',
            'action' => 'cadastrar'
        );
    
     //Rotas do tiposRemédios//

        //Abre a Listagem de Tipo de remedios, Rota: /tiposRemedios, Acionando o método de listagem do TiposRemediosController
        $routes['tiposRemedios-listar'] = array(
            'route' => '/tiposRemedios',
            'controller' => 'TiposRemediosController',
            'action' => 'listagem'
        );

            //Abre o Formulário de Cadastro de Tipo de remedios, Rota: /tiposRemedios/cadastrar, Acionando o método de cadastrar do TiposRemediosController
        $routes['tiposRemedios-cadastrar'] = array(
            'route' => '/tiposRemedios/cadastrar',
            'controller' => 'TiposRemediosController',
            'action' => 'cadastrar'
        );
        
            //Acessa o método inserir do TiposRemediosController, Rota: /tiposRemedios/inserir
        $routes['tiposRemedios-inserir'] = array(
            'route' => '/tiposRemedios/inserir',
            'controller' => 'TiposRemediosController',
            'action' => 'inserir'
        ); 

            //Abre o Formulário de Editar de Tipo de remedios, Rota: /tiposRemedios/editar, Acionando o método de editar do TiposRemediosController
        $routes['tiposRemedios-editar'] = array(
            'route' => '/tiposRemedios/editar',
            'controller' => 'TiposRemediosController',
            'action' => 'editar'
        );
        
            //Acessa o método atualizar do TiposRemediosController, Rota: /tiposRemedios/atualizar
        $routes['tiposRemedios-atualizar'] = array(
            'route' => '/tiposRemedios/atualizar',
            'controller' => 'TiposRemediosController',
            'action' => 'atualizar'
        );
            //Acessa o método excluir do TiposRemediosController, Rota: /tiposRemedios/excluir
        $routes['tiposRemedios-excluir'] = array(
            'route' => '/tiposRemedios/excluir',
            'controller' => 'TiposRemediosController',
            'action' => 'excluir'
        );

        //Rotas dos pagamentos//
        $routes['pagamentos-listar'] = array(
            'route' => '/pagamentos',
            'controller' => 'PagamentosController',
            'action' => 'listagem'
        );
        $routes['pagamentos-editar'] = array(
            'route' => '/pagamentos/editar',
            'controller' => 'PagamentosController',
            'action' => 'editar'
        );
        $routes['pagamentos-atualizar'] = array(
            'route' => '/pagamentos/atualizar',
            'controller' => 'PagamentosController',
            'action' => 'atualizar'
        );
        $routes['pagamentos-excluir'] = array(
            'route' => '/pagamentos/excluir',
            'controller' => 'PagamentosController',
            'action' => 'excluir'
        );
        $routes['pagamentos-inserir'] = array(
            'route' => '/pagamentos/inserir',
            'controller' => 'PagamentosController',
            'action' => 'inserir'
        );
        $routes['pagamentos-cadastrar'] = array(
            'route' => '/pagamentos/cadastrar',
            'controller' => 'PagamentosController',
            'action' => 'cadastrar'
        );

        //Rotas dos contatosSetoriais//
        $routes['contatosSetoriais-listar'] = array(
            'route' => '/contatosSetoriais',
            'controller' => 'ContatosSetoriaisController',
            'action' => 'listagem'
        );
        $routes['contatosSetoriais-editar'] = array(
            'route' => '/contatosSetoriais/editar',
            'controller' => 'ContatosSetoriaisController',
            'action' => 'editar'
        );
        $routes['contatosSetoriais-atualizar'] = array(
            'route' => '/contatosSetoriais/atualizar',
            'controller' => 'ContatosSetoriaisController',
            'action' => 'atualizar'
        );
        $routes['contatosSetoriais-excluir'] = array(
            'route' => '/contatosSetoriais/excluir',
            'controller' => 'ContatosSetoriaisController',
            'action' => 'excluir'
        );
        $routes['contatosSetoriais-inserir'] = array(
            'route' => '/contatosSetoriais/inserir',
            'controller' => 'ContatosSetoriaisController',
            'action' => 'inserir'
        );
        $routes['contatosSetoriais-cadastrar'] = array(
            'route' => '/contatosSetoriais/cadastrar',
            'controller' => 'ContatosSetoriaisController',
            'action' => 'cadastrar'
        );
        
            //Rotas de Pacientes
                //Abre a Listagem de Pacientes, Rota: /pacientes, Acionando o método de listagem do PacienteController
                $routes['pacientes-listar'] = array(
                    'route' => '/pacientes',
                    'controller' => 'PacienteController',
                    'action' => 'listagem'
                );
                
                //Abre o Formulário de Cadastro de Pacientes, Rota: /pacientes/cadastrar, Acionando o método de cadastrar do PacienteController
            $routes['pacientes-cadastrar'] = array(
                'route' => '/pacientes/cadastrar',
                'controller' => 'PacienteController',
                'action' => 'cadastrar'
            );
            
                //Acessa o método inserir do PacienteController, Rota: /pacientes/inserir
            $routes['pacientes-inserir'] = array(
                'route' => '/pacientes/inserir',
                'controller' => 'PacienteController',
                'action' => 'inserir'
            ); 

                //Abre o Formulário de Editar de Pacientes, Rota: /pacientes/editar, Acionando o método de editar do PacienteController
            $routes['pacientes-ativar'] = array(
                'route' => '/pacientes/ativar',
                'controller' => 'PacienteController',
                'action' => 'editar'
            );
            
                //Acessa o método atualizar do PacienteController, Rota: /pacientes/atualizar
            $routes['pacientes-atualizar'] = array(
                'route' => '/pacientes/atualizar',
                'controller' => 'PacienteController',
                'action' => 'atualizar'
            );
                //Acessa o método excluir do PacienteController, Rota: /pacientes/excluir
            $routes['pacientes-desativar'] = array(
                'route' => '/pacientes/desativar',
                'controller' => 'PacienteController',
                'action' => 'excluir'
            );
                  //Rotas de Especialidades médicas
            //Abre a Listagem de  Especialidades médicas, Rota: /pacientes, Acionando o método de listagem do PacienteController
            $routes['EspecialidadesMedicas-listar'] = array(
                'route' => '/EspecialidadesMedicas',
                'controller' => 'EspecialidadesMedicasController',
                'action' => 'listagem'
            );
            
                //Abre o Formulário de Cadastro de  Especialidades médicas, Rota: /pacientes/cadastrar, Acionando o método de cadastrar do PacienteController
            $routes['EspecialidadesMedicas-cadastrar'] = array(
                'route' => '/EspecialidadesMedicas/cadastrar',
                'controller' => 'EspecialidadesMedicasController',
                'action' => 'cadastrar'
            );
            
                //Acessa o método inserir do  Especialidades médicasController, Rota: /pacientes/inserir
            $routes['EspecialidadesMedicas-inserir'] = array(
                'route' => '/EspecialidadesMedicas/inserir',
                'controller' => 'EspecialidadesMedicasController',
                'action' => 'inserir'
            ); 

                //Abre o Formulário de Editar de  Especialidades médicas, Rota: / Especialidades médicas/editar, Acionando o método de editar do PacienteController
            $routes['EspecialidadesMedicas-editar'] = array(
                'route' => '/EspecialidadesMedicas/editar',
                'controller' => 'EspecialidadesMedicasController',
                'action' => 'editar'
            );
            
                //Acessa o método atualizar do EspecialidadesMedicasController, Rota: / Especialidades médicas/atualizar
            $routes['EspecialidadesMedicas-atualizar'] = array(
                'route' => '/EspecialidadesMedicas/atualizar',
                'controller' => 'EspecialidadesMedicasController',
                'action' => 'atualizar'
            );
                //Acessa o método excluir do Especialidades médicasController, Rota: / Especialidades médicas/excluir
            $routes['EspecialidadesMedicas-desativar'] = array(
                'route' => '/EspecialidadesMedicas/desativar',
                'controller' => 'EspecialidadesMedicasController',
                'action' => 'excluir'
            );
            
            //Rotas de Especialidades Medicos
            //Abre a Listagem de  Especialidades médicas, Rota: /pacientes, Acionando o método de listagem do PacienteController
            $routes['EspecialidadesMedicos-listar'] = array(
                'route' => '/EspecialidadesMedicos',
                'controller' => 'EspecialidadesMedicosController',
                'action' => 'listagem'
            );
            
                //Abre o Formulário de Cadastro de  Especialidades médicas, Rota: /pacientes/cadastrar, Acionando o método de cadastrar do PacienteController
            $routes['EspecialidadesMedicos-cadastrar'] = array(
                'route' => '/EspecialidadesMedicos/cadastrar',
                'controller' => 'EspecialidadesMedicosController',
                'action' => 'cadastrar'
            );
            
                //Acessa o método inserir do  Especialidades médicasController, Rota: /pacientes/inserir
            $routes['EspecialidadesMedicos-inserir'] = array(
                'route' => '/EspecialidadesMedicos/inserir',
                'controller' => 'EspecialidadesMedicosController',
                'action' => 'inserir'
            ); 

                //Abre o Formulário de Editar de  Especialidades médicas, Rota: / Especialidades médicas/editar, Acionando o método de editar do PacienteController
            $routes['EspecialidadesMedicos-editar'] = array(
                'route' => '/EspecialidadesMedicos/editar',
                'controller' => 'EspecialidadesMedicosController',
                'action' => 'editar'
            );
            
                //Acessa o método atualizar do EspecialidadesMedicasController, Rota: / Especialidades médicas/atualizar
            $routes['EspecialidadesMedicos-atualizar'] = array(
                'route' => '/EspecialidadesMedicos/atualizar',
                'controller' => 'EspecialidadesMedicosController',
                'action' => 'atualizar'
            );
                //Acessa o método excluir do Especialidades médicasController, Rota: / Especialidades médicas/excluir
            $routes['EspecialidadesMedicos-desativar'] = array(
                'route' => '/EspecialidadesMedicos/desativar',
                'controller' => 'EspecialidadesMedicosController',
                'action' => 'excluir'
            );
    
            /* MODULO 05 - FIM*/    
            
            $this->setRoutes($routes);                       
            
            
        }

    }
    
?>