<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\UpdateWhereLimit;


class UsersUpdateName extends UpdateWhereLimit
{
	public $tableName = "users";
	public $tableLimit = 1;
	public $name = "";
	public $email = "";

	public function update()
	{
		$this->tableSet["name"] = $this->name;
		$this->tableSet["updated_at"] = "datetime();";
		$this->tableWhere[0] = array("email", "==", $this->email);

		$conn = new Connection();
		$conn->update($this->make());
	}
}