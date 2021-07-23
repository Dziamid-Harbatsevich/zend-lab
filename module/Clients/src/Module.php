<?php

declare(strict_types=1);

namespace Clients;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig(): array
    {
        /** @var array $config */
        $config = include __DIR__ . '/../config/module.config.php';
        return $config;
    }

    public function getServiceConfig()
    {
    	return [
    		'factories' => [
    			Model\ClientsTable::class => function($container){
    				$tableGateway = $container->get(Model\ClientsTableGateway::class);
    				return new Model\ClientsTable($tableGateway);
    			},
    			Model\ClientsTableGateway::class => function($container){
    				$adapter = $container->get(AdapterInterface::class);
    				$resultSetPrototype = new ResultSet();
    				$resultSetPrototype->setArrayObjectPrototype(new Model\Clients);
    				return new TableGateway('clients', $adapter, null, $resultSetPrototype);
    			}
    		]
    	];
    }

    public function getControllerConfig()
    {
    	return [
    		'factories' => [
    			Controller\IndexController::class => function($container){
    				return new Controller\IndexController($container->get(Model\ClientsTable::class));
    			}
    		]
    	];
    }
}
