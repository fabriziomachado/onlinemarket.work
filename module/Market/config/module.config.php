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
                'type' => 'segment',
                'options' => [
                    'route'    => '/market[/]',
                    'defaults' => [
                        'controller' => 'market-index-controller',
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'view' => [
                        'type' => 'Segment',
                         'options' => [
                            'route'    => 'view[/]',
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
                                    'route'    => 'main[/][:category]',
                                    'defaults' => [
                                        'action' => 'index'
                                    ],
                                ],
                            ], # end main route 

                            'item' => [
                                'type'    => 'Segment',
                                'options' => [
                                    'route'    => 'item[/][:itemId]',
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
                        'type' => 'Segment',
                        'options' => [
                            'route'    => 'post[/]',
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
   

    'controllers' => array(
        'invokables' => array(

        ),
        'factories' => array(
            'market-post-controller'  => 'Market\Factory\PostControllerFactory',
            'market-index-controller' => 'Market\Factory\IndexControllerFactory',
            'market-view-controller'  => 'Market\Factory\ViewControllerFactory',
        ),
        'aliases' => array(
            'alt' => 'market-view-controller'
        ),
    ),

    'service_manager' => array(
        'factories' => array(
            # controllers
            'market-post-form'   => 'Market\Factory\PostFormFactory',            
            'market-post-filter' => 'Market\Factory\PostFilterFactory',

            #'market-expire-days' => 'Market\Factory\PostFormFactory',
            #'market-captcha-options' => 'Market\Factory\PostFormFactory',

            
            # Models
            'general-adapter'    => 'Zend\Db\Adapter\AdapterServiceFactory',
            'listings-table'     => 'Market\Factory\ListingsTableFactory',

        ),

         'services' => array(
            'market-expire-days' => array(
                '10',
                '20',
                '30',
            )
        ),
    ),


    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
);
