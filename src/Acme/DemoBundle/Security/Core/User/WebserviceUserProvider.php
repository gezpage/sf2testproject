<?php

namespace Acme\DemoBundle\Security\Core\User;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Acme\DemoBundle\Service\Service;
use Acme\DemoBundle\Entity\User;
use Doctrine\ORM\EntityManager;

/**
 * WebserviceUserProvider
 *
 * @see UserProviderInterface
 */
class WebserviceUserProvider implements UserProviderInterface
{
    private $service;
    private $em;

    /**
     * __construct
     *
     * @param Service       $service
     * @param EntityManager $em
     */
    public function __construct(Service $service, EntityManager $em)
    {
        $this->service  = $service;
        $this->em       = $em;
    }

    /**
     * loadUserByUsername
     *
     * @param string $username
     *
     * @return User
     */
    public function loadUserByUsername($username)
    {
        // Do we have a local record?
        //if ($user = $this->findUserBy(array('email' => $username))) {
            //return $user;
        //}

        // Try service
        if ($record = $this->service->getUser($username)) {
            // Set some fields
            $user = new User();
            $user->setUsername($username);

            return $user;
        }

        throw new UsernameNotFoundException(sprintf('No record found for user %s', $username));
    }

    /**
     * refreshUser
     *
     * @param UserInterface $user
     *
     * @return mixed
     */
    public function refreshUser(UserInterface $user)
    {
        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * supportsClass
     *
     * @param string $class
     *
     * @return bool
     */
    public function supportsClass($class)
    {
        return $class === 'Acme\DemoBundle\Entity\User';
    }

    /**
     * findUserBy
     *
     * @param array $criteria
     *
     * @return mixed
     */
    protected function findUserBy(array $criteria)
    {
        $repository = $this->em->getRepository('Acme\DemoBundle\Entity\User');

        return $repository->findOneBy($criteria);
    }
}
