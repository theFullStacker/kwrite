<?php 


use Kwrite\Lib\CheckDatetime;
use PHPUnit\Framework\TestCase;


class CheckDatetimeTest extends TestCase
{
	public function testValid()
	{
		$this->assertEquals(CheckDatetime::make("3000-12-31 23:59:59"), true);
		$this->assertEquals(CheckDatetime::make("1000-01-01 00:00:00"), true);
		$this->assertEquals(CheckDatetime::make("2018-04-17 01:47:00"), true);
		$this->assertEquals(CheckDatetime::make("2018/04/17 01:00:00"), false);
		$this->assertEquals(CheckDatetime::make("2018-04-17 01 00 00"), false);
		$this->assertEquals(CheckDatetime::make("2018 04 17 01 00 00"), false);
		$this->assertEquals(CheckDatetime::make("2018-4-17 00:00:00"), false);
		$this->assertEquals(CheckDatetime::make(""), false);
	}
}