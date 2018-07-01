<?php


use Kwrite\Lib\MakeCollumns;
use PHPUnit\Framework\TestCase;


class MakeCollumnsTest extends TestCase
{
	public function test_valid()
	{
		$this->assertEquals(MakeCollumns::make(array("ex1")), "ex1");
		$this->assertEquals(MakeCollumns::make(array("ex1", "ex2", "ex3")), "ex1, ex2, ex3");
	}
}