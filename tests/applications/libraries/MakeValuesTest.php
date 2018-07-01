<?php


use Kwrite\Lib\MakeValues;
use PHPUnit\Framework\TestCase;


class MakeValuesTest extends TestCase
{
	public function testValid()
	{
		$this->assertEquals(MakeValues::make(array("valor0")), '"valor0"');
		$this->assertEquals(MakeValues::make(array("valor0", "valor1", 25)), '"valor0", "valor1", 25');
	}
}