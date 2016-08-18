<?php

namespace Authentication\Adapter;

//use Zend\ServiceManager\ServiceLocatorInterface;
//use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;


class PhpArrayFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return PhpArray
     */
//    public function createService(ServiceLocatorInterface $serviceLocator){
    function __invoke(ContainerInterface $container, $requestedName, array $options = null){
        $config = $container->get('Config');

        $authAccounts = [];
        if (isset($config['auth-accounts']) && is_array($config['auth-accounts'])) {
            $authAccounts = $config['auth-accounts'];
        }

        return new PhpArray($authAccounts);
    }
}
