<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\UsersCreate;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;
use Kwrite\MysqlEngine\Engine\Delete;


class UsersCreateTest extends TestCase
{
	public function testCreate()
	{
		$model = new UsersCreate();
		$model->name = "My Name";
		$model->email = "my.name@email.com";
		$model->password = "1234";
		$model->create();

		$data = $this->data();
		$this->assertEquals($data[0]["name"], "My Name");
		$this->assertEquals($data[0]["email"], "my.name@email.com");
		$this->assertEquals($data[0]["password"], "1234");

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

	private function drop()
	{
		$query = new Delete();
		$query->tableName = "users";

		$conn = new Connection();
		$conn->delete($query->make());
	}
}