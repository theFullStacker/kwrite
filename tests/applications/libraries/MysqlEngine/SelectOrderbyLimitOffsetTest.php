<?php


use Kwrite\MysqlEngine\Engine\SelectOrderbyLimitOffset;
use PHPUnit\Framework\TestCase;


class SelectOrderbyLimitOffsetTest extends TestCase
{
	public function testMore()
	{
		$select = new SelectOrderbyLimitOffset();
		$select->tableName = "example";
		$select->tableLimit = 15;
		$select->tableOffset = 20;
		$select->tableCollumns[0] = "ex0";
		$select->tableCollumns[1] = "ex1";
		$select->tableCollumns[2] = "ex2";
		$select->tableOrderbyCollumn = "name";
		$select->tableOrderbyDirection = "asc";
		$this->assertEquals(
			$select->make(),
			'SELECT ex0, ex1, ex2 FROM example ORDER BY name ASC LIMIT 15 OFFSET 20'
		);
	}

	public function testUnique()
	{
		$select = new SelectOrderbyLimitOffset();
		$select->tableName = "example";
		$select->tableLimit = 15;
		$select->tableOffset = 20;
		$select->tableCollumns[0] = "ex0";
		$select->tableOrderbyCollumn = "name";
		$select->tableOrderbyDirection = "asc";
		$this->assertEquals(
			$select->make(),
			'SELECT ex0 FROM example ORDER BY name ASC LIMIT 15 OFFSET 20'
		);
	}
}