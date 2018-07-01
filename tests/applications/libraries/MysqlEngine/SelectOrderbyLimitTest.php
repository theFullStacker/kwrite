<?php


use Kwrite\MysqlEngine\Engine\SelectOrderbyLimit;
use PHPUnit\Framework\TestCase;


class SelectOrderbyLimitTest extends TestCase
{
	public function testMore()
	{
		$select = new SelectOrderbyLimit();
		$select->tableName = "example";
		$select->tableLimit = 15;
		$select->tableCollumns[0] = "ex0";
		$select->tableCollumns[1] = "ex1";
		$select->tableCollumns[2] = "ex2";
		$select->tableOrderbyCollumn = "name";
		$select->tableOrderbyDirection = "asc";
		$this->assertEquals(
			$select->make(),
			'SELECT ex0, ex1, ex2 FROM example ORDER BY name ASC LIMIT 15'
		);
	}

	public function testUnique()
	{
		$select = new SelectOrderbyLimit();
		$select->tableName = "example";
		$select->tableLimit = 15;
		$select->tableCollumns[0] = "ex0";
		$select->tableOrderbyCollumn = "name";
		$select->tableOrderbyDirection = "asc";
		$this->assertEquals(
			$select->make(),
			'SELECT ex0 FROM example ORDER BY name ASC LIMIT 15'
		);
	}
}