<?php

namespace LIV\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testShowSingleEvent()
    {
        $client = static::createClient();
        $client->request('GET', '/user/login');

        $this->assertEquals("200", $client->getResponse()->getStatusCode());
    }
}
