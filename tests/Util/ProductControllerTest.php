<?php

namespace App\Tests;

use App\Controller\ProductController\ProductController;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductControllerTest extends TestCase
{
    public function testBeDefinedProductClass()
    {
        $product = new ProductController();
        $this->assertInstanceOf(AbstractController::class, $product);
    }
}