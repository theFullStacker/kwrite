<?php


use Kwrite\MysqlEngine\Engine\SelectOrderby;
use PHPUnit\Framework\TestCase;


class SelectOrderbyTest extends TestCase
{
	public function testMore()
	{
		$select = new SelectOrderby();
		$select->tableName = "example";
		$select->tableCollumns[0] = "ex0";
		$select->tableCollumns[1] = "ex1";
		$select->tableCollumns[2] = "ex2";
		$select->tableOrderbyCollumn = "name";
		$select->tableOrderbyDirection = "asc";
		$this->assertEquals(
			$select->make(),
			'SELECT ex0, ex1, ex2 FROM example ORDER BY name ASC'
		);
	}

	public function testUnique()
	{
		$select = new SelectOrderby();
		$select->tableName = "example";
		$select->tableCollumns[0] = "ex0";
		$select->tableOrderbyCollumn = "name";
		$select->tableOrderbyDirection = "asc";
		$this->assertEquals(
			$select->make(),
			'SELECT ex0 FROM example ORDER BY name ASC'
		);
	}
}