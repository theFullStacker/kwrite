<?php 


use Kwrite\MysqlEngine\Engine\Count;
use PHPUnit\Framework\TestCase;


class CountTest extends TestCase
{
	public function testUnique()
	{
		$count = new Count();
		$count->tableName = "example";
		$count->tableCollumn = "name";
		$this->assertEquals(
			$count->make(),
			'SELECT COUNT(name) AS name FROM example'
		);
	}
}