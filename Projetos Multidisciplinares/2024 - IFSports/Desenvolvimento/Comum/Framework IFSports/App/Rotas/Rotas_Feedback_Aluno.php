<?php

   
    //Rota para área de informar feedback  
    $routes['InformarFeedback'] = array(
        'route' => '/eventos/InformarFeedback',
        'controller' => 'Feedback_AlunoController',
        'action' => 'InformarFeedback'
    );
    //Rota para área de acompanhar feedback  
    $routes['AcompanharFeedback'] = array(
        'route' => '/eventos/AcompanharFeedback',
        'controller' => 'Feedback_AlunoController',
        'action' => 'AcompanharFeedback'
    );
