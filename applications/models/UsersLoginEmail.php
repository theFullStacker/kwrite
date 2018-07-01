<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;


class UsersLoginEmail extends SelectWhereLimit
{
	public $tableName = "users";
	public $tableLimit = 1;
	public $email = "";
	public $password = "";

	public function login()
	{
		$this->tableCollumns[0] = "id";
		$this->tableWhere[0] = array("email", "==", $this->email);
		$this->tableWhere[1] = array("password", "==", $this->password);

		$conn = new Connection();
		$data = $conn->select(
			$this->make(),
			$this->tableCollumns
		);

		if (count($data) == 0)
		{
			return false;
		}

		return true;
	}
}