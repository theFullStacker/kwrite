<?php 


use Kwrite\MysqlEngine\Engine\DeleteWhereLimit;
use PHPUnit\Framework\TestCase;


class DeleteWhereLimitTest extends TestCase
{
	public function testMore()
	{
		$delete = new DeleteWhereLimit();
		$delete->tableName = "example";
		$delete->tableWhere[0] = array("wh0", "==", 15);
		$delete->tableWhere[1] = array("wh1", "==", "Hello World");
		$delete->tableWhere[2] = array("wh2", "==", "foo");
		$delete->tableLimit = 15;
		$this->assertEquals(
			$delete->make(),
			'DELETE FROM example WHERE wh0 = 15 AND wh1 = "Hello World" AND wh2 = "foo" LIMIT 15'
		);
	}

	public function testUnique()
	{
		$delete = new DeleteWhereLimit();
		$delete->tableName = "example";
		$delete->tableWhere[0] = array("wh0", "==", 15);
		$delete->tableLimit = 15;
		$this->assertEquals(
			$delete->make(),
			'DELETE FROM example WHERE wh0 = 15 LIMIT 15'
		);
	}
}