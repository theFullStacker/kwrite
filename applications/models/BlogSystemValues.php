<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;


class BlogSystemValues extends SelectWhereLimit
{
	public $tableName = "blog_system";
	public $tableLimit = 1;
	public $blog_system = "";

	public function values()
	{
		$this->tableCollumns[0] = "name";
		$this->tableCollumns[1] = "slogan";
		$this->tableCollumns[2] = "description";
		$this->tableWhere[0] = array("slogan", "==", $this->blog_system);

		$conn = new Connection();
		return $conn->select(
			$this->make(),
			$this->tableCollumns
		);
	}
}