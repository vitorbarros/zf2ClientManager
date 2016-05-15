<?php
namespace Client\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Client\Entity\Role;

class LoadRole extends AbstractFixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        //salvando a role
        $roleArray = array(
            'role_name' => 'client'
        );

        $role = new Role($roleArray);
        $manager->persist($role);
        $manager->flush();

        //salvando a role
        $roleArray = array(
            'role_name' => 'student'
        );

        $role = new Role($roleArray);
        $manager->persist($role);
        $manager->flush();
    }
}