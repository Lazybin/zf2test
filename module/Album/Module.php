<?php
/**
 * Created by PhpStorm.
 * User: abc
 * Date: 14-6-27
 * Time: 上午10:38
 */
namespace Album;

use Album\Model\Album;
use Album\Model\AlbumTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Module implements ConfigProviderInterface,
      AutoloaderProviderInterface,
      ServiceProviderInterface
{
    public function getConfig()
    {
           return include __DIR__ . "/config/module.config.php";
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
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Album\Model\AlbumTable' =>  function(ServiceLocatorInterface $sm) {
                        $tableGateway = $sm->get('AlbumTableGateway');
                        $table = new AlbumTable($tableGateway);
                        return $table;
                    },
                'AlbumTableGateway' => function (ServiceLocatorInterface $sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Album());
                        return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
                    },
            ),
        );
    }
}