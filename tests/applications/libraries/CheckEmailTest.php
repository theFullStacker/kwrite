<?php 


use Kwrite\Lib\CheckEmail;
use PHPUnit\Framework\TestCase;


class CheckEmailTest extends TestCase
{
	public function testValid()
	{
		$this->assertEquals(CheckEmail::make("my-email@foo.com"), true);
		$this->assertEquals(CheckEmail::make("a@a.a"), true);
		$this->assertEquals(CheckEmail::make("my_email@foo.com"), true);
		$this->assertEquals(CheckEmail::make("myemail500@foo.com"), true);
		$this->assertEquals(CheckEmail::make("my_email@foo.a.b.c.d"), true);
		$this->assertEquals(CheckEmail::make("@myemail.com"), false);
		$this->assertEquals(CheckEmail::make("myemail@@foo.com"), false);
		$this->assertEquals(CheckEmail::make("myemail.@foo.com"), false);
		$this->assertEquals(CheckEmail::make("myemail@foo.com@"), false);
		$this->assertEquals(CheckEmail::make("myemail.com"), false);
		$this->assertEquals(CheckEmail::make("my email@foo.com"), false);
		$this->assertEquals(CheckEmail::make("my@email.@com"), false);
		$this->assertEquals(CheckEmail::make("my@email..com"), false);
		$this->assertEquals(CheckEmail::make(".my@email.com"), false);
		$this->assertEquals(CheckEmail::make("my@email.com."), false);
		$this->assertEquals(CheckEmail::make(""), false);
	}
}