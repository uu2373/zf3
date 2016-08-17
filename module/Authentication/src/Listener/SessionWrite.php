<?php

namespace Authentication\Listener;

use Zend\Session\SessionManager;
use Authentication\AuthenticationEvent;
use Authentication\Exception\RuntimeException;

class SessionWrite
{
    /**
     * @var SessionManager
     */
    protected $sessionManager;

    /**
     * @param SessionManager $sessionManager
     * @throws RuntimeException
     */
    public function __construct(SessionManager $sessionManager)
    {
        $this->sessionManager = $sessionManager;
    }

    public function __invoke(AuthenticationEvent $e)
    {
        $result = $e->getResult();

        if ($result->isValid()) {
            $this->sessionManager->writeClose();
        }
    }
}
