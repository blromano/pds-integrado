<?php

//Rota para gerenciar tabela de resultados  
$routes['GerenciarTabelasDeResultados'] = array(
    'route' => '/dashboard/modalidades/GerenciarTabelasDeResultados',
    'controller' => 'ResultadosController',
    'action' => 'GerenciarTabelasDeResultados'
);
  

//Rota inserir os resultados no BD
$routes['InserirResultadosPorModalidade'] = array(
    'route' => '/dashboard/modalidades/InserirResultadosPorModalidade',
    'controller' => 'ResultadosController',
    'action' => 'InserirResultadosPorModalidade'
);

//Rota atualizar os resultados no BD
$routes['AtualizarResultadosPorModalidade'] = array(
    'route' => '/dashboard/modalidades/AtualizarResultadosPorModalidade',
    'controller' => 'ResultadosController',
    'action' => 'AtualizarResultadosPorModalidade'
);
  
