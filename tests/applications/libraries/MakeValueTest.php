<?php


use Kwrite\Lib\MakeValue;
use PHPUnit\Framework\TestCase;


class MakeValueTest extends TestCase
{
	public function testValid()
	{
		$this->assertEquals(MakeValue::make(array()), array());
		$this->assertEquals(MakeValue::make(null), null);
		$this->assertEquals(MakeValue::make(10), "10");
		$this->assertEquals(MakeValue::make(true), "1");
		$this->assertEquals(MakeValue::make(false), "0");
		$this->assertEquals(MakeValue::make(10.5), "10.5");
		$this->assertEquals(MakeValue::make("date();"), '"'.date("Y-m-d").'"');
		$this->assertEquals(MakeValue::make("time();"), '"'.date("H:i:s").'"');
		$this->assertEquals(MakeValue::make("datetime();"), '"'.date("Y-m-d H:i:s").'"');
		$this->assertEquals(MakeValue::make("date: 2010-12-31"), '"2010-12-31"');
		$this->assertEquals(MakeValue::make("time: 00:00:00"), '"00:00:00"');
		$this->assertEquals(MakeValue::make("datetime: 2010-12-31 00:00:00"), '"2010-12-31 00:00:00"');
		$this->assertEquals(MakeValue::make("hello world"), '"hello world"');
		$this->assertEquals(MakeValue::make("hello\" world"), '"hello\" world"');
	}
}