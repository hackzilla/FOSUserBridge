<?php

namespace Hackzilla\Bundle\FOSUserBridgeBundle\User;

use Hackzilla\Interfaces\User\UserInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FOSUser implements UserInterface
{
    private $securityContext;
    private $userManager;

    function __construct(ContainerInterface $container)
    {
        $this->securityContext = $container->get('security.context');
        $this->userManager = $container->get('fos_user.user_manager');
    }

    /**
     * @return mixed
     */
    public function getCurrentUser()
    {
        $user = $this->securityContext->getToken()->getUser();

        return $user;
    }

    /**
     * @param integer $userId
     * @return mixed
     */
    public function getUserById($userId)
    {
        $user = $this->userManager->findUserBy(array(
            'id' => $userId,
        ));

        return $user;
    }

    /**
     * @param $user
     * @param string $role
     * @return boolean
     */
    public function hasRole($user, $role)
    {
        return $user->hasRole($role);
    }

    /**
     * Current user granted permission
     *
     * @param $user
     * @param string $role
     * @return boolean
     */
    public function isGranted($user, $role)
    {
        return $this->securityContext->isGranted($role);
    }
}
