<?php 


use Kwrite\MysqlEngine\Engine\CountWhere;
use PHPUnit\Framework\TestCase;


class CountWhereTest extends TestCase
{
	public function testMore()
	{
		$count = new CountWhere();
		$count->tableName = "example";
		$count->tableCollumn = "id";
		$count->tableWhere[0] = array("wh0", "==", 15);
		$count->tableWhere[1] = array("wh1", "==", "Hello World");
		$count->tableWhere[2] = array("wh2", "==", "foo");
		$this->assertEquals(
			$count->make(),
			'SELECT COUNT(id) AS id FROM example WHERE wh0 = 15 AND wh1 = "Hello World" AND wh2 = "foo"'
		);
	}

	public function testUnique()
	{
		$count = new CountWhere();
		$count->tableName = "example";
		$count->tableCollumn = "id";
		$count->tableWhere[0] = array("wh0", "==", 15);
		$this->assertEquals(
			$count->make(),
			'SELECT COUNT(id) AS id FROM example WHERE wh0 = 15'
		);
	}
}