<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\UsersExists;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;
use Kwrite\MysqlEngine\Engine\Delete;


class UsersExistsTest extends TestCase
{
	public function testExists()
	{
		$this->create();

		$model = new UsersExists();
		$model->email = "my.name@email.com";
		$data = $model->exists();

		$this->assertEquals($data, true);
		$this->drop();
	}

	public function testNotExists()
	{
		$model = new UsersExists();
		$model->email = "my.name@email.com";
		$data = $model->exists();

		$this->assertEquals($data, false);
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