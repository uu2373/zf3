<?php

namespace Authentication\Controller\User;

//use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Mvc\Controller\Plugin\Redirect;
use Zend\Mvc\Router\Http\RouteMatch;
use Zend\Mvc\Application;
use Authentication\Service\InteractiveAuth;


class IndexControllerFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $cm
     * @return IndexController
     */
//    public function createService(ServiceLocatorInterface $cm)
    function __invoke(ContainerInterface $container, $requestedName, array $options = null){

        /** @var Application $app */
        $app = $container->get('Application');
        $event = $app->getMvcEvent();

        /** @var RouteMatch $routeMatch */
        $routeMatch = $event->getRouteMatch();

        if ($routeMatch->getParam('layout')) {
            $viewModel = $event->getViewModel();
            $viewModel->setTemplate($routeMatch->getParam('layout'));
        }

        $redirectToUrl = '/';
        if ($routeMatch->getParam('redirect-to-url')) {
            $redirectToUrl = $routeMatch->getParam('redirect-to-url');
        }

        $plugins = $container->get('ControllerPluginManager');

        /** @var Redirect $redirect */
        $redirect = $plugins->get('redirect');

        $controller = new IndexController(
            $container->get(InteractiveAuth::class),
            $redirect,
            $redirectToUrl
        );

        $redirect->setController($controller);

        return $controller;
    }
}
