<?php    

    /*  Dicionário de Rotas:
        (Coloque neste local o nome de cada rota que você utiliza em seu módulo juntamente com o caminho que ela executa)
        Nome da Rota     -     Caminho que executa
        ''               -     '/'        
        'inserirSaneamentos'          -     '/dashboard/inserirSaneamentos'


    */ 
    
    $routes['inserirSaneamentos'] = array(
        'route' => '/dashboard/inserirSaneamentos',
        'controller' => 'DashboardMod05Controller',
        'action' => 'inserirSaneamentos'
    );

    // 26/11/2023
    // $routes['inserirResponsavel'] = array(
    //     'route' => '/dashboard/inserirResponsavel',
    //     'controller' => 'DashboardMod05Controller',
    //     'action' => 'inserirResponsavel'
    // ); 

    $routes['listarTiposSaneamentos'] = array(
        'route' => '/dashboard/listarTiposSaneamentos',
        'controller' => 'TiposSaneamentosController',
        'action' => 'listarTiposSaneamentos'
    );

    $routes['pesquisarSaneamentos'] = array(
        'route' => '/dashboard/pesquisarSaneamentos',
        'controller' => 'DashboardMod05Controller',
        'action' => 'pesquisarSaneamentos'
    );

    $routes['editarSaneamentos'] = array(
        'route' => '/dashboard/editarSaneamentos',
        'controller' => 'DashboardMod05Controller',
        'action' => 'editarSaneamentos'
    );

    $routes['tiposSaneamentos'] = array(
        'route' => '/dashboard/tiposSaneamentos',
        'controller' => 'DashboardMod05Controller',
        'action' => 'tiposSaneamentos'
    );

    $routes['listarResponsavel'] = array(
        'route' => '/dashboard/listarResponsavel',
        'controller' => 'GestorController',
        'action' => 'listarResponsavel'
    );

    

    $routes['listarViolacoes'] = array(
        'route' => '/dashboard/listarViolacoes',
        'controller' => 'ViolacoesController',
        'action' => 'listarViolacoes'
    );

    $routes['gestaoSetores'] = array(
        'route' => '/dashboard/gestaoSetores',
        'controller' => 'DashboardMod05Controller',
        'action' => 'gestaoSetores'
    );
      
    $routes['listarSetores'] = array(
        'route' => '/dashboard/listarSetores',
        'controller' => 'SetorController',
        'action' => 'listarSetores'
    );
      
    $routes['adicionarSetores'] = array(
        'route' => '/dashboard/adicionarSetores',
        'controller' => 'DashboardMod05Controller',
        'action' => 'adicionarSetores'
    );

    $routes['adicionarResponsavel'] = array(
        'route' => '/dashboard/adicionarResponsavel',
        'controller' => 'DashboardMod05Controller',
        'action' => 'adicionarResponsavel'
    );
    $routes['encaminharEmailDenuncia'] = array(
        'route' => '/dashboard/encaminharEmailDenuncia',
        'controller' => 'DashboardMod05Controller',
        'action' => 'encaminharEmailDenuncia'
    );
    $routes['visualizarPDenuncias'] = array(
        'route' => '/dashboard/visualizarPDenuncias',
        'controller' => 'DashboardMod05Controller',
        'action' => 'visualizarPDenuncias'
    );

    $routes['Mod05_inserirSetores'] = array(
        'route' => '/dashboard/inserirSetor',
        'controller' => 'SetorController',
        'action' => 'inserirSetor'
    );

    $routes['Mod05_listarSetores'] = array(
        'route' => '/dashboard/listarSetores',
        'controller' => 'SetorController',
        'action' => 'listarSetores'
    );

    $routes['pesquisarSetores'] = array(
        'route' => '/dashboard/pesquisarSetores',
        'controller' => 'DashboardMod05Controller',
        'action' => 'pesquisarSetores'
    );

    $routes['Mod05_excluirSetores'] = array(
        'route' => '/dashboard/excluirSetores',
        'controller' => 'SetorController',
        'action' => 'excluirSetores'
    );

     // 19/10/2023 - Glenda

     $routes['alterarSetores'] = array(
        'route' => '/dashboard/alterarSetores',
        'controller' => 'SetorController',
        'action' => 'alterarSetores'
    );
    $routes['Mod05_editarSetores'] = array(
        'route' => '/dashboard/editarSetores',
        'controller' => 'SetorController',
        'action' => 'formEditarSetor'
    );
  
     //  23/11/23 (acrescimo de punição)
    $routes['excluirViolacao'] = array(
        'route' => '/dashboard/excluirViolacao',
        'controller' => 'DashboardMod05Controller',
        'action' => 'excluirViolacao'
    );
    $routes['punirViolacao'] = array(
        'route' => '/dashboard/punirViolacao',
        'controller' => 'ViolacoesController',
        'action' => 'punirViolacao'
    );

     
//Willi
    $routes['Mod05_inserirTiposSaneamentos'] = array(
        'route' => '/dashboard/inserirTiposSaneamentos',
        'controller' => 'TiposSaneamentosController',
        'action' => 'inserirTiposSaneamentos'
    );

    $routes['Mod05_excluirTiposSaneamentos'] = array(
        'route' => '/dashboard/excluirTiposSaneamentos',
        'controller' => 'TiposSaneamentosController',
        'action' => 'excluirTiposSaneamentos'
    );

    // 14/10/2023
    $routes['Mod05_editarTiposSaneamentos'] = array(
        'route' => '/dashboard/editarTiposSaneamentos',
        'controller' => 'TiposSaneamentosController',
        'action' => 'formEditarTiposSaneamentos'
    );

    $routes['alterarTiposSaneamentos'] = array(
        'route' => '/dashboard/alterarTiposSaneamentos',
        'controller' => 'TiposSaneamentosController',
        'action' => 'alterarTiposSaneamentos'
    );

    $routes['teste'] = array(
        'route' => '/dashboard/teste',
        'controller' => 'DashboardMod05Controller',
        'action' => 'teste'
    );

    // 24/11/2023
    // $routes['Mod05_inserirResponsavelPrefeitura'] = array(
    //     'route' => '/dashboard/inserirResponsavelPrefeitura',
    //     'controller' => 'GestorController',
    //     'action' => 'inserirResponsavelPrefeitura'
    // );

    $routes['Mod05_excluirResponsavelPrefeitura'] = array(
        'route' => '/dashboard/excluirResponsavelPrefeitura',
        'controller' => 'GestorController',
        'action' => 'excluirResponsavelPrefeitura'
    );


?>