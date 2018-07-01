<?php


use Kwrite\MysqlEngine\Engine\DeleteWhere;
use PHPUnit\Framework\TestCase;


class DeleteWhereTest extends TestCase
{
	public function testMore()
	{
		$delete = new DeleteWhere();
		$delete->tableName = "example";
		$delete->tableWhere[0] = array("wh0", "==", 15);
		$delete->tableWhere[1] = array("wh1", "==", "Hello World");
		$delete->tableWhere[2] = array("wh2", "==", "foo");
		$this->assertEquals(
			$delete->make(),
			'DELETE FROM example WHERE wh0 = 15 AND wh1 = "Hello World" AND wh2 = "foo"'
		);
	}

	public function testUnique()
	{
		$delete = new DeleteWhere();
		$delete->tableName = "example";
		$delete->tableWhere[0] = array("wh0", "==", 15);
		$this->assertEquals(
			$delete->make(),
			'DELETE FROM example WHERE wh0 = 15'
		);
	}
}