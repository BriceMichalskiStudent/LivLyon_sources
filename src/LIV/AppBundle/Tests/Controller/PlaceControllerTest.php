<?php

namespace LIV\AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PlaceControllerTest extends WebTestCase
{
    public function testShow()
    {
        $client = static::createClient();

        $client->request('GET', '/api/places/1');
        $response = $client->getResponse();


        $this->assertEquals("200", $response->getStatusCode());
        $this->assertTrue(
            $response->headers->contains(
                'Content-Type',
                'application/json'
            ),
            'the "Content-Type" header is "application/json"' // optional message shown on failure
        );
    }

    public function testCreate()
    {
        $client = static::createClient();

        $client->request(
            'POST',
            '/api/places',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{
                "name":"foo",
                "rating":4,
                "full_description":"some long description",
                "short_description":"some short description",
                "city":"foo",
                "zip_code":"bar",
                "street":"baz",
                "street_number":"28",
                "latitude": 48.8737793,
                "longitude":2.2950155999999424, 
                "information": "24H/24 - 7J/7"  
            }'
        );

        $response = $client->getResponse();

        $this->assertEquals("201", $response->getStatusCode());
    }
}
