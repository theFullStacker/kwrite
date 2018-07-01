<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;


class UsersExists extends SelectWhereLimit
{
	public $tableName = "users";
	public $tableLimit = 1;
	public $email = "";

	public function exists()
	{
		$this->tableCollumns[0] = "id";
		$this->tableWhere[0] = array("email", "==", $this->email);

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