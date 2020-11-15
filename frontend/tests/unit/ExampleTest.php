<?php

namespace frontend\tests;

use common\models\User;
use Codeception\Test\Unit;


class ExampleTest extends Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $numbers = [3, 7, 6, 1, 5];
        $Average = new \Average();
        $this->assertEquals(4.4, $Average->mean($numbers));
    }


}