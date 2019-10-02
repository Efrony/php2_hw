<?php

namespace app\tests;

use PHPUnit\Framework\TestCase;

class ControllersTest extends TestCase // бесполезный тест, просто балуюсь)
{
    /** 
    * @dataProvider provider_testFileExists
    */
    public function testFileExists($controllerName) {

        $this->assertFileExists("controllers\\{$controllerName}Controller.php");
    }

    public function provider_testFileExists() {
        return [['Api'], ['Cart'], ['Catalog'], ['Comments']];
    }
}

