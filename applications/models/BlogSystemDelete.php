<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\DeleteWhereLimit;


class BlogSystemDelete extends DeleteWhereLimit
{
	public $tableName = "blog_system";
	public $tableLimit = 1;
	public $blog_system = "";

	public function delete()
	{
		$this->tableWhere[0] = array("slogan", "==", $this->blog_system);

		$conn = new Connection();
		$conn->delete($this->make());
	}
}