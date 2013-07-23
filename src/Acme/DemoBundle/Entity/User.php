<?php

namespace Acme\DemoBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class User implements UserInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * getRoles
     *
     * @return array
     */
    public function getRoles()
    {
        return array();
    }

    /**
     * getPassword
     *
     * @return string
     */
    public function getPassword()
    {
        return 'password';
    }

    /**
     * getSalt
     *
     * @return string
     */
    public function getSalt()
    {
        return 'salt';
    }

    /**
     * eraseCredentials
     */
    public function eraseCredentials()
    {
    }

    /**
     * equals
     *
     * @param UserInterface $user
     *
     * @return bool
     */
    public function equals(UserInterface $user)
    {
        return ($user === $this);
    }
}
