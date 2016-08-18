<?php

namespace Authentication\Service;

//use Zend\ServiceManager\ServiceLocatorInterface;
//use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\AuthenticationService;

class AuthenticatorFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return Authenticator
     */
    //public function createService(ServiceLocatorInterface $serviceLocator) {
    function __invoke(ContainerInterface $container, $requestedName, array $options = null){
        return new Authenticator(
            new AuthenticationService(),
            $container->get(AdapterInterface::class)
        );
    }
}
