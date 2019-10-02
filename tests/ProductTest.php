<?php

namespace app\tests;

use app\model\Model;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{

    public function testProduct() {
        $this->assertEquals(strpos(Model::class, "app\\"), 0);
    }

}   

