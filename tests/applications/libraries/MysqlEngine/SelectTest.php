<?php


use Kwrite\MysqlEngine\Engine\Select;
use PHPUnit\Framework\TestCase;


class SelectTest extends TestCase
{
	public function testMore()
	{
		$select = new Select();
		$select->tableName = "example";
		$select->tableCollumns[0] = "ex0";
		$select->tableCollumns[1] = "ex1";
		$select->tableCollumns[2] = "ex2";
		$this->assertEquals(
			$select->make(),
			'SELECT ex0, ex1, ex2 FROM example'
		);
	}

	public function testUnique()
	{
		$select = new Select();
		$select->tableName = "example";
		$select->tableCollumns[0] = "ex0";
		$this->assertEquals(
			$select->make(),
			'SELECT ex0 FROM example'
		);
	}
}