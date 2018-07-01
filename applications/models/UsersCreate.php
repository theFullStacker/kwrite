<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;


class UsersCreate extends Insert
{
	public $tableName = "users";
	public $name = "";
	public $email = "";
	public $password = "";
	public $created_at = "datetime();";
	public $updated_at = "datetime();";

	public function create()
	{
		$conn = new Connection();
		$conn->insert($this->make());
	}
}