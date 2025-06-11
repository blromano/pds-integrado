<?php

	$routes['listarInscricaoDeAlunoEmEventos_mod02'] = array(
		'route' => '/listarInscricaoDeAlunoEmEventos_mod02',
		'controller' => 'Alunos_Inscritos_ModalidadesController',
		'action' => 'listarInscricaoDeAlunoEmEventos_mod02'
	);

	$routes['inscricaoModalidades'] = array(
			'route' => '/dashboard/listarmeuseventos/inscricao_modalidades',
			'controller' => 'Alunos_Inscritos_ModalidadesController',
			'action' => 'inscricaoModalidades'
		);

	$routes['inserirModalidades'] = array(
			'route' => '/dashboard/listarmeuseventos/inscricao_modalidades/inserir',
			'controller' => 'Alunos_Inscritos_ModalidadesController',
			'action' => 'inserir'
		);
	$routes['listarInscricaoAlunoModalidades'] = array(
			'route' => '/dashboard/alunos_inscritos_modalidades/listar',
			'controller' => 'Alunos_Inscritos_ModalidadesController',
			'action' => 'listarInscricaoAlunoModalidades'
		);

	$routes['listarAlunosInscritosModalidades'] = array(
		'route' => '/dashboard/meus_eventos_aluno/listar_alunos_modalidades',
		'controller' => 'Alunos_Inscritos_ModalidadesController',
		'action' => 'listarAlunosInscritosModalidades'
	);

	$routes['verificarInscricaoModalidade'] = array(
			'route' => '/listar_alunos_modalidades/verificar',
			'controller' => 'Alunos_Inscritos_ModalidadesController',
			'action' => 'verificarInscricaoModalidade'
	);

	$routes['homologarInscricaoModalidade'] = array(
		'route' => '/listar_alunos_modalidades/verificar/homologar',
		'controller' => 'Alunos_Inscritos_ModalidadesController',
		'action' => 'homologarInscricaoModalidade'
);

	$routes['verificarJustificativa'] = array(
		'route' => '/dashboard/meuseventos/justificativa',
		'controller' => 'Alunos_Inscritos_ModalidadesController',
		'action' => 'verificarJustificativa'
	);

?>