<?php

namespace LIV\UserBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use LIV\UserBundle\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();

        $userAdmin->setUsername("admin");
        $userAdmin->setEmail("foo@bar.baz");
        $userAdmin->setPassword("adminpass");

        $manager->persist($userAdmin);
        $manager->flush();

        // other fixtures can get this object using the UserFixtures::ADMIN_USER_REFERENCE constant
        $this->addReference(self::ADMIN_USER_REFERENCE, $userAdmin);
    }
}
