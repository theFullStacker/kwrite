<?php 


use Kwrite\Lib\CheckEmpty;
use PHPUnit\Framework\TestCase;


class CheckEmptyTest extends TestCase
{
	public function testValid()
	{
		$this->assertEquals(CheckEmpty::make(""), true);
		$this->assertEquals(CheckEmpty::make("hello world"), false);
	}
}