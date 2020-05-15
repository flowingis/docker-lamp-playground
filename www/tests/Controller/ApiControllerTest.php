<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    public function testPing()
    {
        $client = static::createClient();

        $client->request('GET', '/api/ping');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('{"text":"pong"}', $client->getResponse()->getContent());
    }
}