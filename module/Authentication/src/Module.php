<?php

namespace Authentication;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\EventManager\EventInterface;

class Module// implements ConfigProviderInterface//, ControllerProviderInterface
{
    public function getConfig() {
        return include __DIR__ . '/../config/module.config.php';

    }
/*
    public function getControllerConfig()
    {
        return [
            'factories' => [

            ]
        ];
    }

*/
}
