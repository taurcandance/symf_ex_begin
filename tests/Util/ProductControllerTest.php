<?php

namespace App\Tests;

use App\Controller\ProductController\ProductController;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductControllerTest extends TestCase
{
    public function testBeDefinedProductClass()
    {
        $product = new Product();
        $this->assertInstanceOf(ProductController::class, $product);
    }
}