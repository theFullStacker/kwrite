<?php


use Kwrite\MysqlEngine\Engine\Insert;
use PHPUnit\Framework\TestCase;


class InsertTest extends TestCase
{
	public function testMore()
	{
		$insert = new Insert();
		$insert->tableName = "example";
		$insert->ex0 = "ex0 valor";
		$insert->ex1 = "ex1 valor";
		$insert->ex2 = "ex2 valor";
		$this->assertEquals(
			$insert->make(),
			'INSERT INTO example (ex0, ex1, ex2) VALUES ("ex0 valor", "ex1 valor", "ex2 valor")'
		);
	}

	public function testUnique()
	{
		$insert = new Insert();
		$insert->tableName = "example";
		$insert->ex0 = "ex0 valor";
		$this->assertEquals(
			$insert->make(),
			'INSERT INTO example (ex0) VALUES ("ex0 valor")'
		);
	}
}