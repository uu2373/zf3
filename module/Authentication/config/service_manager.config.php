<?php

namespace Authentication;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\AuthenticationService;

use Zend\Session\Service\SessionManagerFactory;
use Zend\Session\SessionManager;

//print_r(Zend\Session\SessionManager::class);exit;

return [
    'factories' => [
        AdapterInterface::class => Adapter\PhpArrayFactory::class,
        Service\Checker::class => Service\CheckerFactory::class,
        Service\Authenticator::class => Service\AuthenticatorFactory::class,
        Service\InteractiveAuth::class => Service\InteractiveAuthFactory::class,

        Listener\DispatchAuthentication::class => Listener\DispatchAuthenticationFactory::class,
        Listener\SessionWrite::class => Listener\SessionWriteFactory::class,

//+uu
//        Zend\Session\SessionManager::class =>Zend\Session\Service\SessionManagerFactory::class,
        'Zend\Session\SessionManager'         => 'Zend\Session\Service\SessionManagerFactory' ,


    ],
    'aliases' => [
        AuthenticationService::class => Service\Authenticator::class,
    ],
];
