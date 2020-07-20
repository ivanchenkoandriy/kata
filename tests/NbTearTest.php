<?php

use PHPUnit\Framework\TestCase;

class NbTearTest extends TestCase
{
    public function testNb_yearNegativePopulationAtTheBeginning()
    {
        $this->expectException(InvalidArgumentException::class);
        $result = nb_year(-1000, 0, 0, 0);
    }

    public function testNb_yearZeroPercent()
    {
        $this->expectException(InvalidArgumentException::class);
        $result = nb_year(0, 0, 0, 0);
    }

    public function testNb_yearNegativePercent()
    {
        $this->expectException(InvalidArgumentException::class);
        $result = nb_year(0, -1, 0, 0);
    }

    public function testNb_yearCheckTask1()
    {
        $result = nb_year(1500, 5, 100, 5000);
        $this->assertEquals(15, $result, 'Must be 15.');
    }

    public function testNb_yearCheckTask2()
    {
        $result = nb_year(1500000, 2.5, 10000, 2000000);
        $this->assertEquals(10, $result, 'Must be 10.');
    }
}
