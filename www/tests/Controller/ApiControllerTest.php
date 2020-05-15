<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    private KernelBrowser $client;

    protected function setUp()
    {
        $this->client = static::createClient();
    }

    public function testPingShouldReturnPong()
    {
        $this->client->request('GET', '/api/ping');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertEquals('{"text":"pong"}', $this->client->getResponse()->getContent());
    }

    public function testGetSoggettiShouldReturnAllItems()
    {
        $this->client->request('GET', '/api/soggetti');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

}