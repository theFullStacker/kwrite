<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;


class BlogSystemExists extends SelectWhereLimit
{
	public $tableName = "blog_system";
	public $tableLimit = 1;
	public $blog_system = "";

	public function exists()
	{
		$this->tableCollumns[0] = "id";
		$this->tableWhere[0] = array("slogan", "==", $this->blog_system);

		$conn = new Connection();
		$data = $conn->select(
			$this->make(),
			$this->tableCollumns
		);

		return count($data) != 0;
	}
}