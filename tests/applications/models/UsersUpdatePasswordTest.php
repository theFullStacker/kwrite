<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\UsersUpdatePassword;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;
use Kwrite\MysqlEngine\Engine\Delete;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;


class UsersUpdatePasswordTest extends TestCase
{
	public function testUpdate()
	{
		$this->create();

		$model = new UsersUpdatePassword();
		$model->email = "my.name@email.com";
		$model->password = "atualizado";
		$model->update();

		$data = $this->data();
		$this->assertEquals($data[0]["name"], "My Name");
		$this->assertEquals($data[0]["email"], "my.name@email.com");
		$this->assertEquals($data[0]["password"], "atualizado");
		$this->drop();
	}

	private function data()
	{
		$query = new SelectWhereLimit();
		$query->tableName = "users";
		$query->tableLimit = 1;
		$query->tableCollumns[0] = "name";
		$query->tableCollumns[1] = "email";
		$query->tableCollumns[2] = "password";
		$query->tableWhere[0] = array("email", "==", "my.name@email.com");

		$conn = new Connection();
		return $conn->select(
			$query->make(),
			$query->tableCollumns
		);
	}

	private function create()
	{
		$query = new Insert();
		$query->tableName = "users";
		$query->name = "My Name";
		$query->email = "my.name@email.com";
		$query->password = "1234";
		$query->created_at = "datetime();";
		$query->updated_at = "datetime();";

		$conn = new Connection();
		$conn->insert(
			$query->make()
		);
	}

	private function drop()
	{
		$query = new Delete();
		$query->tableName = "users";

		$conn = new Connection();
		$conn->delete($query->make());
	}
}