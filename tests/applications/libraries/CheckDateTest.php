<?php 


use Kwrite\Lib\CheckDate;
use PHPUnit\Framework\TestCase;


class CheckDateTest extends TestCase
{
	public function testValid()
	{
		$this->assertEquals(CheckDate::make("3000-12-31"), true);
		$this->assertEquals(CheckDate::make("1000-01-01"), true);
		$this->assertEquals(CheckDate::make("2018-05-11"), true);
		$this->assertEquals(CheckDate::make("2018/04/17"), false);
		$this->assertEquals(CheckDate::make("2018/abr/17"), false);
		$this->assertEquals(CheckDate::make(""), false);
		$this->assertEquals(CheckDate::make("2018/4/17"), false);
		$this->assertEquals(CheckDate::make("2018-4-17"), false);
		$this->assertEquals(CheckDate::make("2018-04-5"), false);
		$this->assertEquals(CheckDate::make("2018.04.05"), false);
	}
}