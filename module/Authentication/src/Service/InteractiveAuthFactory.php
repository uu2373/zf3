<?php
namespace Authentication\Service;

//use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
//use Zend\ServiceManager\FactoryInterface;
use Zend\Session\SessionManager;

class InteractiveAuthFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return InteractiveAuth
     */
    //public function createService(ServiceLocatorInterface $serviceLocator)
    function __invoke(ContainerInterface $container, $requestedName, array $options = null){
        /** @var $authService Authenticator */

        $authService = $container->get('Authentication\Service\Authenticator');

        /** @var $sessionManager SessionManager */

        $sessionManager = $container->get('Zend\Session\SessionManager');
//        print_r($sessionManager);exit;

        return new InteractiveAuth($authService, $sessionManager);
    }
}
