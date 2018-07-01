<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\UpdateWhereLimit;


class BlogSystemUpdate extends UpdateWhereLimit
{
	public $tableName = "blog_system";
	public $tableLimit = 1;
	public $name = "";
	public $slogan = "";
	public $description = "";
	public $blog_system = "";

	public function update()
	{
		$this->tableSet["name"] = $this->name;
		$this->tableSet["slogan"] = $this->slogan;
		$this->tableSet["description"] = $this->description;
		$this->tableSet["updated_at"] = "datetime();";
		$this->tableWhere[0] = array("slogan", "==", $this->blog_system);

		$conn = new Connection();
		$conn->update($this->make());
	}
}