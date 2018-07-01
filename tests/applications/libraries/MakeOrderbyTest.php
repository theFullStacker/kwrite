<?php


use Kwrite\Lib\MakeOrderby;
use PHPUnit\Framework\TestCase;


class MakeOrderbyTest extends TestCase
{
	public function test_valid()
	{
		$this->assertEquals(MakeOrderby::make("A S C"), "ASC");
		$this->assertEquals(MakeOrderby::make("D E S C"), "DESC");
		$this->assertEquals(MakeOrderby::make("FOO"), "ASC");
		$this->assertEquals(MakeOrderby::make("top"), "ASC");
		$this->assertEquals(MakeOrderby::make("TOP"), "ASC");
		$this->assertEquals(MakeOrderby::make("T O P"), "ASC");
		$this->assertEquals(MakeOrderby::make("bottom"), "DESC");
		$this->assertEquals(MakeOrderby::make("BOTTOM"), "DESC");
		$this->assertEquals(MakeOrderby::make("B O T T O M"), "DESC");
	}
}