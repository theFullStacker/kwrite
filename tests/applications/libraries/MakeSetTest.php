<?php


use Kwrite\Lib\MakeSet;
use PHPUnit\Framework\TestCase;


class MakeSetTest extends TestCase
{
	public function test_valid()
	{
		$this->assertEquals(MakeSet::make(array("name" => "name updated at")), 'name = "name updated at"');
		$this->assertEquals(MakeSet::make(array("name" => "name updated at","email" => "email updated at","password" => "password updated at")), 'name = "name updated at", email = "email updated at", password = "password updated at"');
	}
}