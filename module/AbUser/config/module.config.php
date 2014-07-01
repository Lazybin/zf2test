<?php
/**
 * Created by PhpStorm.
 * User: abc
 * Date: 14-7-1
 * Time: 下午4:39
 */
return array(
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'router'=>array(
        'routes'=>array(
            //路由名
            'AbUser-user' => array(
                //路由类型 Zend\Mvc\Router\Http\Segment
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/user[/][:action][/:id].html',
                    //路由规则
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    //默认路由
                    'defaults' => array(
                        'controller' => 'AbUser\Controller\User',
                        'action'     => 'index',
                    ),
                ),
            ),
        )
    )
);