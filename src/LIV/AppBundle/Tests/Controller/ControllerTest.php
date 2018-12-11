<?php

namespace LIV\AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ControllerTest extends WebTestCase
{
    public function testHomePage()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $response = $client->getResponse();

        $this->assertEquals("200", $response->getStatusCode());
    }

    public function testShowPlacesCategoryContent()
    {
        $client = static::createClient();
        $client->request('GET', '/places/common');
        $response = $client->getResponse();

        $this->assertEquals("200", $response->getStatusCode());
    }

    public function testShowSinglePlace()
    {
        $client = static::createClient();
        $client->request('GET', '/places/common/place-0');
        $response = $client->getResponse();

        $this->assertEquals("200", $response->getStatusCode());
        $this->assertContains("place-0", $response->getContent());
    }

    public function testShowEventsCategoryContent()
    {
        $client = static::createClient();
        $client->request('GET', '/events/common');
        $response = $client->getResponse();

        $this->assertEquals("200", $response->getStatusCode());
    }

    public function testShowSingleEvent()
    {
        $client = static::createClient();
        $client->request('GET', '/events/common/event-0');
        $response = $client->getResponse();

        $this->assertEquals("200", $response->getStatusCode());
        $this->assertContains("event-0", $response->getContent());
    }
}
