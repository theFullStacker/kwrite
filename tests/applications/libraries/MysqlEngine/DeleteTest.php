<?php 


use Kwrite\MysqlEngine\Engine\Delete;
use PHPUnit\Framework\TestCase;


class DeleteTest extends TestCase
{
	public function testUnique()
	{
		$delete = new Delete();
		$delete->tableName = "example";
		$this->assertEquals(
			$delete->make(),
			'DELETE FROM example'
		);
	}
}