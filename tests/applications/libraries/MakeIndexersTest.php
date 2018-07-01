<?php


use Kwrite\Lib\MakeIndexers;
use PHPUnit\Framework\TestCase;


class MakeIndexersTest extends TestCase
{
	public function test_valid()
	{
		$this->assertEquals(MakeIndexers::make(array("idx1", "idx2", "idx3")), "idx1, idx2, idx3");
		$this->assertEquals(MakeIndexers::make(array("idx1")), "idx1");
	}
}