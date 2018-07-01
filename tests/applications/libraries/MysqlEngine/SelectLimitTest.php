<?php


use Kwrite\MysqlEngine\Engine\SelectLimit;
use PHPUnit\Framework\TestCase;


class SelectLimitTest extends TestCase
{
	public function testMore()
	{
		$select = new SelectLimit();
		$select->tableName = "example";
		$select->tableLimit = 15;
		$select->tableCollumns[0] = "ex0";
		$select->tableCollumns[1] = "ex1";
		$select->tableCollumns[2] = "ex2";
		$this->assertEquals(
			$select->make(),
			'SELECT ex0, ex1, ex2 FROM example LIMIT 15'
		);
	}

	public function testUnique()
	{
		$select = new SelectLimit();
		$select->tableName = "example";
		$select->tableLimit = 15;
		$select->tableCollumns[0] = "ex0";
		$this->assertEquals(
			$select->make(),
			'SELECT ex0 FROM example LIMIT 15'
		);
	}
}