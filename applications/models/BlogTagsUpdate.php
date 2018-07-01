<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\UpdateWhereLimit;


class BlogTagsUpdate extends UpdateWhereLimit
{
	public $tableName = "blog_tags";
	public $tableLimit = 1;
	public $id_blog = 0;
	public $name = "";
	public $slogan = "";
	public $description = "";
	public $blog_tags = "";

	public function update()
	{
		$this->tableSet["name"] = $this->name;
		$this->tableSet["slogan"] = $this->slogan;
		$this->tableSet["description"] = $this->description;
		$this->tableSet["updated_at"] = "datetime();";
		$this->tableWhere[0] = array("slogan", "==", $this->blog_tags);
		$this->tableWhere[1] = array("id_blog", "==", $this->id_blog);

		$conn = new Connection();
		$conn->update($this->make());
	}
}