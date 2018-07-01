<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;


class BlogSystemCreate extends Insert
{
	public $tableName = "blog_system";
	public $name = "";
	public $slogan = "";
	public $description = "";
	public $created_at = "datetime();";
	public $updated_at = "datetime();";

	public function create()
	{
		$conn = new Connection();
		$conn->insert($this->make());
	}
}