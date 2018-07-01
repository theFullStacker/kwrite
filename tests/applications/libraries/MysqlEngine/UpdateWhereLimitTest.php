<?php


use Kwrite\MysqlEngine\Engine\UpdateWhereLimit;
use PHPUnit\Framework\TestCase;


class UpdateWhereLimitTest extends TestCase
{
	public function testMore()
	{
		$update = new UpdateWhereLimit();
		$update->tableName = "example";
		$update->tableLimit = 15;
		$update->tableSet["name"] = "nome atualizado";
		$update->tableSet["email"] = "email atualizado";
		$update->tableWhere[0] = array("wh0", "==", 15);
		$update->tableWhere[1] = array("wh1", "==", "Hello World");
		$update->tableWhere[2] = array("wh2", "==", "foo");
		$this->assertEquals(
			$update->make(),
			'UPDATE example SET name = "nome atualizado", email = "email atualizado" WHERE wh0 = 15 AND wh1 = "Hello World" AND wh2 = "foo" LIMIT 15'
		);
	}

	public function testUnique()
	{
		$update = new UpdateWhereLimit();
		$update->tableName = "example";
		$update->tableLimit = 15;
		$update->tableSet["name"] = "nome atualizado";
		$update->tableWhere[0] = array("wh0", "==", 15);
		$this->assertEquals(
			$update->make(),
			'UPDATE example SET name = "nome atualizado" WHERE wh0 = 15 LIMIT 15'
		);
	}
}