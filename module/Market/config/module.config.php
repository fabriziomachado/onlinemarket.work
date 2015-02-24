<?php

return array(

    'router' => array(
        'routes' => array(
            'market' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/market',
                    'defaults' => array(
                        'controller' => 'Market\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'Market\Controller\Index' => 'Market\Controller\IndexController'
        ),
    ),
    
);
