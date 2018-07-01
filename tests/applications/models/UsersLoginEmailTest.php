<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\UsersLoginEmail;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;
use Kwrite\MysqlEngine\Engine\Delete;


class UsersLoginEmailTest extends TestCase
{
	public function testLogin()
	{
		$this->create();

		$model = new UsersLoginEmail();
		$model->email = "my.name@email.com";
		$model->password = "1234";
		$data = $model->login();

		$this->assertEquals($data, true);
		$this->drop();
	}

	public function testNotLogin()
	{
		$model = new UsersLoginEmail();
		$model->email = "my.name@email.com";
		$model->password = "1234";
		$data = $model->login();

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