<?php
/**
 * Created by PhpStorm.
 * User: abc
 * Date: 14-7-1
 * Time: 下午4:25
 */
namespace AbUser;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface,AutoloaderProviderInterface
{
    public function getConfig()
    {
        return include __DIR__.'/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\loader\StandardAutoLoader'=>array(
                'namespaces'=>array(
                    __NAMESPACE__=>__DIR__.'/src/'.__NAMESPACE__,
                )
            )
        );
    }
    //依赖检查，自动检测有依赖AbBase
    public function getModuleDependencies()
    {
        return array(
            'AbBase'
        );

    }

    public function getControllerConfig()
    {
        return array(
            'invokables'=>array(
                'AbUser\Controller\User'=>'AbUser\Controller\UserController'
            )

        );
    }


}