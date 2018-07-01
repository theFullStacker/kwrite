<?php 


use Kwrite\MysqlEngine\Engine\SelectWhereOrderbyLimit;
use PHPUnit\Framework\TestCase;


class SelectWhereOrderbyLimitTest extends TestCase
{
	public function testMore()
	{
		$select = new SelectWhereOrderbyLimit();
		$select->tableName = "example";
		$select->tableLimit = 15;
		$select->tableCollumns[0] = "ex0";
		$select->tableCollumns[1] = "ex1";
		$select->tableCollumns[2] = "ex2";
		$select->tableOrderbyCollumn = "name";
		$select->tableOrderbyDirection = "asc";
		$select->tableWhere[0] = array("wh0", "==", 15);
		$select->tableWhere[1] = array("wh1", "==", "Hello World");
		$select->tableWhere[2] = array("wh2", "==", "foo");
		$this->assertEquals(
			$select->make(),
			'SELECT ex0, ex1, ex2 FROM example WHERE wh0 = 15 AND wh1 = "Hello World" AND wh2 = "foo" ORDER BY name ASC LIMIT 15'
		);
	}

	public function testUnique()
	{
		$select = new SelectWhereOrderbyLimit();
		$select->tableName = "example";
		$select->tableLimit = 15;
		$select->tableCollumns[0] = "ex0";
		$select->tableOrderbyCollumn = "name";
		$select->tableOrderbyDirection = "asc";
		$select->tableWhere[0] = array("wh0", "==", 15);
		$this->assertEquals(
			$select->make(),
			'SELECT ex0 FROM example WHERE wh0 = 15 ORDER BY name ASC LIMIT 15'
		);
	}
}