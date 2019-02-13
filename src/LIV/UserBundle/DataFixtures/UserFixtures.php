<?php

namespace LIV\UserBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use LIV\UserBundle\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername("foo");
        $user->setEmail("foo@bar.baz");
        $user->setPassword("bar");
        $user->setRoles(['ROLE_USER']);

        $admin = new User();

        $admin->setUsername("admin");
        $admin->setEmail("mailer.dev.brice@gmail.com");
        $admin->setPassword("admin");
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($user);
        $manager->persist($admin);
        $manager->flush();

    }
}
