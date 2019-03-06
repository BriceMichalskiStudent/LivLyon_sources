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
        $user->setPlainPassword("bar");
        $user->setRoles(['ROLE_USER']);
        $user->setEnabled(true);

        $admin = new User();

        $admin->setUsername("admin");
        $admin->setEmail("mailer.dev.brice@gmail.com");
        $admin->setPlainPassword("Admin1234");
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setEnabled(true);

        $manager->persist($user);
        $manager->persist($admin);
        $manager->flush();
    }
}
