<?php


use Kwrite\MysqlEngine\Engine\UpdateLimit;
use PHPUnit\Framework\TestCase;


class UpdateLimitTest extends TestCase
{
	public function testMore()
	{
		$update = new UpdateLimit();
		$update->tableName = "example";
		$update->tableLimit = 15;
		$update->tableSet["name"] = "nome atualizado";
		$update->tableSet["email"] = "email atualizado";
		$this->assertEquals(
			$update->make(),
			'UPDATE example SET name = "nome atualizado", email = "email atualizado" LIMIT 15'
		);
	}

	public function testUnique()
	{
		$update = new UpdateLimit();
		$update->tableName = "example";
		$update->tableLimit = 15;
		$update->tableSet["name"] = "nome atualizado";
		$this->assertEquals(
			$update->make(),
			'UPDATE example SET name = "nome atualizado" LIMIT 15'
		);
	}
}