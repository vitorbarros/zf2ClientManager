<?php
namespace Client\Fixture;

use Client\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Client\Entity\Role;

class LoadUser extends AbstractFixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        //salvando a role
        $roleArray = array(
            'role_name' => 'admin'
        );

        $role = new Role($roleArray);
        $manager->persist($role);

        $userArray = array(
            'user_username' => 'admin',
            'user_password' => 'admin',
            'user_status' => 1,
            'role' => $role
        );

        $user = new User($userArray);
        $manager->persist($user);

        $manager->flush();
    }
}