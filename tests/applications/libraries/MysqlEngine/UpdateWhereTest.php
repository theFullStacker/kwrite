<?php


use Kwrite\MysqlEngine\Engine\UpdateWhere;
use PHPUnit\Framework\TestCase;


class UpdateWhereTest extends TestCase
{
	public function testMore()
	{
		$update = new UpdateWhere();
		$update->tableName = "example";
		$update->tableSet["name"] = "nome atualizado";
		$update->tableSet["email"] = "email atualizado";
		$update->tableWhere[0] = array("wh0", "==", 15);
		$update->tableWhere[1] = array("wh1", "==", "Hello World");
		$update->tableWhere[2] = array("wh2", "==", "foo");
		$this->assertEquals(
			$update->make(),
			'UPDATE example SET name = "nome atualizado", email = "email atualizado" WHERE wh0 = 15 AND wh1 = "Hello World" AND wh2 = "foo"'
		);
	}

	public function testUnique()
	{
		$update = new UpdateWhere();
		$update->tableName = "example";
		$update->tableSet["name"] = "nome atualizado";
		$update->tableWhere[0] = array("wh0", "==", 15);
		$this->assertEquals(
			$update->make(),
			'UPDATE example SET name = "nome atualizado" WHERE wh0 = 15'
		);
	}
}