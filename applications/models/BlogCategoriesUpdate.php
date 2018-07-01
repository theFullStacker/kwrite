<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\UpdateWhereLimit;


class BlogCategoriesUpdate extends UpdateWhereLimit
{
	public $tableName = "blog_categories";
	public $tableLimit = 1;
	public $id_blog = 0;
	public $id_parent = 0;
	public $name = "";
	public $slogan = "";
	public $description = "";
	public $blog_categories = "";

	public function update()
	{
		if ($this->id_parent != 0)
		{
			$this->tableSet["id_parent"] = $this->id_parent;
		}

		$this->tableSet["name"] = $this->name;
		$this->tableSet["slogan"] = $this->slogan;
		$this->tableSet["description"] = $this->description;
		$this->tableSet["updated_at"] = "datetime();";
		$this->tableWhere[0] = array("slogan", "==", $this->blog_categories);
		$this->tableWhere[1] = array("id_blog", "==", $this->id_blog);

		$conn = new Connection();
		$conn->update($this->make());
	}
}