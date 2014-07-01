<?php
/**
 * Created by PhpStorm.
 * User: abc
 * Date: 14-6-27
 * Time: 上午10:46
 */
return array(
    'controllers' => array(
        'invokables' => array(
            'AlbumController' => 'Album\Controller\AlbumController',
        ),
    ),
    'router' => array(
        'routes' => array(
            //路由名
            'album' => array(
                //路由类型 Zend\Mvc\Router\Http\Segment
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/album[/][:action][/:id]',
                    //路由规则
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    //默认路由
                    'defaults' => array(
                        'controller' => 'AlbumController',
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
);