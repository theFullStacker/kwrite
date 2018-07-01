<?php


use Kwrite\Lib\MakeWhere;
use PHPUnit\Framework\TestCase;


class MakeWhereTest extends TestCase
{
	public function testValid()
	{
		$assert0 = array(
			array("label0", "==", 15),
			array("label1", "==", "Hello World")
		);

		$this->assertEquals(MakeWhere::make(array(array("label0", "==", 15))), "label0 = 15" );
		$this->assertEquals(MakeWhere::make(array(array("label0", ">=", 15))), "label0 >= 15");
		$this->assertEquals(MakeWhere::make(array(array("label0", "<=", 15))), "label0 <= 15");
		$this->assertEquals(MakeWhere::make(array(array("label0", ">" , 15))), "label0 > 15" );
		$this->assertEquals(MakeWhere::make(array(array("label0", "<" , 15))), "label0 < 15" );
		$this->assertEquals(MakeWhere::make(array(array("label0", "!=", 15))), "label0 != 15");
		$this->assertEquals(MakeWhere::make($assert0), 'label0 = 15 AND label1 = "Hello World"');
	}
}