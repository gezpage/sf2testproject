<?php

namespace Acme\DemoBundle\Service;

use Symfony\Component\Security\Core\User\UserInterface;
use Acme\DemoBundle\Entity\User;

/**
 * Service
 */
class Service
{
    /**
     * authenticate
     *
     * @param mixed $user
     * @param mixed $password
     *
     * @return bool
     */
    public function authenticate($user, $password)
    {
        // Web service call goes here
        return true;
    }

    /**
     * getUser
     *
     * @param string $username
     *
     * @return User
     */
    public function getUser($username)
    {
        $user = new User();
        $user->setUsername($username);

        return $user;
    }
}
