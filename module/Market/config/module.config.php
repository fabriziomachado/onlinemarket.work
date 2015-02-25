<?php

return array(

    'router' => [
        'routes' => [

            'home' => [
                'type' => 'Literal',
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => 'market-index-controller',
                        'action'     => 'index',
                    ],
                ],
            ], // end route home

            'market' => [
                'type' => 'Literal',
                'options' => [
                    'route'    => '/market',
                    'defaults' => [
                        'controller' => 'market-index-controller',
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'view' => [
                        'type' => 'Literal',
                         'options' => [
                            'route'    => '/view',
                            'defaults' => [
                                'controller' => 'market-view-controller',
                                'action' => 'index',
                            ],
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'main' => [
                                'type'    => 'Segment',
                                'options' => [
                                    'route'    => '/main[/][:category]',
                                    'defaults' => [
                                        'controller' => 'market-view-controller',
                                        'action' => 'index'
                                    ],
                                ],
                            ], # end main route 

                            'item' => [
                                'type'    => 'Segment',
                                'options' => [
                                    'route'    => '/item[/][:itemId]',
                                    'defaults' => [
                                        'action' => 'item'
                                    ],
                                    'constraints' => [
                                        'itemId' => '[0-9]*'
                                    ],
                                ],
                            ], # end item route
                        ], # end child_routes for view
                    ], # end view route
                
                    'post' => [
                        'type' => 'Literal',
                        'options' => [
                            'route'    => '/post',
                            'defaults' => [
                                'controller' => 'market-post-controller',
                                'action'     => 'index',
                            ],
                        ],
                    ],// end post route
                ], # end child_routes for market
            ], # end market route

        ], # end routes
    ], # end router
    
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'market-index-controller' => 'Market\Controller\IndexController',
            'market-view-controller' => 'Market\Controller\ViewController'
        ),
        'factories' => array(
            'market-post-controller' => 'Market\Factory\PostControllerFactory'
        ),
        'aliases' => array(
            'alt' => 'market-view-controller'
        ),
    ),
    
);
