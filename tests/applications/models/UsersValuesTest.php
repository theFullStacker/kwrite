<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\UsersValues;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;
use Kwrite\MysqlEngine\Engine\Delete;


class UsersValuesTest extends TestCase
{
	public function testValues()
	{
		$this->create();

		$model = new UsersValues();
		$model->email = "my.name@email.com";
		$data = $model->values();

		$this->assertEquals($data[0]["name"], "My Name");
		$this->assertEquals($data[0]["email"], "my.name@email.com");
		$this->assertEquals($data[0]["password"], "1234");
		$this->drop();
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