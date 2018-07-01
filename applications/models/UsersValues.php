<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;


class UsersValues extends SelectWhereLimit
{
	public $tableName = "users";
	public $tableLimit = 1;
	public $email = "";

	public function values()
	{
		$this->tableCollumns[0] = "id";
		$this->tableCollumns[1] = "name";
		$this->tableCollumns[2] = "email";
		$this->tableCollumns[3] = "password";
		$this->tableCollumns[4] = "created_at";
		$this->tableCollumns[5] = "updated_at";
		$this->tableWhere[0] = array("email", "==", $this->email);

		$conn = new Connection();
		return $conn->select(
			$this->make(),
			$this->tableCollumns
		);
	}
}