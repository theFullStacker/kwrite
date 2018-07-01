<?php 


use Kwrite\MysqlEngine\Engine\DeleteLimit;
use PHPUnit\Framework\TestCase;


class DeleteLimitTest extends TestCase
{
	public function testUnique()
	{
		$delete = new DeleteLimit();
		$delete->tableName = "example";
		$delete->tableLimit = 15;
		$this->assertEquals(
			$delete->make(),
			'DELETE FROM example LIMIT 15'
		);
	}
}