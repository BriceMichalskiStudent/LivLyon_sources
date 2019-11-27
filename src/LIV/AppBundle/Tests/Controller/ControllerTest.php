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

    public function testDisplayContactPage()
    {
        $client = static::createClient();
        $client->request('GET', '/contact');
        $response = $client->getResponse();

        $this->assertEquals("200", $response->getStatusCode());
    }

    public function testDisplayAboutUsPage()
    {
        $client = static::createClient();
        $client->request('GET', '/about-livlyon');
        $response = $client->getResponse();

        $this->assertEquals("200", $response->getStatusCode());
    }

    public function testPlace()
    {
        $clientList = static::createClient();
        $clientList->request('GET', '/places/common');
        $response = $clientList->getResponse();

        $this->assertEquals("200", $response->getStatusCode());

        $client = static::createClient();
        $client->request('GET', '/places/common/place-0');

        $this->assertEquals("200", $client->getResponse()->getStatusCode());
        $this->assertContains("place-0", $client->getResponse()->getContent());
    }

    public function testEvent()
    {
        $clientList = static::createClient();
        $clientList->request('GET', '/events/common');

        $this->assertEquals("200", $clientList->getResponse()->getStatusCode());

        $client = static::createClient();
        $client->request('GET', '/events/common/event-0');
        $response = $client->getResponse();

        $this->assertEquals("200", $response->getStatusCode());
        $this->assertContains("event-0", $response->getContent());
    }

    public function testTag()
    {
        $client = static::createClient();
        $client->request('GET', '/tags/common-tag');
        $response = $client->getResponse();

        $this->assertEquals("200", $response->getStatusCode());
        $this->assertContains("common-tag", $response->getContent());

        $client->request('GET', '/tags/tag-1');
        $response2 = $client->getResponse();

        $this->assertEquals("200", $response2->getStatusCode());
        $this->assertContains("tag-1", $response2->getContent());
        $this->assertContains("place-1", $response2->getContent());
    }

    public function testNotFound()
    {
        $client = static::createClient();

        $client->request('GET', '/events/common/fooBarBaz');
        $response = $client->getResponse();
        $this->assertEquals("404", $response->getStatusCode());

        $client->request('GET', '/places/common/fooBarBaz');
        $response = $client->getResponse();
        $this->assertEquals("404", $response->getStatusCode());
    }

    public function testAroundMe()
    {
        $client = static::createClient();
        $client->request('GET', '/around-me');
        $response = $client->getResponse();

        $this->assertEquals("200", $response->getStatusCode());
        $this->assertContains("Autour", $response->getContent());
    }

    public function testInterviewList()
    {
        $clientList = static::createClient();
        $clientList->request('GET', '/fanzine');
        $responseList = $clientList->getResponse();

        $this->assertEquals("200", $responseList->getStatusCode());
        $this->assertContains("Cap_Phi3", $responseList->getContent());

        $client = static::createClient();
        $client->request('GET', '/fanzine');
        $response = $client->getResponse();

        $this->assertEquals("200", $response->getStatusCode());
        $this->assertContains("Cap_Phi3", $response->getContent());
    }
}
