<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Count;


class BlogSystemCount extends Count
{
	public $tableName = "blog_system";
	public $tableCollumn = "id";

	public function count()
	{
		$conn = new Connection();
		return $conn->count($this->make(), "id");
	}
}