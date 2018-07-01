<?php 


use Kwrite\Lib\CheckLimit;
use PHPUnit\Framework\TestCase;


class CheckLimitTest extends TestCase
{
	public function testValid()
	{
		$this->assertEquals(CheckLimit::make("hello world", 0, 11), false);
		$this->assertEquals(CheckLimit::make("hello worlds", 0, 11), true);
		$this->assertEquals(CheckLimit::make("hel", 5, 11), true);
		$this->assertEquals(CheckLimit::make("hello world", 11, 11), false);
	}
}