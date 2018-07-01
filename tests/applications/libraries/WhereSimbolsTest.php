<?php


use Kwrite\Lib\MakeWhereSimbols;
use PHPUnit\Framework\TestCase;


class WhereSimbolsTest extends TestCase
{
	public function testBiggerEqual()
	{
		$this->assertEquals(MakeWhereSimbols::make(">="), ">=");
	}

	public function testBigger()
	{
		$this->assertEquals(MakeWhereSimbols::make(">" ), ">" );
	}

	public function testSmallerEqual()
	{
		$this->assertEquals(MakeWhereSimbols::make("<="), "<=");
	}

	public function testSmaller()
	{
		$this->assertEquals(MakeWhereSimbols::make("<" ), "<" );
	}

	public function testDifferent()
	{
		$this->assertEquals(MakeWhereSimbols::make("!="), "!=");
	}

	public function testEqual()
	{
		$this->assertEquals(MakeWhereSimbols::make("=="), "=" );
	}
}