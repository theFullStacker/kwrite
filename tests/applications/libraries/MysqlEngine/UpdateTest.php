<?php


use Kwrite\MysqlEngine\Engine\Update;
use PHPUnit\Framework\TestCase;


class UpdateTest extends TestCase
{
	public function testMore()
	{
		$update = new Update();
		$update->tableName = "example";
		$update->tableSet["name"] = "nome atualizado";
		$update->tableSet["email"] = "email atualizado";
		$this->assertEquals(
			$update->make(),
			'UPDATE example SET name = "nome atualizado", email = "email atualizado"'
		);
	}

	public function testUnique()
	{
		$update = new Update();
		$update->tableName = "example";
		$update->tableSet["name"] = "nome atualizado";
		$this->assertEquals(
			$update->make(),
			'UPDATE example SET name = "nome atualizado"'
		);
	}
}