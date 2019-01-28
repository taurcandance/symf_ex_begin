<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerShowMethodTest extends WebTestCase
{
    private $client;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->client = static::createClient();
    }

    public function testShowProductControllerMethod_show_all()
    {
        $this->client->request('GET', '/show_all');
        self::checkStatusResponse(200);
    }

    public function testShowProductControllerMethod_delete()
    {
        $this->client->request('GET', '/delete/8');
        self::checkStatusResponse(404);
    }

    public function testShowProductControllerMethod_update()
    {
        $this->client->request('GET', '/product/update/10');
        self::checkStatusResponse(302);
    }

    public function testShowProductControllerMethod_show()
    {
        $this->client->request('GET', '/show/9');
        self::checkStatusResponse(200);
    }

    public function testShowProductControllerMethod_save()
    {
        $this->client->request('GET', '/save_product');
        self::checkStatusResponse(200);
    }

    public function checkStatusResponse($responseCode)
    {
        $this->assertEquals($responseCode, $this->client->getResponse()->getStatusCode());
    }
}