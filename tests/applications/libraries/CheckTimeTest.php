<?php 


use Kwrite\Lib\CheckTime;
use PHPUnit\Framework\TestCase;


class CheckTimeTest extends TestCase
{
	public function testUnique()
	{
		$this->assertEquals(CheckTime::make("00:00:00"), true);
		$this->assertEquals(CheckTime::make("23:59:59"), true);
		$this->assertEquals(CheckTime::make("01:00:00"), true);
		$this->assertEquals(CheckTime::make("00 00 00"), false);
		$this->assertEquals(CheckTime::make("2:24:00"), false);
		$this->assertEquals(CheckTime::make("2:24"), false);
		$this->assertEquals(CheckTime::make(""), false);
	}
}