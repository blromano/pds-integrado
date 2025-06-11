<?php

    //Rota para área de certificados   
    $routes['Certificado_mod05'] = array(
        'route' => '/certificado',
        'controller' => 'CertificadoController',
        'action' => 'certificado'
    );

    //Rota para fazer o download do certificado emitido
    $routes['BaixarCertificado_mod05'] = array(
        'route' => '/certificado/baixarcertificado',
        'controller' => 'CertificadoController',
        'action' => 'baixarcertificado'
    );
    
    //Rota para fazer o download do certificado emitido
    $routes['BaixarCertificado_mod05'] = array(
        'route' => '/certificado/visualizarcertificado',
        'controller' => 'CertificadoController',
        'action' => 'visualizaarcertificado'
    );





