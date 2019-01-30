<?php

namespace LIV\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\ORM\EntityManager;

class DefaultControllerTest extends WebTestCase
{
    public function testShowSingleEvent()
    {
        $client = static::createClient();
        $client->request('GET', '/user/login');

        $this->assertEquals("200", $client->getResponse()->getStatusCode());
    }

    public function testUser(EntityManager $manager)
    {
        $user = $manager->getRepository('LIVUserBundle:User')->find(1);

        $this->assertEquals('foo', $user->getUsername());
        $this->assertEquals('foo@bar.baz', $user->getEmail());
        $this->assertEquals('bar', $user->getPassword());
    }
}
