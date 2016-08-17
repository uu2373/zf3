<?php

namespace Authentication\Listener;

use Zend\Authentication\AuthenticationService;
use Authentication\AuthenticationEvent;

class DispatchAuthentication
{
    /**
     * @var AuthenticationService
     */
    protected $authService;

    /**
     * @param AuthenticationService $authService
     */
    public function __construct(AuthenticationService $authService)
    {
        $this->authService = $authService;
    }

    public function __invoke(AuthenticationEvent $e)
    {
        $e->setResult($this->authService->authenticate($e->getAdapter()));
    }
}
