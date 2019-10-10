<?php

namespace app\tests;

use app\model\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{

    public function testProductName() {
        $this->assertEquals(strpos(Product::class, "app\\"), 0);
    }

    public function testProductTableName() {
        $this->assertEquals((new Product)->getNameTable(), 'product');
    }

}   
 

